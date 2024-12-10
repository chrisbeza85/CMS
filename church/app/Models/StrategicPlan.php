<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrategicPlan extends Model
{
    use HasFactory;
    protected $fillable=[
        'name', 'theme', 'description', 'startyear', 'finishyear', 
    ];

      protected $casts = [
        'startdate' => 'date',
        'finishdate' => 'date',
    ];
}
