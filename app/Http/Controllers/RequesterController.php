<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Storage;
use Illuminate\Support\Facades\Auth;
use DB;


class RequesterController extends Controller
{
    //
    public function index()
    {
        $requester = DB::table('requester')->get();
        // $nama = Auth::user()->name;


        $data = array(
            'menu' => 'requester',
            'requester' => $requester,
            'submenu' => '',
        );

        return view('/requester/add',$data); 
    }

    public function insert_requester()
    {
        // $nama = Auth::user()->name;
        $requester = DB::table('requester')->get();

        $data = array(
            'menu' => 'requester',
            'requester' => $requester,
            'submenu' => '',
        );

        return view('/requester/list',$data); 
    }

}
