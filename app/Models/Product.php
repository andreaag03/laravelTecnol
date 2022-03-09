<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Array with product fields that can be mass-assigned.
     */
    protected $fillable = [
        'name', 'image', 'description', 'price', 'category_id'
    ];
  
}
