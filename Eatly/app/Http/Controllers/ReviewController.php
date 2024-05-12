<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Auth;
use DB;


class ReviewController extends Controller
{
    public static function add(Request $request) {
        return view('review.add')->with('id', $request->id);
    }

    public static function _add(Request $request) {
        $confirmation = $request->validate([
            'text' => 'required|max:1000',
            'rating' => 'required',
        ]);
        DB::insert('insert into reviews (text, rating, dish_id, user_id) values (?,?,?,?)', [$request->text, $request->rating, $request->id, Auth::id()]);

        return redirect('dishes');
    }


    public static function redact(Request $request) {
        return view('review.redact')->with('id', $request->id);
    }
    public static function _redact(Request $request): RedirectResponse {
        $confirmation = $request->validate([
            'text' => 'required|max:1000',
            'rating' => 'required',
        ]);

        DB::table('reviews')->where('id', $request->id)->update([
            'text' => $request->text,
            'rating' => $request->rating,
        ]);

        return redirect('dishes');
    }

    public static function delete(Request $request): RedirectResponse {
        DB::table('reviews')->where('id', $request->id)->delete();

        return redirect('dishes');
    }
}