<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Schema;

use Illuminate\Database\Schema\Blueprint;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    

    public static function user() {

        $users = DB::table('users')->get();

        return view('user', ['users' => $users, 'title'=>"users"]);
    }
}
