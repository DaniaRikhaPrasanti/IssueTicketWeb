<?php

namespace App\Http\Controllers;

use App\Models\requester;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class RequesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    {
        $request->validate([
            'Req_Name' => 'required|max:255',
            'Req_Jabatan' => 'required|max:255',
            'Req_Email' => 'required|email',
            'Req_Password' => 'required|max:255',
            'Req_PasswordConfirmation' => 'required|max:255|same:Req_Password',
            'Comp_No' => 'required|numeric|min:8',
            'Req_No' => 'required|numeric|min:8',
            'Req_Address' => 'required|max:255'
        ]);


        requester::create([
            'Req_Name' => $request->Req_Name,
            'Req_Jabatan' => $request->Req_Jabatan,
            'Req_Email' => $request->Req_Email,
            'Req_Password' => Crypt::encrypt($request->Req_Password),
            'Comp_No' => $request->Comp_No,
            'Req_No' => $request->Req_No,
            'Req_Address' => $request->Req_Address
        ]);
        User::create([
            'name' => $request->Req_Name,
            'email' => $request->Req_Email,
            'password' => Hash::make($request->Req_Password),
        ]);
        return redirect('/requester')->with('success','Requester has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\requester  $requester
     * @return \Illuminate\Http\Response
     */
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
    public function edit(requester $requester)
    {
        return view('requester.edit',[
            'title' => 'requester',
            'id' =>  $requester->id,
            'Req_Name' => $requester->Req_Name,
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
    public function update(Request $request, requester $requester)
    {
        $request->validate([
            'Req_Name' => 'required|max:255',
            'Req_Jabatan' => 'required|max:255',
            'Req_Email' => 'required|email',
            'Req_Password' => 'required|max:255',
            'Req_PasswordConfirmation' => 'required|max:255|same:Req_Password',
            'Comp_No' => 'required|numeric|min:8',
            'Req_No' => 'required|numeric|min:8',
            'Req_Address' => 'required|max:255'
        ]);

        requester::where('id', $requester->id)
            ->update([
                'Req_Name' => $request->Req_Name,
                'Req_Jabatan' => $request->Req_Jabatan,
                'Req_Email' => $request->Req_Email,
                'Req_Password' => Crypt::encrypt($request->Req_Password),
                'Comp_No' => $request->Comp_No,
                'Req_No' => $request->Req_No,
                'Req_Address' => $request->Req_Address
        ]);
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
    public function destroy(requester $requester)
    {
        requester::destroy($requester->id);
        $del = User::where('email', $agent->Req_Email);
        $del->delete();
        return redirect('/requester');
    }

    public function destroyid($Req_Email){
        $requester = requester::findOrFail($Req_Email);

        $requester->delete();

        return redirect('/requester')->with('mssg','Requester Deleted');

    }
}
