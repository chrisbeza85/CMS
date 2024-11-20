<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutboundItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'quantity',
        'customer_id',
        'date_sent',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
