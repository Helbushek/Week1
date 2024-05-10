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

    public static function news() {

        $news = DB::table('news')->get();

        return view('news', ['news' => $news, 'title'=>"news"]);
    }

    public static function review() {

        $review = DB::table('reviews')->get();

        return view('reviews', ['review' => $review, 'title'=>"review"]);
    }

    public static function dishes() {

        $dishes = DB::table('dishes')->get();

        return view('dishes', ['dishes' => $dishes, 'title'=>"dishes"]);
    }
}
