<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequesterController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

Route::get('/loginuser', function () {
    $title = "Login";
    return view('login.login', compact('title'));
});
Route::post('/loginuser', function (Request $request) {
    $email = $request->email;
    $password = $request->password;
    // auth using Req_Email and Req_Password in requester table
    if (Auth::guard('requester')->attempt(['Req_Email' => $email, 'Req_Password' => $password])) {
        return redirect("/requester");
    } else {
        return redirect("/loginuser");
    }
});

Route::get('/', function () {
    return view('welcome', [
        'title' => 'Requester'
    ]);
});
Route::resource('/requester', RequesterController::class);
Route::get('/requester/{requester:id}', [RequesterController::class, 'show']);
Route::get('/requester/delete/{id}', [RequesterController::class, 'destroyid']);
//Route Agent

Route::resource('/agent', AgentController::class);
Route::get("/agent/delete/{id}", function ($id) {
    DB::table('agent')->where('id', '=', $id)->delete();
    return back();
});
Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




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
