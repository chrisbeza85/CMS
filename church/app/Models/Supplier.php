<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Supplier extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $fillable =[
        'name',
        'contact_info',
        'phone_no',
        'address',
        'email',
        'website',
        'company_name',
    ];

    public function ownedItems()
    {
        return $this->hasMany(OwnedItem::class);
    }
}
