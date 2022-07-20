<?php

namespace App\Http\Controllers;

use App\Models\TicketConv;
use App\Models\Ticket;
use App\Models\TicketStatus;
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
        
        // return view('ticketrequester.detail_ticket', [
        //     'title' => 'Respond Tickets - Question',
        //     'ticketconv' => TicketConv::all()
        // ]);
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
    
    public function ticketConv($id)
    {
        return view('ticketconv.add_response', [
            'title' => 'Respond Tickets - Question',
            'ticket_id' => $id,
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
        //mengambil data tiket_id
        $ticketstatusconv = Ticket::where('id',$request->ticket_id)->first();
        // $ticketstatus = TicketStatus::where('id', $ticketstatusconv)->first();
        // dd($ticketstatusconv);
        TicketConv::create([
            'Log_Creator' => Auth::user()->name,
            'Log_Creator_Type' =>  Auth::user()->role_id,
            'Tick_Status' => $ticketstatusconv->ticket_status_id,
            'Log_Title' => $request->Log_Title,
            'Log_Desc' => $request->Log_Desc,
            'Log_Attachment' => $ticketimages,
            'ticket_id' => $request->ticket_id,
        ]);

        return redirect('/ticket')->with('success', 'Response has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TicketConv  $ticketConv
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // memerikSa id tiket_conv dengan id yang dikirim unutk ditampilkan ke timeline tiketconv 
        $ticketConv = TicketConv::where('id', $id)->first();
        // dd($ticketConv);
        return view('ticketrequester.timeline_convdetails', [
            'title' => 'Timeline Detail ',
            'ticketConv' => $ticketConv
        ]);
        
    }
    
    public function show2($id)
    {
        // memerikSa id tiket_conv dengan id yang dikirim unutk ditampilkan ke timeline tiketconv 
        $ticketConv = TicketConv::where('id', $id)->first();
        // dd($ticketConv);
        return view('ticketagent.timeline_convdetails', [
            'title' => 'Timeline Detail ',
            'ticketConv' => $ticketConv
        ]);
        
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

    public function test(TicketConv $ticketConv)
    {
        return view('ticketconv.after_pending');
    }
}
