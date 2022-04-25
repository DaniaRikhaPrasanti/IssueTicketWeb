<?php

use Illuminate\Support\Facades\Route;

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

Route::get("/requester", function () {
    return view('requester.list', [
        'title' => 'Requester'
    ]);
});

Route::get("/requester/add", function(){
    return view('requester.add',[
        'title' => 'Requester/Tambah Requester'
    ]);
});

Route::get('/requester/add_ticket', function () {
    return view('requester.create_ticket', [
        'title' => 'List Tickets / Buat Ticket'
    ]);
});

Route::get("/agent/add", function(){
    return view('agent.add',[
        'title' => 'Agent/Tambah Agent'
    ]);
});
