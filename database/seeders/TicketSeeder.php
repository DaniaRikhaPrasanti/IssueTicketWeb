<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\TicketConv;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::create([
            'ticket_status_id' => 1,
            'Tick_Req' => 'Ani',
            'Tick_Subj'=> 'Subject ticket seeder',
            'Tick_Issue' => 'Issue ticket seeder',
            'Tick_Attach' => '',
            'Tick_Type' => 'Question',
            'Tick_Priority' => 'Low',
            'Res_Date' => '01/01/2022'
        ]);
        TicketConv::create([
            'Log_Creator' => 'Ani',
            'Log_Creator_Type' =>  '2',
            'Tick_Status' => 1,
            'Log_Title' => 'Log Title ticket seeder',
            'Log_Desc' => 'Log Description ticket seeder',
            'Log_Attachment' => '',
            'ticket_id' => 1,
        ]);
    }
}
