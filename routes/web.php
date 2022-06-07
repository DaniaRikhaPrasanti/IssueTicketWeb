<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequesterController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//login multi-level
Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware' => 'role:admin'], function(){
        Route::get('/administrator', function(){
            return view('/layouts.app');
        });
    });
    Route::group(['middleware' => 'role:requester'], function(){
        Route::get('/user-requester', function(){
            return view('/layouts.appuser');
        });
    });
    Route::group(['middleware' => 'role:agent'], function(){
        Route::get('/user-agent', function(){
            return view('/layouts.appuser');
        });
    });
});
//
// verifikasi email user 
Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::post('/loginuser', function (Request $request) {
//     $email = $request->email;
//     $password = $request->password;
//     // auth using Req_Email and Req_Password in requester table
//     if (Auth::guard('requester')->attempt(['Req_Email' => $email, 'Req_Password' => $password])) {
//         return redirect("/requester");
//     } else {
//         return redirect("/loginuser");
//     }
// });

// Route::get('/', function () {
//     return view('welcome', [
//         'title' => 'Requester'
//     ]);
// });

Route::resource('/requester', RequesterController::class);
Route::get('/requester/{requester:id}', [RequesterController::class, 'show']);
// Route::get('/requester/delete/{id}', [RequesterController::class, 'destroy']);
//Route Agent

Route::resource('/agent', AgentController::class);
// Route::get('/agent/delete/{id}', [AgentController::class, 'destroy']);

Route::resource('/ticket', TicketController::class);






// Route::get('/ticket/done', function () {
//     return view('ticket.timeline_details_done', [
//         'title' => 'List Tickets'
//     ]);
// });


Route::get('/ticket/close_ticket', function () {
    return view('ticket.close_ticket', [
        'title' => 'List Tickets'
    ]);
});

Route::get('/ticket/create_ticket', function () {
    return view('ticket.create_ticket', [
        'title' => 'List Tickets'
    ]);
});

Route::get('/ticket/list_tickets', function () {
    return view('ticket.list_tickets', [
        'title' => 'List Tickets'
    ]);
});

Route::get('/ticket/list_tickets/details_ticket', function () {
    return view('ticket/detail_ticket', [
        'title' => 'List Tickets/Detail Ticket'
    ]);
});

Route::get('/settings/setting_admin', function () {
    return view('settings.setting_admin', [
        'title' => 'Setting'
    ]);
});

Route::get('/dashboard/dashboard_agent', function () {
    return view('dashboard.dashboard_agent', [
        'title' => 'Dashboard Agent'
    ]);
});
