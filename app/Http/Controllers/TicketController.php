<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas = Ticket::all();
        return view('ticket.list_tickets', [
            'title' => 'List Tickets',
        ], compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticket.create_ticket', [
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
            'Req_Name' => 'required|max:255',
            'Req_Jabatan' => 'required|max:255',
            'Req_Email' => 'required|email',
            'Req_Password' => 'required|max:255',
            'Req_PasswordConfirmation' => 'required|max:255|same:Req_Password',
            'Comp_No' => 'required|numeric|min:8',
            'Req_No' => 'required|numeric|min:8',
            'Req_Address' => 'required|max:255'
        ]);


        requester::create([
            'Req_Name' => $request->Req_Name,
            'Req_Jabatan' => $request->Req_Jabatan,
            'Req_Email' => $request->Req_Email,
            'Req_Password' => Crypt::encrypt($request->Req_Password),
            'Comp_No' => $request->Comp_No,
            'Req_No' => $request->Req_No,
            'Req_Address' => $request->Req_Address
        ]);
        return redirect('/requester')->with('success','Requester has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\requester  $requester
     * @return \Illuminate\Http\Response
     */
    public function show(requester $requester)
    {
        return view('requester.details', [
            'title' => 'Requester',
            'requester' => $requester
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\requester  $requester
     * @return \Illuminate\Http\Response
     */
    public function edit(requester $requester)
    {
        return view('requester.edit',[
            'title' => 'requester',
            'id' =>  $requester->id,
            'Req_Name' => $requester->Req_Name,
            'Req_Jabatan' => $requester->Req_Jabatan,
            'Req_Email' => $requester->Req_Email,
            'Req_Password' => Crypt::decrypt($requester->Req_Password),
            'Comp_No' => $requester->Comp_No,
            'Req_No' => $requester->Req_No,
            'Req_Address' => $requester->Req_Address,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\requester  $requester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, requester $requester)
    {
        $request->validate([
            'Req_Name' => 'required|max:255',
            'Req_Jabatan' => 'required|max:255',
            'Req_Email' => 'required|email',
            'Req_Password' => 'required|max:255',
            'Req_PasswordConfirmation' => 'required|max:255|same:Req_Password',
            'Comp_No' => 'required|numeric|min:8',
            'Req_No' => 'required|numeric|min:8',
            'Req_Address' => 'required|max:255'
        ]);

        requester::where('id', $requester->id)
            ->update([
                'Req_Name' => $request->Req_Name,
            'Req_Jabatan' => $request->Req_Jabatan,
            'Req_Email' => $request->Req_Email,
            'Req_Password' => Crypt::encrypt($request->Req_Password),
            'Comp_No' => $request->Comp_No,
            'Req_No' => $request->Req_No,
            'Req_Address' => $request->Req_Address
        ]);
        return redirect('/requester');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\requester  $requester
     * @return \Illuminate\Http\Response
     */
    public function destroy(requester $requester)
    {
        requester::destroy($requester->id);
        return redirect('/requester');
    }

    public function destroyid($id){
        $requester = requester::findOrFail($id);

        $requester->delete();

        return redirect('/requester')->with('mssg','Requester Deleted');

    }
}
