<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Ticket;
use App\Models\TicketConv;
use App\Models\TicketStatus;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //menampilkan data pada tabel Ticket sesuai dengan role yang mengakses
    public function index()
    {
        // select distinct all ticket from ticket table
        // $tickets = Ticket::select('*')->distinct()->get();
        $tickets_admin = Ticket::all();
        $tickets = Ticket::where('Tick_Req', auth()->user()->name)->get();
        // dd($tickets);
        // dd($tickets_admin);
        if (auth()->user()->role_id == 2) {
            return view('ticketrequester.list_tickets', [
                'title' => 'List Tickets',
                'tickets' => $tickets

            ]);
        }else if (auth()->user()->role_id == 3){
            return view('ticketagent.list_tickets', [
                'title' => 'List Tickets',
                'tickets' => $tickets_admin
            ]);
        }else{
            return view('ticketagent.list_tickets', [
                'title' => 'List Tickets',
                'tickets' => $tickets_admin
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //menampilkan halaman views/ticketrequester/create_ticket.blade.php yaitu form untuk membuat ticket baru milik user dengan role "requester"
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
    //menyimpan data inputan di form views/ticketrequester/create_ticket.blade.php ke tabel Ticket 
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
            'ticket_status_id' => 1,
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
    //menampilkan data pada tabel Ticket sesuai dengan user yang mengakses. 
    public function show(Ticket $ticket)
    {
        // select * from ticket where id = $id and tick_req = Auth::user()->name 
        $ticketDetail = Ticket::where('id', $ticket->id)
            ->where('Tick_Req', $ticket->Tick_Req)
            ->where('Tick_Subj', $ticket->Tick_Subj)
            ->where('Tick_Issue', $ticket->Tick_Issue)
            ->orderBy('id', 'desc')
            ->get();
        //menampilkan tiketconv berdasarkan tiket_id
        $ticket_user = Ticket::where('id', $ticket->id)->get();
        $ticketconv = TicketConv::where('ticket_id',$ticket->id)->get();
        $ticket_status = TicketStatus::all();
        // dd($ticketDetail);
        //jika requester yang mengakses maka data akan ditampilkan melalui halaman views/ticketreuester/detail_ticket.blade.php
        if (auth()->user()->role_id == 2) {
            return view('ticketrequester.detail_ticket', [
                'title' => 'Detail Ticket',
                'tickets' => $ticketDetail,
                'id_ticket' => $ticket->id,
                'ticketconv' =>  $ticketconv,
                'ticket_status' => $ticket_status,
                'priority' => $ticket_user,
            ]);
            //jika agent yang mengakses maka data akan ditampilkan melalui halaman views/ticketagent/detail_ticket.blade.php
        }else{
            return view('ticketagent.detail_ticket', [
                'title' => 'Detail Ticket',
                'tickets' => $ticketDetail,
                'id_ticket' => $ticket->id,
                'ticketconv' =>  $ticketconv,
                'ticket_status' => $ticket_status,
                'priority' => $ticket_user,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    //menyimpan perubahan data status dan prioritas melalui halaman views/ticketrequester/detail_ticket.blade.php atau views/ticketagent/detail_ticket.blade.php. perubahan data terjadi di tabel Ticket pada kolom ticket_status_id dan Tick_Priority
    public function update(Request $request, $id)
    {   
        //validasi form update
        $request->validate([
            'status' => 'required',
        ]);
        //update status tiket di tabel tiket
        Ticket::where('id', $id)
            ->update([
                'ticket_status_id' => $request->status,
                'Tick_Priority' => $request->priority,
            ]);
        return redirect('/ticket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    //menghapus data pada tabel Ticket sesuai id yang dipilih
    public function destroy(Ticket $ticket)
    {
        Ticket::destroy($ticket->id);
        return redirect('/ticket');
    }

    //menampilkan halaman views/ticketagent/detail_timeline_ticket.blade.php yang menampilkan data pada tabel Ticket
    public function ticketDetail(Ticket $ticket)
    {
        return view("ticketagent.detail_timeline_ticket", compact('ticket'));
    }
}
