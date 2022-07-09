<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ticket extends Model
{
    use HasFactory,  Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'ticket';
    //kolom yang dapat di input 
    protected $fillable =[
    'Tick_Req' ,
    'Tick_Issue',
    'Tick_Type' ,
    'Tick_Attach',
    'Tick_Subj' ,
    'Tick_Status',
    'Tick_Priority' ,
    'Res_Date',
    ];

    public function ticketconv()
    {
        return $this->belongsTo(TicketConv::class, 'ticket_id', 'id');
        
    }
}
