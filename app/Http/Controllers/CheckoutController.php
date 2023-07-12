<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use Cart;
use Darryldecode\Cart\CartCondition;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        include(app_path() . '\Conditions.php');
        $userId = auth()->user()->id;
        Cart::session($userId)->clearCartConditions();

        return view('end-user.checkout', [
            'foods' => Cart::session($userId)->getContent(),
            'total' => Cart::session($userId)->getSubTotal(),
        ]);
    }

    public function store(Request $request)
    {
        $userId = auth()->user()->id;

        $food = Food::find($request->id);
        Cart::session($userId)->add(array(
            'id' => $food->id,
            'name' => $food->name,
            'price' => $food->amount,
            'quantity' => $request->quantity,
            'attributes' => array(
            'thumbnail' => $food->thumbnail,
            )
        ));
        return redirect('/menu');
    }

    public function destroy($id)
    {
        $userId = auth()->user()->id;
        Cart::session($userId)->remove($id);
        return back();
    }

    public function create(Request $request)
    {
        include(app_path() . '\Conditions.php');
        $request->validate([
            'type' => 'required|exists:order_types,id',
            'promo' => 'nullable|exists:promos,name',
            'table' => 'required|regex:/^\d{1,2}$/',
        ]);

        $userId = auth()->user()->id;
        if (Cart::session($userId)->getContent()->count() > 0) {
            Cart::session($userId)->clearCartConditions();

            switch ($request->type) {
                case '1':
                    Cart::session($userId)->condition($tDine);
                    break;
                case '2':
                    Cart::session($userId)->condition($tTake);
                    break;
                case '3':
                    Cart::session($userId)->condition($tDeliv);
                    break;
            }

            switch ($request->promo) {
                case '20PESOS':
                    Cart::session($userId)->condition($promo20);
                    break;
                case '30PESOS':
                    Cart::session($userId)->condition($promo30);
                    break;
                case '50PESOS':
                    Cart::session($userId)->condition($promo50);
                    break;
            }

            Order::create([
                'user_id' => $userId,
                'order_type_id' => $request->type,
                'table' => $request->table,
                'cart' => Cart::session($userId)->getContent(),
                'conditions' => Cart::session($userId)->getConditions(),
                'amount' => Cart::session($userId)->getSubTotal(),
            ]);

            Cart::session($userId)->clear();
            return redirect('landing')->with('success', 'Order Successfully Added!');
        } else {
            return redirect('landing')->with('failure', 'Your Cart is Empty!');
        }
    }
}
