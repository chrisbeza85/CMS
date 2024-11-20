<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentSubcategory extends Model
{
    use HasFactory;

    protected $fillable = ['subcategory_name', 'category_id', 'subcategory_code'];

    public function category()
    {
        return $this->belongsTo(EquipmentCategory::class, 'category_id');
    }

    public function ownedItems()
    {
        return $this->hasMany(OwnedItem::class, 'subcategory_id');
    }
}
