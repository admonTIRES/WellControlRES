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
    public function primeraHoja($TIPO)
    {
        return view('Killsheet.primera', compact('TIPO'));
    }


       /**
     * @return \Illuminate\View\View
     */
    public function practicaHoja($TIPO)
    {
        return view('Killsheet.practica', compact('TIPO'));
    }

       /**
     * @return \Illuminate\View\View
     */
    public function simuladorHoja($TIPO)
    {
        return view('Killsheet.simulador', compact('TIPO'));
    }

       /**
     * @return \Illuminate\View\View
     */
    public function hojaRapida($TIPO)
    {
        return view('Killsheet.rapida', compact('TIPO'));
    }
}
