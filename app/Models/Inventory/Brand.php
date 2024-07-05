<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_name',
        'note',
        'created_at',
        'updated_at',
    ];

    public $table = 'brands';
    
}