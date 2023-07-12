<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class AdminController extends Controller
{
    //Main Page
    public function index()
    {
        return view('admin.admin', [
            'foods' => Food::oldest()->filter(request(['search']))->simplePaginate(10)
        ]);
    }

    //View Menu Item
    public function editorView(Food $food)
    {
        return view ('admin.admin-item', [
            'food' => $food
        ]);
    }

    //Create Menu Item
    public function create()
    {
        return view('admin.admin-create-menu');
    }

    //Store Created Item in db
    public function store(Request $request)
    {
        //validate inputs
        $request->validate([
            'name' => 'required|min:5|unique:foods,name',
            'description' => 'required|min:20',
            'amount' => 'required|numeric|min:100|max:1000',
            'thumbnail' => 'required'
        ]);

        // Create user using inputs
        $food = Food::create($request->all());

        //Redirect to landing page if successful
        return redirect('admin')->with('success', 'Successfully Added Item');
    }

    //Edit Menu item
    public function edit($id)
    {
        $food = Food::find($id);
        return view('admin.admin-update-menu', compact('food'));
    }

    //Store Edited menu item in db
    public function update(Request $request, $id)
    {
        $food = Food::find($id);
        $request->validate([
            'name' => 'required|min:5|unique:foods,name,'.$food->id,
            'description' => 'required|min:20',
            'amount' => 'required|numeric|min:100|max:1000',
            'thumbnail' => 'required'
        ]);

        $food->update($request->all());

        return redirect()->route('adminpage.index')
                        ->with('success','Product updated successfully');
    }

    //Delete Menu Item
    public function destroy($id)
    {
        $food = Food::find($id);
        $food->delete();

        return redirect()->route('adminpage.index')
                        ->with('success','Menu Item deleted successfully');
    }

}
