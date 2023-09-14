<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[RegistrationController::class, 'login']);
Route::post('/login-user', [RegistrationController::class, 'authentication']);
Route::get('/register',[RegistrationController::class, 'showRegForm']);
Route::post('/register',[RegistrationController::class, 'store']);
Route::post('/new-registration',[RegistrationController::class, 'registration']);
Route::get('/register/view',[RegistrationController::class, 'showdata']);
Route::get('/register/delete/{id}',[RegistrationController::class, 'delete']);
Route::get('/register/edit/{id}',[RegistrationController::class, 'edit']);
Route::post('/register/edit/{id}',[RegistrationController::class, 'update']);

Route::get('/dashboard',[RegistrationController::class, 'show']);
Route::get('/change-pwd',[RegistrationController::class, 'change_pwd']);
Route::post('/change-pwd',[RegistrationController::class, 'change_password']);

Route::get('/upload',function(){
    return view('upload');
});
Route::post('/upload', [RegistrationController::class, 'uploads']);

Route::get('/contact', function(){
    return view('contact_page');
});

Route::get('basicEmail',[MailController::class,'send_basic_email']);
Route::get('basichtmlEmail',[MailController::class,'send_html_email']);
Route::get('basic_attach_Email',[MailController::class,'send_attach_email']);

Route::get('get-all-session', function () {
    $session = session()->all();
    print_r($session);
});

// Route::get('set-session', function(Request, $request));