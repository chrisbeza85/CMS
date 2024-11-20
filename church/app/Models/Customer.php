<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_info',
        'phone_no',
        'address',
        'email',
    ];

    public function ownedItems()
    {
        return $this->hasMany(OwnedItem::class);
    }
}
