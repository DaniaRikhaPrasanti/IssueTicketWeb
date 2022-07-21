<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TicketConv extends Model
{
    use HasFactory,  Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Log_Creator',
        'Log_Creator_Type',
        'Tick_Status',
        'Log_Title',
        'Log_Desc',
        'Log_Attachment',
        'ticket_id',
    ];
    protected $table = 'ticket_convs';
    //kolom yang dapat di input 
    protected $guarded =['id'];
    public function get_ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'id');
        
    }
    
}
