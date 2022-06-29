<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // select distinct all ticket from ticket table
        $tickets = Ticket::select('*')->distinct()->get();
        return view('ticketrequester.list_tickets', [
            'title' => 'List Tickets',
            'tickets' => $tickets
        ]);


        // old
        // return view('ticketrequester.list_tickets', [
        //     'title' => 'List Tickets',
        //     'tickets' => Ticket::all()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticketrequester.create_ticket', [
            'title' => 'Ticket/Buat Ticket',
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
            'Tick_Subj' => 'required|max:255',
            'Tick_Attach' => 'image|file|max:1024',
            'Tick_Issue' => 'required|max:255',
            'Tick_Type' => 'required|max:255',
        ]);
        //menyimpan gambar di public/storage/ticket-image
        $ticketimages = '';
        if ($request->file('Tick_Attach')) {
            $ticketimages = $request->file('Tick_Attach')->store('ticket-images');
        }
        Ticket::create([
            'Tick_Req' => Auth::user()->name,
            'Tick_Subj' => $request->Tick_Subj,
            'Tick_Issue' => $request->Tick_Issue,
            'Tick_Type' => $request->Tick_Type,
            'Tick_Attach' => $ticketimages,
            'Tick_Status' => 'Pending',
            'Tick_Priority' => 'A',
            'Res_Date' => 'A',
        ]);

        return redirect('/ticket')->with('success', 'Ticket has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        // select * from ticket where id = $id and tick_req = Auth::user()->name 
        $ticketDetail = Ticket::where('id', $ticket->id)
            ->where('Tick_Req', $ticket->Tick_Req)
            ->where('Tick_Subj', $ticket->Tick_Subj)
            ->where('Tick_Issue', $ticket->Tick_Issue)
            ->orderBy('id', 'desc')
            ->get();
        return view('ticketrequester.detail_ticket', [
            'title' => 'Detail Ticket',
            'ticket' => $ticketDetail
        ]);

        // old
        // return view('ticketrequester.detail_ticket', [
        //     'title' => 'Detail Ticket',
        //     'ticket' => $ticket
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        Ticket::destroy($ticket->id);
        return redirect('/ticket');
    }

    public function ticketDetail(Ticket $ticket)
    {
        return view("ticketagent.detail_timeline_ticket");
    }
}
