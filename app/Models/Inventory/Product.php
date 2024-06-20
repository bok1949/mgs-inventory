<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_code',
        'product_name',
        'description',
        'note',
        'created_at',
        'updated_at',
    ];
    
    public $table = 'products';
}
