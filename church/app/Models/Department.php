<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Department extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $fillable = ['dept_name', 'dept_code'];

    public function ownedItems()
    {
        return $this->hasMany(OwnedItem::class, 'dept_code');
    }
}
