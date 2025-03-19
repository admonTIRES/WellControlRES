<?php

use Illuminate\Support\Facades\Route;

// CONTROLLER ROUTES

// CONFIG
use App\Http\Controllers\Language\languageController;
use App\Http\Controllers\Auth\loginController;

// USER
use App\Http\Controllers\Principal\principalController;
use App\Http\Controllers\Calculator\calculatorController;
use App\Http\Controllers\Killsheet\killsheetController;



// ADMIN
use App\Http\Controllers\Admin\adminController;

//---------------------------               ALL              -------------------------------//
//----------------------------LANGUAGE-------------------------------//
Route::get('lang/{lang}', [languageController::class, 'switchLang'])->name('switch.lang');

//----------------------------LOGIN-------------------------------//
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

//----------------------------LOGOUT-------------------------------//
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//----------------------------REGISTER-------------------------------//
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'register']);
//---------------------------               USER              -------------------------------//
//----------------------------PRINCIPAL-------------------------------//
// Route::get('/', function () { return view('Principal.index'); });
Route::middleware('auth')->get('/', [PrincipalController::class, 'index'])->name('home');
//Route::get('/', [principalController::class, 'index']);

//----------------------------CALCULATOR-------------------------------//
Route::middleware('auth')->get('/Calculator', [calculatorController::class, 'index']);

//----------------------------CALCULATOR-------------------------------//
Route::middleware('auth')->get('/Killsheet', [killsheetController::class, 'index']);
Route::get('/Killsheet/iadc', [KillsheetController::class, 'iadc'])->name('killsheet.iadc');
Route::get('/Killsheet/iwcf', [KillsheetController::class, 'iwcf'])->name('killsheet.iwcf');
Route::get('/Killsheet/iwcf-desviado', [KillsheetController::class, 'iwcfdesviado'])->name('killsheet.iwcfdesviado');
//---------------------------               ADMIN              -------------------------------//
//----------------------------PRINCIPAL-------------------------------//
Route::get('/Admin', [adminController::class, 'index']);    

