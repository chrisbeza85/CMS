<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable=[
        'date', 'theme', 'elder_on_duty_1','elder_on_duty_2'
    ];

      protected $casts = [
        'date' => 'datetime',
    ];
}
