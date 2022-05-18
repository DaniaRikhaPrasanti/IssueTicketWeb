<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequesterController;
use App\Http\Controllers\AgentController;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome', [
        'title' => 'Requester'
    ]);
});

Route::get('/requester', [RequesterController::class, 'index']); //menampilkan list data requester 




//Route Agent
Route::get('/agent', [AgentController::class, 'index']); //menampilkan list data agent 
Route::get('/agent/add', [AgentController::class, 'add_agent']);
Route::post('/agent/insert/', [AgentController::class, 'insert_agent']);
Route::get('/agent/edit/{Ag_ID}', [AgentController::class, 'edit_agent']);
Route::post('/agent/update', [AgentController::class, 'update_agent']);


Route::get('/requester/details/1', function () {
    return view('requester.details', [
        'title' => 'Requester - Details',
        'id' => '1',
        'Req_Name' => 'Fathullah Auzan',
        'Req_Email' => 'auzanganteng@gmail.com',
        'Req_Jabatan' => 'UI/UX Designer',
        'Req_No' => '08123456789',
        'Req_Address' => 'Rungkut Asri Timur Gang 8',
        'Comp_No' => '82921201'

    ]);
});

Route::get('/requester/details/edit/1', function () {
    return view('requester.edit', [
        'title' => 'Requester - Edit',
        'id' => '1',
        'Req_Name' => 'Fathullah Auzan',
        'Req_Email' => 'auzanganteng@gmail.com',
        'Req_Jabatan' => 'UI/UX Designer',
        'Req_No' => '08123456789',
        'Req_Address' => 'Rungkut Asri Timur Gang 8',
        'Comp_No' => '82921201'

    ]);
});

Route::get('/agent/details/1', function () {
    return view('agent.details', [
        'title' => 'Agent - Details',
        'id' => '1',
        'Ag_Name' => 'Muhammad Aliif Gadri',
        'Ag_Email' => 'aliif1540@gmail.com',
        'Ag_No' => '08123456789',
        'Ag_Address' => 'Gayungsari Timur MGM 14',
        'Ag_No' => '82921201'

    ]);
});

Route::get('/agent/details/edit/1', function () {
    return view('agent.edit', [
        'title' => 'Agent - Edit',
        'id' => '1',
        'Ag_Name' => 'Muhammad Aliif Gadri',
        'Ag_Email' => 'aliif1540@gmail.com',
        'Ag_No' => '08123456789',
        'Ag_Address' => 'Gayungsari Timur MGM 14',
        'Ag_No' => '82921201'

    ]);
});
// Route::post('/agent/details/edit/{id}', function (Request $request, $id) {
//     DB::table('agent')->where('Ag_ID', '=', $id)->update([
//         'Ag_Name' => $request->Ag_Name,
//         'Ag_Email' => $request->Ag_Email,
//         'Ag_No' => $request->Ag_No,
//         'Ag_Address' => $request->Ag_Address,
//         'Team_Status' => $request->Team_Status
//     ]);
//     return back();
// });

// Route::get("/requester", function () {
//     return view('requester.list', [
//         'title' => 'Requester'
//     ]);
// });

Route::get("/requester/add", function () {
    return view('requester.add', [
        'title' => 'Requester/Tambah Requester'
    ]);
});

Route::get('/requester/add_ticket', function () {
    return view('requester.create_ticket', [
        'title' => 'List Tickets / Buat Ticket'
    ]);
});

// Route::get("/agent", function () {
//     return view('agent.list', [
//         'title' => 'Agent/List'
//     ]);
// });

// Route::get("/agent/add", function () {
//     return view('agent.add', [
//         'title' => 'Agent/Tambah Agent'
//     ]);
// });
Route::get("/agent/delete/{id}", function ($id) {
    DB::table('agent')->where('id', '=', $id)->delete();
    return back();
});

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

Route::get('/ticket/details_ticket', function () {
    return view('ticket/detail_ticket', [
        'title' => 'List Tickets/Detail Ticket'
    ]);
});

Route::get('/settings/setting_admin', function () {
    return view('settings.setting_admin', [
        'title' => 'Setting'
    ]);
});
