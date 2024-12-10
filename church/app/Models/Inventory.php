<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'image', 'price', 'quantity', 'category', 
        'condition', 'serial_number', 'qr_code', 'purchase_date'
    ];

    protected $casts = [
        'purchase_date' => 'datetime',
    ];
}
