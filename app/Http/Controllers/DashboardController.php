<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketConv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        // select distinct all ticket from ticket table
        $tickets = Ticket::select('*')->distinct()->get();

        // Chart Sort

        // $ticketperbulan = Ticket::select(DB::raw("COUNT(*) as ticketperbulan"))
        //     ->whereYear('created_at',date('Y'))
        //     ->groupBy(DB::raw("Month(created_at)"))
        //     ->pluck('ticketperbulan');

        // $bulan = Ticket::select(DB::raw("MONTHNAME(created_at) as bulan"))
        //     ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        //     ->pluck('bulan');

        //Ticket Count
        $resolvedcount = Ticket::select(DB::raw("COUNT(*) as resolvedcount"))
            ->where('Tick_Status','=','Resolved')
            ->value('resolvedcount');

        $pendingcount = Ticket::select(DB::raw("COUNT(*) as pendingcount"))
            ->where('Tick_Status','=','Pending')
            ->value('pendingcount');

        $wipcount = Ticket::select(DB::raw("COUNT(*) as pendingcount"))
            ->where('Tick_Status','=','WIP')
            ->value('pendingcount');

        $requestedcount = Ticket::select(DB::raw("COUNT(*) as requestedcount"))
            ->where('Tick_Status','=','Requested')
            ->value('requestedcount');

        return view('dashboard.dashboard_agent', [
            'title' => 'List Tickets',
            'tickets' => $tickets,

            // "ticketperbulan" => $ticketperbulan,
            // "bulan" => $bulan,

            "resolvedcount" => $resolvedcount,
            "pendingcount" => $pendingcount,
            "wipcount" => $wipcount,
            "requestedcount" => $requestedcount,
        ]);
    }


    public function show(Ticket $ticket)
    {
        // select * from ticket where id = $id and tick_req = Auth::user()->name
        $ticketDetail = Ticket::where('id', $ticket->id)
            ->where('Tick_Req', $ticket->Tick_Req)
            ->where('Tick_Subj', $ticket->Tick_Subj)
            ->where('Tick_Issue', $ticket->Tick_Issue)
            ->orderBy('id', 'desc')
            ->get();
        return view('dashboard.dashboard_agent', [
            'title' => 'Detail Ticket',
            'ticket' => $ticketDetail,
            'id_ticket' => $ticket->id,
            'ticketconv' => TicketConv::all()
        ]);
    }


    public function ticketDetail(Ticket $ticket)
    {
        return view("ticketagent.detail_timeline_ticket", compact('ticket'));
    }
}
