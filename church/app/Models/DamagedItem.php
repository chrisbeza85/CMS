<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DamagedItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'quantity',
        'damage_description',
        'date_damaged',
    ];
}
