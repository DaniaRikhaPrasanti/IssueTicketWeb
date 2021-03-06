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
    protected $fillable = [
        'ticket_status_id',
        'Tick_Req',
        'Tick_Subj',
        'Tick_Issue',
        'Tick_Attach',
        'Tick_Type',
        'Tick_Priority',
        'Res_Date'
    ];
    protected $table = 'ticket';
    //kolom yang dapat di input 
    protected $guarded =['id'];

    public function ticketconv()
    {
        return $this->hasMany(TicketConv::class, 'ticket_id', 'id');
        
    }
    public function TicketStatus()
    {
        return $this->belongsTo(TicketStatus::class,'ticket_status_id');
    }
    public function requester()
    {
        return $this->belongsTo(requester::class,'requester_id');
    }
}
