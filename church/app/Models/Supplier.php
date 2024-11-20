<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'phone_no',
        'address',
        'email',
        'company_name',
        'website',
    ];

    public function ownedItems()
    {
        return $this->hasMany(OwnedItem::class);
    }
}
