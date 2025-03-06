<?php

namespace App\Http\Controllers\Language;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;

class languageController extends Controller
{
    public function switchLang($lang)
    {
        if (in_array($lang, ['en', 'es'])) {
            session(['locale' => $lang]);
            App::setLocale($lang);
        }
        return redirect()->back();
    }
}
