<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Auth;
use DB;


class DishController extends Controller
{
    public static function add(Request $request): RedirectResponse {
        $confirmation = $request->validate([
            'name' => 'required|max:100',
            'description' => 'max:10000',
            'price' => 'required|min:0|max:1000000',
        ]);
        $user_id = Auth::user()->id;
        DB::insert('insert into dishes (name, description, price, img) values (?,?,?,?)', [$request->name, $request->description, $request->price, $request->img]);

        return redirect('dishes');
    }


    public static function redact(Request $request) {
        return view('dish.redact')->with('id', $request->id);
    }
    public static function _redact(Request $request) {
        $confirmation = $request->validate([
            'name' => 'required|max:100',
            'description' => 'max:10000',
            'price' => 'required|min:0|max:1000000',
        ]);

        DB::table('dishes')->where('id', $request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'img' => $request->img
        ]);

        return redirect('dishes');
    }

    public static function delete(Request $request): RedirectResponse {
        DB::table('dishes')->where('id', $request->id)->delete();

        return redirect('dishes');
    }
}