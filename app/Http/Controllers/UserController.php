<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hotel_create()
    {
        return view('hotel-signup');
    }
    public function rest_create()
    {
        return view('restaurant-signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //validate inputs
        $request->validate([
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'email' => 'required|unique:users,email',
            'room' => 'regex:/^\d{1,2}$/',
            'password' => 'required|min:8'
        ]);

        // Create user using inputs
        $user = User::create($request->all());

        auth()->login($user);

        //Redirect to landing page if successful
        return redirect('landing')->with('success', 'Successfully Registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'email' => 'required|unique:users,email,'.$user->id, //Email must be unique but ignore current email
            'room' => 'max:10',
            'table' => 'max:5',
            'password' => 'required|min:8'
        ]);
        // User::create($request->all());
        $user->update($request->all());

        return back()->with('success', 'Updated Successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
