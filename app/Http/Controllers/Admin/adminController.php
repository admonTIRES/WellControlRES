<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminController extends Controller
{
       /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('Admin.index');
    }
}
