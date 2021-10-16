<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable =[
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'start_hour',
        'end_hour',
        'date_of_consultation',
        'approved',
        'major_id',
    ];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
