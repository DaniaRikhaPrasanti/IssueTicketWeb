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
    protected $table = 'ticket_convs';
    //kolom yang dapat di input 
    protected $fillable =[
    'Log_Creator' ,
    'Log_Title' ,
    'Log_Desc',
    'Log_Attachment' ,
    'Tick_Status' ,
    ];
}
