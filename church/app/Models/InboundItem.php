<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InboundItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'quantity',
        'supplier_id',
        'date_received',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
