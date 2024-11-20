<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_name', 'category_code'];

    public function ownedItems()
    {
        return $this->hasMany(OwnedItem::class, 'category_id');
    }

    public function subcategories()
    {
        return $this->hasMany(EquipmentSubcategory::class, 'category_id');
    }
}
