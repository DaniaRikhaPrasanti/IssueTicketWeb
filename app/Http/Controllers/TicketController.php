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
        $ticket = Ticket::select('Tick_Req', 'Tick_Subj', 'Tick_Issue')->distinct()->get();
        return view('ticketrequester.list_tickets', [
            'title' => 'List Tickets',
            'tickets' => $ticket
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
        return view('ticketrequester.detail_ticket', [
            'title' => 'Detail Ticket',
            'ticket' => $ticket
        ]);
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
}
