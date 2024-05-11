<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
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
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ]);

        $user = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $password = DB::table('users')->get()->where('email', $user['email'])->value('password');
        $user_id = DB::table('users')->get()->where('email', $user['email'])->value('id');
        if ($password == $user['password']) {
            Auth::loginUsingId($user_id);
        }
        return redirect('user');
    }

    public static function delete() : RedirectResponse {
        DB::table('users')->where('id', Auth::id())->delete();
        Auth::logout();
        return redirect('user');
    }

    public static function redact(Request $request) : RedirectResponse {

        $validated = $request->validate([
            'name' =>  'required|min:5|max:255',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6', 
       ]);
        $new_email = $request->email;
        $new_name = $request -> name;
        $new_password = $request -> password;

        DB::table('users')->where('id', Auth::id())->update([
            'email' => $new_email,
            'name' => $new_name,
            'password' => $new_password
        ]);
        return redirect('user');
    }
}