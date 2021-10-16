<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;


    protected $fillable =[
        'start_hour',
        'end_hour',
        'date_of_schedule',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
