<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Array with category fields that can be mass-assigned.
     */
    protected $fillable = [
        'title', 'image', 'description'
    ];

    /**
    * Get the products from the category.
    */
    function products() {
        return $this->hasMany(Product::class);
    }

}
