<?php

namespace App\Http\Controllers\Killsheet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class killsheetController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('Killsheet.mainKillsheet');
    }


      /**
     * @return \Illuminate\View\View
     */
    public function panel($TIPO)
    {
        return view('Killsheet.panel', compact('TIPO'));
    }

      /**
     * @return \Illuminate\View\View
     */
    public function video($TIPO)
    {
        return view('Killsheet.video', compact('TIPO'));
    }


       /**
     * @return \Illuminate\View\View
     */
    public function info($TIPO)
    {
        return view('Killsheet.info', compact('TIPO'));
    }

       /**
     * @return \Illuminate\View\View
     */
    public function firstExercise($TIPO)
    {
        if($TIPO === 'iadcVertical'){
            return view('Killsheet.IADC.verticalWell.firstExercise', compact('TIPO'));
        }else if($TIPO === 'iwcfVertical'){
            return view('Killsheet.IWCF.verticalWell.firstExercise', compact('TIPO'));
        }else if($TIPO === 'iwcfDeviated'){
           return view('Killsheet.IWCF.deflectedWell.firstExercise', compact('TIPO'));
        }else{
           return view('Killsheet.panel', compact('TIPO'));
        }
    }


       /**
     * @return \Illuminate\View\View
     */
    public function practiceExercise($TIPO)
    {
        return view('Killsheet.practiceExercise', compact('TIPO'));
    }

       /**
     * @return \Illuminate\View\View
     */
    public function exerciseSimulator($TIPO)
    {
        return view('Killsheet.exerciseSimulator', compact('TIPO'));
    }

       /**
     * @return \Illuminate\View\View
     */
    public function quickExercise($TIPO)
    {
        return view('Killsheet.quickExercise', compact('TIPO'));
    }
}
