<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use App\Models\Order;
use App\Models\Employee;
use Illuminate\Http\Request;
use Cart;
use Darryldecode\Cart\CartCondition;

class EmployeeController extends Controller
{
    //
    public function show()
    {
        $userId = auth()->user()->id;
        Cart::session($userId)->clear();

        return view('employee.employee', [
            'pending' => Order::where('status', 'pending')->orderBy('id', 'ASC')->get(),
            'confirmed' => Order::where('status', 'confirmed')->orderBy('id', 'ASC')->get(),
            'completed' => Order::where('status', 'completed')->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function showNew()
    {
        $userId = auth()->user()->id;

        return view('employee.add-order', [
            'header' => "Add Order",
            'subtitle' => "Add items to a new order.",
            'foods' => Cart::session($userId)->getContent(),
            'total' => Cart::session($userId)->getSubTotal(),
            'users' => User::all(),
            'products' => Food::all(),
        ]);
    }

    public function addOrder(Request $request)
    {
        $userId = auth()->user()->id;

        $this->addtoCart($request, $userId);
        return back();
    }

    public function addtoCart($param, $id)
    {
        $food = Food::find($param->id);
        Cart::session($id)->add(array(
            'id' => $food->id,
            'name' => $food->name,
            'price' => $food->amount,
            'quantity' => $param->quantity,
            'attributes' => array(
                'thumbnail' => $food->thumbnail,
            )
        ));
    }

    public function remove()
    {
        $userId = auth()->user()->id;
        Cart::session($userId)->remove(request()->id);
        return back();
    }

    public function place(Request $request)
    {

        $userId = auth()->user()->id;

        if (request('submit') == "save" && Cart::session($userId)->getContent()->count() > 0) {
            $request->validate([
                'type' => 'required|exists:order_types,id',
                'promo' => 'nullable|exists:promos,name',
                'table' => 'required|max:2',
            ]);

            Cart::session($userId)->clearCartConditions();

            $this->addOrderType($request, $userId);
            $this->addPromo($request, $userId);

            Order::create([
                'user_id' => $userId,
                'order_type_id' => $request->type,
                'table' => $request->table,
                'cart' => Cart::session($userId)->getContent(),
                'conditions' => Cart::session($userId)->getConditions(),
                'amount' => Cart::session($userId)->getSubTotal(),
            ]);

            Cart::session($userId)->clear();
            return redirect('employee')->with('success', 'Order Successfully Added!');
        } else {
            return redirect('employee')->with('failure', 'Your Cart is Empty!');
        }
    }

    public function confirm()
    {
        $order = Order::find(request('id'));

        if ($order->status == "pending") {
            $order->update([
                'status' => 'confirmed',
            ]);
        } elseif ($order->status == "confirmed") {
            $order->update([
                'status' => 'completed',
            ]);
        }
        return back();
    }

    public function getEdit()
    {
        $userId = auth()->user()->id;
        $order = Order::find(request('id'));

        Cart::session($userId)->clear();

        foreach (json_decode($order->cart) as $parsed) {
            $this->addtoCart($parsed, $userId);
        }

        Cart::session($userId)->clearCartConditions();
        $arr = array_keys((array) json_decode($order->conditions));

        $this->addOrderType($arr[0], $userId);

        if (count($arr) > 1) {
            $this->addPromo($arr[1], $userId);
        }

        return redirect('employee/show-edit-order/' . $order->id);
    }

    public function showEdit(Order $order)
    {
        $userId = auth()->user()->id;
        return view('employee.edit-order', [
            'header' => "Order #",
            'subtitle' => "Please verify the information below and save the order.",
            'foods' => Cart::session($userId)->getContent(),
            'total' => Cart::session($userId)->getSubTotal(),
            'users' => User::all(),
            'products' => Food::all(),
            'orders' => $order,
        ]);
    }

    public function save(Request $request)
    {
        include(app_path() . '\Conditions.php');

        $userId = auth()->user()->id;

        if (request('submit') == "save" && Cart::session($userId)->getContent()->count() > 0) {
            Cart::session($userId)->clearCartConditions();
            $request->validate([
                'type' => 'required|exists:order_types,id',
                'promo' => 'nullable|exists:promos,name',
                'table' => 'required|regex:/^\d{1,2}$/',
            ]);

            $this->addOrderType($request, $userId);
            $this->addPromo($request, $userId);

            Order::find(request('id'))->update([
                'user_id' => request('user'),
                'order_type_id' => request('type'),
                'table'=>request('table'),
                'cart' => Cart::session($userId)->getContent(),
                'conditions' => Cart::session($userId)->getConditions(),
                'amount' => Cart::session($userId)->getSubTotal(),
            ]);

            Cart::session($userId)->clear();
            return redirect('employee')->with('success', 'Order Successfully Edited!');
        } elseif (request('submit') != "save" || Cart::session($userId)->getContent()->count() == 0) {
            Order::find(request('id'))->delete();
            Cart::session($userId)->clear();
            return redirect('employee')->with('success', 'Order Sucessfully Deleted!');
        }
    }

    public function addOrderType($param, $id)
    {
        include(app_path() . '\Conditions.php');
        switch (isset($param->type)) {
            case '1':
                Cart::session($id)->condition($tDine);
                break;
            case '2':
                Cart::session($id)->condition($tTake);
                break;
            case '3':
                Cart::session($id)->condition($tDeliv);
                break;
        }
    }

    public function addPromo($param, $id)
    {
        include(app_path() . '\Conditions.php');
        switch (isset($param->promo)) {
            case '20PESOS':
                Cart::session($id)->condition($promo20);
                break;
            case '30PESOS':
                Cart::session($id)->condition($promo30);
                break;
            case '50PESOS':
                Cart::session($id)->condition($promo50);
                break;
        }
    }


    public function getShow()
    {
        $userId = auth()->user()->id;
        $order = Order::find(request('id'));

        Cart::session($userId)->clear();

        foreach (json_decode($order->cart) as $parsed) {
            $this->addtoCart($parsed, $userId);
        }

        Cart::session($userId)->clearCartConditions();
        $arr = array_keys((array) json_decode($order->conditions));

        $this->addOrderType($arr[0], $userId);

        if (count($arr) > 1) {
            $this->addPromo($arr[1], $userId);
        }

        return redirect('employee/show-order/' . $order->id);
    }

    public function showShow(Order $order)
    {
        $userId = auth()->user()->id;
        return view('employee.show-order', [
            'header' => "Order #",
            'subtitle' => "Please verify the information below and save the order.",
            'foods' => Cart::session($userId)->getContent(),
            'total' => Cart::session($userId)->getSubTotal(),
            'users' => User::all(),
            'products' => Food::all(),
            'orders' => $order,
        ]);
    }
}
