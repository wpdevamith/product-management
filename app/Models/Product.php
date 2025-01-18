<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define fields allowed for mass assignment
    protected $fillable = [
        'product_id',
        'name',
        'description',
        'price',
        'stock',
        'image',
    ];
}
