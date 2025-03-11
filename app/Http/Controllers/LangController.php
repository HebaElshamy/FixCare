<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function change($lang)
    {
        // تخزين اللغة في الجلسة
        Session::put('lang', $lang);
        // dd(session()->all());
        // إعادة التوجيه للصفحة السابقة (refresh الصفحة)
        return redirect()->back();
    }
}

