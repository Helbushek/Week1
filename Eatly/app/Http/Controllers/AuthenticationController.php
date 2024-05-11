<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


use Illuminate\Database\Schema\Blueprint;

class AuthenticationController extends BaseController
{
    public static function sign_up(Request $request): RedirectResponse {
        $user = $request->query;
        print_r($user);
       $validated = $request->validate([
            'name' =>  'required|min:5|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6', 
       ]);

       return redirect('auth/sign_in');
    }

    public static function sign_in(Request $request): RedirectResponse{

    }
}