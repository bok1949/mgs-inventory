<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'equipment_id',
        'created_at',
        'updated_at',
    ];

    public $table = 'equipment_categories';
}