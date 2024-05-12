<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Auth;
use DB;


class NewsController extends Controller
{
    public static function add(Request $request): RedirectResponse {
        $confirmation = $request->validate([
            'title' => 'required|min:20|max:100',
            'text' => 'max:1000',
        ]);
        $user_id = Auth::user()->id;
        DB::insert('insert into news (user_id, title, text, img) values (?,?,?,?)', [$user_id, $request->title, $request->text, $request->img]);

        return redirect('news');
    }


    public static function redact(Request $request) {
        return view('news.redact')->with('id', $request->id);
    }
    public static function _redact(Request $request) {
        $confirmation = $request->validate([
            'title' => 'required|min:20|max:100',
            'text' => 'max:1000',
        ]);

        DB::table('news')->where('id', $request->id)->update([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'text' => $request->text,
            'img' => $request->img
        ]);

        return redirect('news');
    }

    public static function delete(Request $request): RedirectResponse {
        DB::table('news')->where('id', $request->id)->delete();

        return redirect('news');
    }
}


