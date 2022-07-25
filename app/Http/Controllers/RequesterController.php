<?php

namespace App\Http\Controllers;

use App\Models\requester;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;

class RequesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //mengecek apakah user sudah mempunyai hak mengakses web atau belum, dalam hal ini yang mempunyai hak akses adalah role requester atau role admin
    public function __construct()
    {
        $this->middleware('role:requester||admin');
    }
    //menampilkan semua data user dengan role "requester" melalui halaman views/requester/list.blade.php
    public function index()
    {
        return view('requester.list',[
            'title' => 'Requester/List Requester',
            'requests' => requester::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //menampilkan halaman views/requestrer/add.blade.php yaitu form untuk membuat user baru dengan role "requester"
    public function create()
    {
        return view('requester.add', [
            'title' => 'Requester/Register Requester',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //menyimpan data inputan di form views/requester/add.blade.php ke database segingga dapat membuat user baru dengan role "requester"
    public function store(Request $request)
    {
        $request->validate([
            'Req_Name' => 'required|max:255',
            'Req_Organization' => 'required|max:255',
            'Req_Jabatan' => 'required|max:255',
            'Req_Email' => 'required|email',
            'Req_Password' => 'required|max:255',
            'Req_PasswordConfirmation' => 'required|max:255|same:Req_Password',
            'Comp_No' => 'required|numeric|min:8',
            'Req_No' => 'required|numeric|min:8',
            'Req_Address' => 'required|max:255',
            'role_id' => 'required'
        ]);
        //menambahkan data di tabel Requester
        requester::create([
            'Req_Name' => $request->Req_Name,
            'Req_Organization' => $request->Req_Organization,
            'Req_Jabatan' => $request->Req_Jabatan,
            'Req_Email' => $request->Req_Email,
            'Req_Password' => Crypt::encrypt($request->Req_Password),
            'Comp_No' => $request->Comp_No,
            'Req_No' => $request->Req_No,
            'Req_Address' => $request->Req_Address,
            'role_id' => $request->role_id,
        ]);
        //menambahkan data di tabel User
        User::create([
            'name' => $request->Req_Name,
            'email' => $request->Req_Email,
            'password' => Hash::make($request->Req_Password),
            'role_id' => $request->role_id, 

        ]);
        $data = [
            'title' => 'Selamat datang',
            'email' => $request->Req_Email,
            'password' => $request->Req_Password,
            'url' => 'http://127.0.0.1:8000/login',

        ];
        //mengirimkan email berisi username dan password agent yang telah dibuatkan oleh admin melalui halaman views/requester/add.blade.php
		Mail::to($request->Req_Email)->send(new Email($data));


        // $request->dd();
        return redirect('/requester')->with('success','Requester has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\requester  $requester
     * @return \Illuminate\Http\Response
     */
    //menampilkan data user dengan role "requester" yang tersimpan di database. data ini ditampilkan di halaman views/requester/details.blade.php
    public function show(requester $requester)
    {
        return view('requester.details', [
            'title' => 'Requester',
            'requester' => $requester
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\requester  $requester
     * @return \Illuminate\Http\Response
     */
    //menampilkan form views/requester/edit.blade.php yang berisi data user dengan role "requester" sesuai id yang dipilih untuk dilakukan edit data user tersebut
    public function edit(requester $requester)
    {
        return view('requester.edit',[
            'title' => 'requester',
            'id' =>  $requester->id,
            'Req_Name' => $requester->Req_Name,
            'Req_Organization' => $requester->Req_Organization,
            'Req_Jabatan' => $requester->Req_Jabatan,
            'Req_Email' => $requester->Req_Email,
            'Req_Password' => Crypt::decrypt($requester->Req_Password),
            'Comp_No' => $requester->Comp_No,
            'Req_No' => $requester->Req_No,
            'Req_Address' => $requester->Req_Address,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\requester  $requester
     * @return \Illuminate\Http\Response
     */
    //melakukan update data requester yang telah diisikan pada form views/requester/edit.blade.php sebelumnya
    public function update(Request $request, requester $requester)
    {
        $request->validate([
            'Req_Name' => 'required|max:255',
            'Req_Organization' => 'required|max:255',
            'Req_Jabatan' => 'required|max:255',
            'Req_Email' => 'required|email',
            'Req_Password' => 'required|max:255',
            'Req_PasswordConfirmation' => 'required|max:255|same:Req_Password',
            'Comp_No' => 'required|numeric|min:8',
            'Req_No' => 'required|numeric|min:8',
            'Req_Address' => 'required|max:255'
        ]);
        //update data di tabel Requester
        requester::where('id', $requester->id)
            ->update([
                'Req_Name' => $request->Req_Name,
                'Req_Organization' => $request->Req_Organization,
                'Req_Jabatan' => $request->Req_Jabatan,
                'Req_Email' => $request->Req_Email,
                'Req_Password' => Crypt::encrypt($request->Req_Password),
                'Comp_No' => $request->Comp_No,
                'Req_No' => $request->Req_No,
                'Req_Address' => $request->Req_Address
        ]);
        //update data di tabel User
        User::where('email', $requester->Req_Email)
            ->update([
                'name' => $request->Req_Name,
                'email' => $request->Req_Email,
                'password' => Hash::make($request->Req_Password),
        ]);
        return redirect('/requester');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\requester  $requester
     * @return \Illuminate\Http\Response
     */
    //menghapus data agent sesuai id yang dipilih (data dihapus di kedua tabel, yaitu tabel Requester dan tabel User)
    public function destroy(requester $requester)
    {
        requester::destroy($requester->id);
        $del = User::where('email', $requester->Req_Email);
        $del->delete();
        return redirect('/requester');
    }
}