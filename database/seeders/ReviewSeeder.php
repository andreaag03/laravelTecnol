<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Product;
use App\Models\User;
use Faker\Factory;


class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();

        foreach($products as $product){
            Review::factory()
                ->count(2)
                ->for(
                    Product::find($product->id)
                )
                ->create();
        }
    }
}
