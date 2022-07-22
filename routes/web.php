<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequesterController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketConvController;
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
    return redirect('login');
});


//login multi-level
Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'redirectTo'])->name('home');


Route::resource('/requester', RequesterController::class);
Route::get('/requester/{requester:id}', [RequesterController::class, 'show']);
// Route::get('/requester/delete/{id}', [RequesterController::class, 'destroy']);
//Route Agent

Route::resource('/agent', AgentController::class);
// Route::get('/requester/{requester:id}', [AgentController::class, 'show2']);
// Route::get('/agent/delete/{id}', [AgentController::class, 'destroy']);

Route::resource('/ticket', TicketController::class);
Route::get('/ticket/{ticket}/detail', [TicketController::class, "ticketDetail"]);
Route::put('/ticket/update/{id}', [TicketController::class, 'update'])->name('ticket.update'); //similar to post, but can have parameters

Route::resource('/ticketconv', TicketConvController::class);
Route::get('/ticketconvform/{ticket}', [TicketConvController::class, "ticketConv"]);






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


Route::resource('/dashboard/dashboard_agent', DashboardController::class);

