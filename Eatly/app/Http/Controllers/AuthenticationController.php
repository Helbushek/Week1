<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB;


use Illuminate\Database\Schema\Blueprint;

class AuthenticationController extends BaseController
{
    public static function sign_up(Request $request): RedirectResponse {
       $validated = $request->validate([
            'name' =>  'required|min:5|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6', 
       ]);

       DB::insert('insert into users (name, email, password) values (?,?,?)', [$request->name, $request->email, $request->password]);

       return redirect('user');
    }

    public static function sign_in(Request $request): RedirectResponse{

    }
}