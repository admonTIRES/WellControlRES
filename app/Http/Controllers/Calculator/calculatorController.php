<?php

namespace App\Http\Controllers\Calculator;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Language\languageController;
use App\Models\Admin\Exercise\Math;


use Illuminate\Http\Request;

class calculatorController extends Controller
{
   /**
    * * @param LanguageController $languageController
     * @return \Illuminate\View\View
     */
    public function index(LanguageController $languageController)
    {
        $audioFiles = [
            'audioIntroPath' => 'calculator_intro_01.mp3',
            'audioConfigPath' => 'calculator_config_04.mp3',
            'audioPartsPath' => 'calculator_parts_02.mp3',
            'audioFunctionsPath' => 'calculator_functions_03.mp3',
            'audioUsePath' => 'calculator_use_05.mp3',
            'audioUnitPath' => 'calculator_unit_06.mp3',
            'audioFractionPath' => 'calculator_fraction_07.mp3',
            'audioHierarchyPath' => 'calculator_hierarchy_08.mp3',
            'audioClearancePath' => 'calculator_clearance_09.mp3',
            'audioFormulaPath' => 'calculator_formula_10.mp3',
            'audioRoundingPath' => 'calculator_formula_10.mp3',

        ];
        $math = Math::all();
        $despejes = $math->filter(fn($item) => $item->TIPO_MATH == 1)->values()->all();
        $jerarquia = $math->filter(fn($item) => $item->TIPO_MATH == 2)->values()->all();
        $fracciones = $math->filter(fn($item) => $item->TIPO_MATH == 3)->values()->all();
        $elevacion = $math->filter(fn($item) => $item->TIPO_MATH == 4)->values()->all();
        $redondeos = $math->filter(fn($item) => $item->TIPO_MATH == 5)->values()->all();


        
        $audioPaths = [];
        foreach ($audioFiles as $key => $file) {
            $audioPaths[$key] = $languageController->getAudioBasePath() . $file;
        }
        
        
        // return view('Calculator.menuCalculator', $audioPaths);
        $enteAcreditador = 3;

        return view('Calculator.menuCalculator', compact('audioPaths', 'enteAcreditador', 'math', 'fracciones', 'despejes', 'jerarquia', 'elevacion', 'redondeos'));
    }
}
