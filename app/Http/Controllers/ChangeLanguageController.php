<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ChangeLanguageController extends Controller
{
    public function changLanguage(Request $request, $lang){
        
        Session::put('lang',$lang);
        return redirect()->back();
    }
}
