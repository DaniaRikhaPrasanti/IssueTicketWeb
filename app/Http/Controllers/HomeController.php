<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\requester;
use App\Models\Agent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //mengarahkan halaman utama untuk setiap role
    protected function redirectTo()
    {
        //saat admin berhasil login, admin akan diarahkan ke halaman views/dashboard/dashboard_agent.blade.php
        if (auth()->user()->role_id == 1) {
            return redirect('dashboard/dashboard_agent',);
        }
        //saat requester berhasil login, requester akan diarahkan ke halaman views/ticketrequester/list_tickets.blade.php
        else if(auth()->user()->role_id == 2){
            $tickets = Ticket::where('Tick_Req', auth()->user()->name)->get();
            return view('ticketrequester.list_tickets', [
                'title' => 'List Tickets',
                'tickets' => $tickets
            ]);
        }
        //saat agent berhasil login, agent akan diarahkan ke halamanviews/dashboard/dashboard_agent.blade.php
        else{
            return redirect('dashboard/dashboard_agent');
        }
    }
    //melakukan authentikasi data user yang login
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

}
