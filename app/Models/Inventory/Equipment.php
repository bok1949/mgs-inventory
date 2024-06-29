<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'maker',
        'equipment_no',
        'plate_no',
        'engine_no',
        'chassis_no',
        'equipment_description',
        'date_purchased',
        'equipment_note',
        'created_at',
        'updated_at',
    ];

    public $table = 'equipments';
}