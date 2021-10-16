<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable =[
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'start_date',
        'end_date',
        'section_id',
    ];

}
