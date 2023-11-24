<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Product';
        $collection = Product::get();
        return view('pages.admin.product.index', compact('collection') , $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::get();
        $data['title'] = "Product New";
        return view('pages.admin.product.new', compact('category') , $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'category' => 'required',
            'stock' => 'required',
            'description' => 'required',
            // 'size' => 'required',
            // 'color' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'photo' => 'required|image',
        ]);

        $imagePath = request()->file('photo')->store('images');

        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->stock = $request->stock;
        $product->description = $request->description;
        // $product->size = $request->size;
        // $product->color = $request->color;
        $product->brand = $request->brand;
        $product->price = Str::of($request->price)->replace(',','') ?: 0;
        $product->image = $imagePath;
        $product->save();

        return redirect()->route('admin.product')->with('success', 'Product created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $id)
    {
        $data['title'] = 'Product Edit';
        $data['id'] = $id;
        $category = Category::get();
        return view('pages.admin.product.edit', compact('category') , $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category' => 'required',
            'stock' => 'required',
            'description' => 'required',
            // 'size' => 'required',
            // 'color' => 'required',
            'brand' => 'required',
            'price' => 'required',
        ]);

        if(request()->file('photo')) {
            $validator = $request->validate([
                'photo' => 'required|image',
            ]);
            $imagePath = request()->file('photo')->store('images');
            $id->image = $imagePath;
        }
        $id->name = $request->name;
        $id->category_id = $request->category;
        $id->stock = $request->stock;
        $id->description = $request->description;
        // $id->size = $request->size;
        // $id->color = $request->color;
        $id->brand = $request->brand;
        $id->price = Str::of($request->price)->replace(',','') ?: 0;
        $id->update();

        return redirect()->route('admin.product')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $id)
    {
        $id->delete();
        return redirect()->route('admin.product')->with('success', 'Category deleted successfully.');
    }
}
