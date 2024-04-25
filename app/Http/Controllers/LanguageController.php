<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function SetLang(string $locale,SessionManager $session){
        App::setLocale($locale);
        $session->put("locale",$locale);
        return redirect()->back();
    }
}
