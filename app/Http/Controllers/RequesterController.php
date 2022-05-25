<?php

namespace App\Http\Controllers;

use App\Models\requester;
use Illuminate\Http\Request;

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
        $validated = $request->validate([
            'Req_Name' => 'required|max:255',
            'Req_Jabatan' => 'required|max:255',
            'Req_Email' => 'required|email',
            'Req_Password' => 'required|max:255',
            'Comp_No' => 'required|numeric|min:8',
            'Req_No' => 'required|numeric|min:8',
            'Req_Address' => 'required|max:255'
        ]);

        requester::create($validated);
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
            'requester' => $requester
            
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
        $validated = $request->validate([
            'Req_Name' => 'required|max:255',
            'Req_Jabatan' => 'required|max:255',
            'Req_Email' => 'required|email',
            'Req_Password' => 'required|max:255',
            'Comp_No' => 'required|numeric|min:8',
            'Req_No' => 'required|numeric|min:8',
            'Req_Address' => 'required|max:255'
        ]);

        requester::where('id', $requester->id)
            ->update($validated);
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
        return redirect('/requester');
    }

    public function destroyid($id){
        $requester = requester::findOrFail($id);

        $requester->delete();

        return redirect('/requester')->with('mssg','Requester Deleted');

    }
}
