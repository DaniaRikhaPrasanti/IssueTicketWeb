<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketConv;
use App\Models\TicketStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //menampilkan semua data pada tabel Ticket melalui halaman views/dashboard/dashboard_agent.blade.php
    public function index()
    {

        $newticket = Ticket::select('*')
            ->orderBy('updated_at', 'desc')
            ->limit(3)
            ->get();
            //dd($newticket);

        // Chart Sort
        $bulanke = ['January', 'February', 'March','April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        $tahun = Ticket::select(DB::raw("date_part('year', created_at) as tahun"))
            ->groupBy(DB::raw("date_part('year', created_at)"))
            ->pluck('tahun');
            //dd($tahun);

        $bulan = Ticket::select(DB::raw("date_part('month', created_at) as bulan"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("date_part('month', created_at)"))
            ->pluck('bulan');
            //dd($bulan);

        $namabulan = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($bulan as $index => $month){
            $namabulan[$month - 1] = $bulanke[$index];
        }
        //dd($namabulan);

        $ticketperbulan = Ticket::select(DB::raw("COUNT(*) as ticketperbulan"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("date_part('month', created_at)"))
            ->pluck('ticketperbulan');
           //dd($ticketperbulan);

        $ticketperbulanresolved = Ticket::select(DB::raw("COUNT(*) as ticketperbulanresolved"))
            ->where('ticket_status_id','=','5')
            ->groupBy(DB::raw("date_part('month', created_at)"))
            ->pluck('ticketperbulanresolved');
            //dd($ticketperbulanresolved);

        $ticketperbulanpending = Ticket::select(DB::raw("COUNT(*) as ticketperbulanpending"))
            ->where('ticket_status_id','=','1')
            ->groupBy(DB::raw("date_part('month', created_at)"))
            ->pluck('ticketperbulanpending');
            //dd($ticketperbulanpending);

        $ticketperbulanwip = Ticket::select(DB::raw("COUNT(*) as ticketperbulanwip"))
            ->where('ticket_status_id','=','3')
            ->groupBy(DB::raw("date_part('month', created_at)"))
            ->pluck('ticketperbulanwip');
            //dd($ticketperbulanwip);

        $ticketperbulanrequest = Ticket::select(DB::raw("COUNT(*) as ticketperbulanrequest"))
            ->where('ticket_status_id','=','0')
            ->groupBy(DB::raw("date_part('month', created_at)"))
            ->pluck('ticketperbulanrequest');
            //dd($ticketperbulanrequest);

        // //Ticket Count
        $resolvedcount = Ticket::select(DB::raw("COUNT(*) as resolvedcount"))
            ->where('ticket_status_id','=','5')
            ->value('resolvedcount');

        $pendingcount = Ticket::select(DB::raw("COUNT(*) as pendingcount"))
            ->where('ticket_status_id','=','1')
            ->value('pendingcount');
            //dd($pendingcount);

        $wipcount = Ticket::select(DB::raw("COUNT(*) as pendingcount"))
            ->where('ticket_status_id','=','3')
            ->value('pendingcount');

        $requestedcount = Ticket::select(DB::raw("COUNT(*) as requestedcount"))
            ->where('ticket_status_id','=','0')
            ->value('requestedcount');

        return view('dashboard.dashboard_agent', [
            'title' => 'List Tickets',
            'newticket' => $newticket,
            "namabulan" => $namabulan,

            "ticketperbulan" => $ticketperbulan,

            "resolvedcount" => $resolvedcount,
            "pendingcount" => $pendingcount,
            "wipcount" => $wipcount,
            "requestedcount" => $requestedcount,
        ]);
    }

    //menampilkan semua data pada tabel Ticket melalui halaman views/dashboard/dashboard_agent.blade.php dalam bentuk list
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

    //menampilkan data ticket sesuai id yang dipilih ke halaman views/ticketagent/detail_timeline_ticket.blade.php
    public function ticketDetail(Ticket $ticket)
    {
        return view("ticketagent.detail_timeline_ticket", compact('ticket'));
    }
}
