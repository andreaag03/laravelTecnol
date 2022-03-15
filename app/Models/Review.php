<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
    * Array with review fields that can be mass-assigned.
    */
    protected $fillable = [
        'comment', 'user_id', 'product_id'
    ];

    /**
    * Get the product where the review is located.
    */
    function product(){
        return $this->belongsTo(Product::class);
    }

    /**
    * Get the user who writes the review.
    */
    function user(){
        return $this->belongsTo(User::class);
    }

}
