<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class requester extends Model
{
    use HasFactory, Notifiable;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Req_Name',
        'Req_Jabatan',
        'Req_Email',
        'Req_Password',
        'Comp_No',
        'Req_No',
        'Req_Address',
        'role_id',
    ];

    protected $hidden = [
        'Req_Password'
    ];
    
}