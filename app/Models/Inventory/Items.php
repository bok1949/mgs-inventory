<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'supplier_id',
        'product_id',
        'item_qrcode',
        'price',
        'quantity',
        'available',
        'defective',
        'unit_measurement',
        'specification',
        'created_by',
        'created_at',
        'updated_at',
    ];

    public $table = 'items';
}
