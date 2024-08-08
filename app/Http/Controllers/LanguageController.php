<?php

namespace App\Http\Controllers;
<<<<<<< HEAD

use Illuminate\Http\Request;
use Session;

class LanguageController extends Controller
{
    //
    public function changeLanguage(Request $request, $language){
        Session::put('lang',$language);
=======
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
>>>>>>> 0b13237f8b9a66532c5259167da06378c0ef33e3
        return redirect()->back();
    }
}
