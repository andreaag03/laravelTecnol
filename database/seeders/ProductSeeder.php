<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
        $categories = Category::all();

        //Create two products for each category
        foreach($categories as $category){
            Product::factory()
                ->count(2)
                ->for(
                    Category::find($category->id)
                ) 
                ->create();
        }
        
    }
}
