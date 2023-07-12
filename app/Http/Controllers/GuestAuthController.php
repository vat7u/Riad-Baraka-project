<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class GuestAuthController extends Controller
{
    public function guestLogin()
    {
        $attributes = request()->all(); // Get all input data

        // Set default values if the fields are empty
        $attributes['email'] = 'guest@guest.com';
        $attributes['password'] = 'password';

        //Authenticate and login
        if(auth()->attempt($attributes )){
            return redirect('landing');
        }else{
            dd(auth()->attempt($attributes ));
        };
    }
}
