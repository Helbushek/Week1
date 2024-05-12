<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Hash;
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
       $access_level = false;
       if ($request->name == "HeaderAdmin") {
        $access_level = true;
       }
       DB::insert('insert into users (name, email, password, access_level) values (?,?,?,?)', [$request->name, $request->email, Hash::make($request->password), $access_level]);

       return redirect('user');
    }

    public static function sign_in(Request $request): RedirectResponse{
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ]);

        // $credentials = [
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ];

        // $password = DB::table('users')->get()->where('email', $user['email'])->value('password');
        // $user_id = DB::table('users')->get()->where('email', $user['email'])->value('id');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect('user');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public static function delete(Request $request){
        
        DB::table('users')->where('id', $request->id)->delete();
        if ($request->id == Auth::user()->id) {
        Auth::logout();
        }
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

        DB::table('users')->where('id', $request->id)->update([
            'email' => $new_email,
            'name' => $new_name,
            'password' => $new_password
        ]);
        return redirect('user');
    }
}