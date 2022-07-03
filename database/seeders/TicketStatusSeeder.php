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
        $t_status = [
            [
                'status' => 'Pending'
            ],
            [
                'status' => 'Open'
            ],
            [
                'status' => 'WIP'
            ],
            [
                'status' => 'Work Done'
            ],
            [
                'status' => 'Resolved'
            ],
            [
                'status' => 'Closed'
            ],
        ];

        foreach($t_status as $status){
            TicketStatus::create($status);
        }
    }
}
