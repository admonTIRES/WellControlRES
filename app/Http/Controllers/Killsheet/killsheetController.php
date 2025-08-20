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

}
