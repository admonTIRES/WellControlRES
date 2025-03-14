<?php

namespace App\Http\Controllers\Principal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class principalController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('Principal.principal');
        // return view('Auth.login');
        // return view('Killsheet.iwcf');

    }
}
