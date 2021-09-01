<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function english()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'english');
        return redirect()->back();
    }

    public function turkish()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'turkish');
        return redirect()->back();
    }
}

