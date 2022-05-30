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
    protected $fillable =[
    'Tick_Date' ,
    'Tick_Subj' ,
    'Tick_Issue',
    'Tick_Type' ,
    'Tick_Status' ,
    ];
}
