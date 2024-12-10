<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class DonatedTo extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

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
