<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            return view('layouts.app');
        }
        else if(auth()->user()->role_id == 2){
            return view('layouts.appuser');
        }
        else{
            return view('layouts.appuser');
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
