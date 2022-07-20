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
    protected function redirectTo()
    {
        if (auth()->user()->role_id == 1) {
            return redirect('dashboard/dashboard_agent',);
        }
        else if(auth()->user()->role_id == 2){
            $tickets = Ticket::where('Tick_Req', auth()->user()->name)->get();
            return view('ticketrequester.list_tickets', [
                'title' => 'List Tickets',
                'tickets' => $tickets
            ]);
        }
        else{
            //return redirect('dashboard/dashboard_agent');
            $tickets = Ticket::select('*')->distinct()->get();
            return view('ticketagent.list_tickets', [
                'title' => 'List Tickets',
                'tickets' => $tickets
            ]);
        }
    }
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
