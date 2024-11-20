<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonatedTo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'email', 
        'phone', 
        'email',
    ];

    public function ownedItems()
    {
        return $this->hasMany(OwnedItem::class);
    }
}
