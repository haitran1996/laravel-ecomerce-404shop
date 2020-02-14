<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleController
{
    public function switchLocale($locale)
    {
        App::setLocale($locale);
        session()->put("lang", $locale);
        return back()->with(session("lang"));
    }
}
