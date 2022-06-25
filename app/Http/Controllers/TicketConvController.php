<?php

namespace App\Http\Controllers;

use App\Models\TicketConv;
use Illuminate\Http\Request;
use Auth;

class TicketConvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('ticketconv.add_response', [
            'title' => 'Respond Tickets - Question',
            'ticketconv' => TicketConv::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('ticketconv.add_response', [
        //     'title' => 'Respond Tickets - Question',
        //     'ticketconv' => TicketConv::all()
        // ]);

        return view('ticketconv.add_response', [
            'title' => 'Respond Tickets - Question',
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
        //
        $request->validate([
            'Log_Title' => 'required|max:255',
            'Log_Desc' => 'required|max:255',
        ]);
        $ticketimages = '';
        if ($request->file('Log_Attachment')) {
            $ticketimages = $request->file('Log_Attachment')->store('ticket-images');
        }

        TicketConv::create([
            'Log_Creator' => Auth::user()->name,
            'Log_Title' => $request->Log_Title,
            'Log_Desc' => $request->Log_Desc,
            'Log_Attachment' => $ticketimages,
            'Tick_Status' => 'WIP',
        ]);

        return redirect('/ticketconv')->with('success', 'Response has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TicketConv  $ticketConv
     * @return \Illuminate\Http\Response
     */
    public function show(TicketConv $ticketConv)
    {
        //

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TicketConv  $ticketConv
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketConv $ticketConv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TicketConv  $ticketConv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketConv $ticketConv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TicketConv  $ticketConv
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketConv $ticketConv)
    {
        //
    }
}