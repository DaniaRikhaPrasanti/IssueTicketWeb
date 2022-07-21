<?php

namespace Database\Seeders;

use App\Models\TicketStatus;
use Illuminate\Database\Seeder;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TicketStatus::create([
            'status' => 'Pending'
        ]);
        TicketStatus::create([
            'status' => 'Open'
        ]);
        TicketStatus::create([
            'status' => 'Work In Progress'
        ]);
        TicketStatus::create([
            'status' => 'Work Done'
        ]);
        TicketStatus::create([
            'status' => 'Resolved'
        ]);
        TicketStatus::create([
            'status' => 'Closed'
        ]);
    }
}
