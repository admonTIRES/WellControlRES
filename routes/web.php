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
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//----------------------------REGISTER-------------------------------//
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'register']);
//---------------------------               USER              -------------------------------//
//----------------------------PRINCIPAL-------------------------------//
Route::middleware('auth')->get('/', [PrincipalController::class, 'index'])->name('home');

//----------------------------CALCULATOR-------------------------------//
Route::middleware('auth')->get('/Calculator', [calculatorController::class, 'index'])->name('calculator');

//----------------------------CALCULATOR-------------------------------//
Route::middleware('auth')->get('/Killsheet', [killsheetController::class, 'index'])->name('killsheet');
Route::get('/Killsheet/iadc', [KillsheetController::class, 'iadc'])->name('killsheet.iadc');
Route::get('/Killsheet/iwcf', [KillsheetController::class, 'iwcf'])->name('killsheet.iwcf');
Route::get('/Killsheet/iwcf-desviado', [KillsheetController::class, 'iwcfdesviado'])->name('killsheet.iwcfdesviado');
//---------------------------               ADMIN              -------------------------------//
//----------------------------INSTRUCTOR-------------------------------//
Route::get('/dashboardInstructor', [adminController::class, 'dashboardInstructor'])->name('dashboardInstructor');

Route::get('/students', [adminController::class, 'students'])->name('students');   
Route::get('/asignaments', [adminController::class, 'asignaments'])->name('asignaments'); 

Route::get('/exercises', [adminController::class, 'exercises'])->name('exercises'); 
Route::get('/math', [adminController::class, 'math'])->name('math'); 
Route::get('/killsheets', [adminController::class, 'killsheets'])->name('killsheets');  

Route::get('/catalogs', [adminController::class, 'catalogs'])->name('catalogs');  

Route::get('/users', [adminController::class, 'users'])->name('users');   
Route::get('/enterprise', [adminController::class, 'enterprise'])->name('enterprise');   
Route::get('/individual', [adminController::class, 'individual'])->name('individual');   
Route::get('/membership', [adminController::class, 'membership'])->name('membership'); 


Route::get('/access', [adminController::class, 'access'])->name('access');   
Route::get('/instructors', [adminController::class, 'instructors'])->name('instructors');   
Route::get('/external', [adminController::class, 'external'])->name('external');   
Route::get('/roles', [adminController::class, 'roles'])->name('roles');   
Route::get('/recovery', [adminController::class, 'recovery'])->name('recovery');   

Route::get('/reports', [adminController::class, 'reports'])->name('reports');  

Route::get('/profile', [adminController::class, 'profile'])->name('profile');   
Route::get('/configuration', [adminController::class, 'configuration'])->name('configuration');   
Route::get('/notifications', [adminController::class, 'notifications'])->name('notifications');   
Route::get('/messages', [adminController::class, 'messages'])->name('messages');   










