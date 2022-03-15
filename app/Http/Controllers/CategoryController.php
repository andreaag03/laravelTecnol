<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::create([
            'title'=> $request->input("cname"),
            'image'=>  $request->input("image"),
            'description' => $request->input("cdescription"),
        ]);
        
        return redirect()->route('category.index');

        /* $request->validate([
            'title' => 'required',
            'image' => 'nullable',
            'description' => 'required'
        ]);

        Category::create($request->all());
        

        return redirect()->route('category.index')
            ->with('success', 'Category created successfully.'); */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $category = Category::find($id);
        $products = Product::query()->where('category_id', $id)->get(); 
        
        return view('category.show', compact('category', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'required',
            'description' => 'required|max:255',
        ]);


        Category::whereId($request->input('cId'))->update($validatedData);
        /* $request->validate([
            'title' => 'required',
            'image' => 'nullable',
            'description' => 'required'
        ]);

        $category->update($request->all()); */
      

        return redirect()->route('category.index')
            ->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->input('category_id');
        Category::destroy($id);
        return redirect()->route('category.index');
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getProducts($id)
    {
        $category = Category::find($id);
        
        if (!isset($category)) {
            echo 'This id doesn\'t exist in the database';
            die;
        }

        $arrayInfo = [];
        foreach($category->products as $product) {
            
            foreach ($product->reviews as $review) {
                $arrayReviews[] = [
                    'id' => $review->id,
                    'comment' => $review->comment,
                ];
            }

            $arrayInfo[] = [
                'id'   => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'reviews' => $arrayReviews
            ];
        }

        echo json_encode($arrayInfo);
    }        
}
