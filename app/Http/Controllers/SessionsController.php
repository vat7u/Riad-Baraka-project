<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class SessionsController extends Controller
{


    public function store()
    {
        //validate
        $attributes = request()->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);


        //Authenticate and login
        if(auth()->attempt($attributes)){
            $employees = Employee::all();
            $user = auth()->user();
            foreach($employees as $employee){
                if($employee->user_id == $user->id){ //check if employee
                    if($employee->ismanager)    //check if admin
                    {
                        return redirect('admin');
                    }
                    else
                    {
                        return redirect('employee');
                    }
                }
            }
            return redirect('landing');
        };

        //Check for errors
        return back()->withErrors(['email' => 'Incorrect Credentials']);
    }

    public function destroy()
    {
        //Logout User
        auth()->logout();

        return redirect('/')->with('success', 'Logged Out Successfully');
    }
}
