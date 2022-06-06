<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        ]);
        Agent::create([
            'Ag_Name' => $request->Ag_Name,
            'Ag_Email' => $request->Ag_Email,
            'Ag_Password' => Crypt::encrypt($request->Ag_Password),
            'Ag_No' => $request->Ag_No,
            'Ag_Address' => $request->Ag_Address,
            'Team_Status' => $request->boolean('Team_Status'),
        ]);
        return redirect('/agent')->with('success','Agent has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        //
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
    public function update(Request $request, Agent $agent)
    {

        //
        $request->validate([
            'Ag_Name' => 'required|max:255',
            'Ag_Email' => 'required|email',
            'Ag_Password' => 'required|max:255',
            'Ag_PasswordConfirmation' => 'required|max:255|same:Ag_Password',
            'Ag_No' => 'required|numeric|min:8',
            'Ag_Address' => 'required|max:255',
            'Team_Status' => 'boolean',
        ]);

        Agent::where('id', $agent->id)
            ->update([
                'Ag_Name' => $request->Ag_Name,
                'Ag_Email' => $request->Ag_Email,
                'Ag_Password' => Crypt::encrypt($request->Ag_Password),
                'Ag_No' => $request->Ag_No,
                'Ag_Address' => $request->Ag_Address,
                'Team_Status' => $request->boolean('Team_Status'),
            ]);
        return redirect('/agent');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        //
        Agent::destroy($agent->id);
        return redirect('/agent');
    }

    public function destroyid($id){
        $agent = Agent::findOrFail($id);
        $agent->delete();
        return redirect('/agent')->with('mssg','Agent Deleted');

    }
}