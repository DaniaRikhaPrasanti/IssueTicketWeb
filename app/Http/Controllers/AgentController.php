<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

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
       
       $validated = $request->validate([
            'Ag_Name' => 'required|max:255',
            'Ag_Email' => 'required|email',
            'Ag_Password' => 'required|max:255',
            'Ag_No' => 'required|numeric|min:8',
            'Ag_Address' => 'required|max:255',
            'Team_Status' => 'boolean',
        ]);

        Agent::create($validated);
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
            'agent' => $agent

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
        $validated = $request->validate([
            'Ag_Name' => 'required|max:255',
            'Ag_Email' => 'required|email',
            'Ag_Password' => 'required|max:255',
            'Ag_No' => 'required|numeric|min:8',
            'Ag_Address' => 'required|max:255',
            'Team_Status' => 'boolean',
        ]);

        Agent::where('id', $agent->id)
            ->update($validated);
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
        $agent->delete();
        return redirect('/agent');
    }

    public function destroyid($id){
        $agent = Agent::findOrFail($id);

        $agent->delete();

        return redirect('/agent')->with('mssg','Agent Deleted');

    }
}