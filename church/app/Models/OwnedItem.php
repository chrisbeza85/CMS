<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class OwnedItem extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'item_name',
        'actual_serial_no',
        'status',
        'description',
        'barcode',
        'qr_code',
        'item_value',
        'item_condition',
        'location',
        'supplier_id',
        'customer_id',
        'donor_id',
        'donated_to_id',
        'dept_code',
        'category_id',
        'subcategory_id',
        'year_bought',
        'serial_number',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function donatedTo()
    {
        return $this->belongsTo(DonatedTo::class);
    }

    public function category()
    {
        return $this->belongsTo(EquipmentCategory::class, 'category_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_code', 'dept_code');
    }

    public function subcategory()
    {
        return $this->belongsTo(EquipmentSubcategory::class, 'subcategory_id');
    }

    public function subcategories()
    {
        return $this->hasMany(EquipmentSubcategory::class, 'category_id');
    }
}
