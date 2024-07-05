<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_name',
        'address',
        'phone_number',
        'landline',
        'created_at',
        'updated_at',
    ];

    public $table = 'suppliers';
}
