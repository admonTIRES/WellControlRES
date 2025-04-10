<?php

namespace App\Http\Controllers\Language;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;

class languageController extends Controller
{
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
    /**
     * Obtiene la ruta base para archivos de audio según el idioma actual
     */
    protected $supportedLanguages = ['en', 'es', 'ar', 'pt_BR'];
    
    public function getAudioBasePath()
    {
        $currentLocale = App::getLocale();
        
        if (!in_array($currentLocale, $this->supportedLanguages)) {
            $currentLocale = 'en';
        }
        
        $audioLangCode = ($currentLocale === 'pt_BR') ? 'pt_BR' : $currentLocale;
        return "/assets/audio/" . strtoupper($audioLangCode) . "/calculator/";

    }
         
}
