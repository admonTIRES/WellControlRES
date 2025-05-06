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
    public function iadc()
    {
        return view('Killsheet.iadc');
    }

      /**
     * @return \Illuminate\View\View
     */
    public function iwcf()
    {
        return view('Killsheet.iwcf');
    }

      /**
     * @return \Illuminate\View\View
     */
    public function iwcfvideo()
    {
        return view('Killsheet.iwcfVideo');
    }

      /**
     * @return \Illuminate\View\View
     */
    public function iwcfdesviado()
    {
        return view('Killsheet.iwcfVerticalK');
    }
}
