<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DarkModeController extends Controller
{
    public function switch()
    {
        session([
            'dark_mode' => session()->has('dark_mode') ? !session()->get('dark_mode') : true
        ]);

        return back();
    }
}
