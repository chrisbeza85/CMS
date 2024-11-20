<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['dept_name', 'dept_code'];

    public function ownedItems()
    {
        return $this->hasMany(OwnedItem::class, 'dept_code');
    }
}
