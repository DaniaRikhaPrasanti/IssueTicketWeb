<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use Illuminate\Support\Facedes\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{
    public function index()
    {
        $agent = DB::table('agent')->get();
        // $nama = Auth::user()->name;


        $data = array(
            'menu' => 'agent',
            'agent' => $agent,
            'title' => 'Agent/List',
            'submenu' => '',
        );

        return view('/agent/list',$data); 
    }

    public function add_agent()
    {
        // $nama = Auth::user()->name;
        $agent = DB::table('agent')->get();

        $data = array(
            'menu' => 'agent',
            'agent' => $agent,
            'title' => 'Agent/Tambah Agent',
            'submenu' => '',
        );

        return view('/agent/add',$data); 
    }

    public function insert_agent(Request $post)
    {

        DB::table('agent')->insert([    
            'Ag_ID' => $post->Ag_ID,     
            'Ag_Name' => $post->Ag_Name,     
            'Ag_Email' => $post->Ag_Email,     
            'Ag_No' => $post->Ag_No,     
            'Ag_Address' => $post->Ag_Address,     
            'Team_Status' => $post->Team_Status,     
        ]);

        // $agent = Agent::create(request(['Ag_ID','Ag_Name', 'Ag_Email', 'Ag_No', 'Ag_Address','Team_Status']));

        return redirect('/agent');
    }

    public function edit_agent($Ag_ID)
    {
        // $nama = Auth::user()->name;
        $agent = DB::table('agent')->where('Ag_ID',$Ag_ID)->get();

        $data = array(
            'menu' => 'agent',
            'agent' => $agent,
            'title' => 'Agent/Edit Agent',
            'submenu' => '',
        );

        return view('/agent/edit',$data); 
    }
    

    public function update_agent(Request $post)
    {   
        DB::table('agent')->where('Ag_ID', $post->Ag_ID)->update([
            'Ag_ID' => $post->Ag_ID,     
            'Ag_Name' => $post->Ag_Name,     
            'Ag_Email' => $post->Ag_Email,     
            'Ag_No' => $post->Ag_No,     
            'Ag_Address' => $post->Ag_Address,     
            'Team_Status' => $post->Team_Status,    
            ]);
    
            return redirect('/agent');
    }
}
