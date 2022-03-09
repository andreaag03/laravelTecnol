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
}
