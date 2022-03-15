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
        'name', 'image', 'description', 'price', 'category_id', 'user_id'
    ];

    /**
    * Get the reviews from the product.
    */
    function reviews(){
        return $this->hasMany(Review::class);
    }

    /**
    * Get the user that owns the product.
    */
    function user(){
        return $this->belongsTo(User::class);
    }

    /**
    * Get the category of the product.
    */
    function category(){
        return $this->belongsTo(Category::class);
    }
  
}
