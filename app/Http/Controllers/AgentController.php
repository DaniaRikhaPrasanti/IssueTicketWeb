<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //mengecek apakah user sudah mempunyai hak mengakses web atau belum, dalam hal ini yang mempunyai hak akses adalah role agent atau role admin
    public function __construct()
    {
        $this->middleware('role:agent||admin');
    }

    //menampilkan semua data user dengan role "agent" melalui halaman views/agent/list.blade.php
    public function index()
    {
        $datas = Agent::all();
        return view('agent.list', [
            'title' => 'agent',
        ], compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //menampilkan halaman views/agent/add.blade.php yaitu form untuk membuat user baru dengan role "agent"
    public function create()
    {
        $model = new Agent;
        return view('agent.add', [
            'title' => 'Agent',
        ] , compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //menyimpan data inputan di form views/agent/add.blade.php ke database segingga dapat membuat user baru dengan role "agent"
    public function store(Request $request)
    {
       
       $request->validate([
            'Ag_Name' => 'required|max:255',
            'Ag_Email' => 'required|email',
            'Ag_Password' => 'required|max:255',
            'Ag_PasswordConfirmation' => 'required|max:255|same:Ag_Password',
            'Ag_No' => 'required|numeric|min:8',
            'Ag_Address' => 'required|max:255',
            'Team_Status' => 'boolean',
            'role_id' => 'required'
        ]);
        //menambahkan data di tabel agent
        Agent::create([
            'Ag_Name' => $request->Ag_Name,
            'Ag_Email' => $request->Ag_Email,
            'Ag_Password' => Crypt::encrypt($request->Ag_Password),
            'Ag_No' => $request->Ag_No,
            'Ag_Address' => $request->Ag_Address,
            'Team_Status' => $request->boolean('Team_Status'),
            'role_id' => $request->role_id,
        ]);
        //menambahkan data di tabel user (agar user bisa login)
        User::create([
            'name' => $request->Ag_Name,
            'email' => $request->Ag_Email,
            'password' => Hash::make($request->Ag_Password),
            'role_id' => $request->role_id,
        ]);
        $data = [
            'title' => 'Selamat datang',
            'email' => $request->Ag_Email,
            'password' => $request->Ag_Password,
            'url' => 'https://issueticketweb.id',

        ];
        //mengirimkan email berisi username dan password agent yang telah dibuatkan oleh admin melalui halaman views/agent/add.blade.php
		Mail::to($request->Ag_Email)->send(new Email($data));


        // $request->dd();
        return redirect('/agent')->with('success','Agent has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    //menampilkan data user dengan role "agent" yang tersimpan di database. data ini ditampilkan di halaman views/agent/details.blade.php
    public function show(Agent $agent)
    {
        return view('agent.details', [
            'title' => 'Agent/Details',
            'agent' => $agent
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    //menampilkan form views/agent/edit.blade.php yang berisi data user dengan role "agent" sesuai id yang dipilih untuk dilakukan edit data user tersebut
    public function edit(Agent $agent)
    {
    
        return view('agent.edit',[
            'title' => 'agent',
            'id' => $agent->id,
            'Ag_Name' => $agent->Ag_Name,
            'Ag_Email' => $agent->Ag_Email,
            'Ag_Password' => Crypt::decrypt($agent->Ag_Password),
            'Ag_No' => $agent->Ag_No,
            'Ag_Address' => $agent->Ag_Address,
            'Team_Status' => $agent->Team_Status,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    //melakukan update data agent yang telah diisikan pada form views/agent/edit.blade.php sebelumnya
    public function update(Request $request, Agent $agent)
    {
        $request->validate([
            'Ag_Name' => 'required|max:255',
            'Ag_Email' => 'required|email',
            'Ag_Password' => 'required|max:255',
            'Ag_PasswordConfirmation' => 'required|max:255|same:Ag_Password',
            'Ag_No' => 'required|numeric|min:8',
            'Ag_Address' => 'required|max:255',
            'Team_Status' => 'boolean',
        ]);
        //update data di tabel agent
        Agent::where('id', $agent->id)
            ->update([
                'Ag_Name' => $request->Ag_Name,
                'Ag_Email' => $request->Ag_Email,
                'Ag_Password' => Crypt::encrypt($request->Ag_Password),
                'Ag_No' => $request->Ag_No,
                'Ag_Address' => $request->Ag_Address,
                'Team_Status' => $request->boolean('Team_Status'),
            ]);
        //update data di tabel user
        User::where('email', $agent->Ag_Email)
            ->update([
                'name' => $request->Ag_Name,
                'email' => $request->Ag_Email,
                'password' => Hash::make($request->Ag_Password),
        ]);
        return redirect('/agent');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    //menghapus data agent sesuai id yang dipilih (data dihapus di kedua tabel, yaitu tabel agent dan tabel user)
    public function destroy(Agent $agent)
    {
        Agent::destroy($agent->id);
        $del = User::where('email', $agent->Ag_Email);
        $del->delete();
        return redirect('/agent');
    }

}