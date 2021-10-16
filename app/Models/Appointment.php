<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    // use HasFactory;

    protected $fillable =[
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'start_hour',
        'end_hour',
        'date_of_appointment',
        'approved',
        'section_id',
    ];

    public function section(){
        return $this->belongsTo(Section::class);
    }
}
