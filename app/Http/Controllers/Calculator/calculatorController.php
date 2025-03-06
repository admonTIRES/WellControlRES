<?php

namespace App\Http\Controllers\Calculator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class calculatorController extends Controller
{
   /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('Calculator.menuCalculator');
    }
}
