<?php

namespace App\Http\Controllers\Language;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;

class languageController extends Controller
{
    // public function switchLang($lang)
    // {
    //     if (in_array($lang, ['en', 'es'])) {
    //         session(['locale' => $lang]);
    //         App::setLocale($lang);
    //     }
    //     return redirect()->back();
    // }

    public function switchLang($lang)
    {
        $supportedLanguages = ['en', 'es', 'ar', 'pt_BR'];
        
        if (in_array($lang, $supportedLanguages)) {
            session(['locale' => $lang]);
            App::setLocale($lang);
            
            // dirección del texto (RTL para árabe)
            if ($lang === 'ar') {
                session(['text_direction' => 'rtl']);
            } else {
                session(['text_direction' => 'ltr']);
            }
        }
        
        return redirect()->back();
    }
    
}
