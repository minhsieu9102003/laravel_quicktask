<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class LanguageController extends Controller
{
    public function changeLanguage(Request $request, $lang){
        // dd($lang);
        Session::put('lang',$lang);
        // $locale = Session::get('lang');
        App::setLocale($lang);
        return redirect()->back();
    }
}
