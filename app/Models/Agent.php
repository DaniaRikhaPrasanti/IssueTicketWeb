<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Agent extends Model
{
    use HasFactory, Notifiable;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'agents'; 
    protected $fillable =[
    'Ag_Name' ,
    'Ag_Email' ,
    'Ag_Password',
    'Ag_No' ,
    'Ag_Address' ,
    'role_id',
    'Team_Status',
    'role_id',
    
];
}