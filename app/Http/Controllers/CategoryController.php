<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "Category";
        $collection = Category::get();
        return view('pages.admin.category.index', compact('collection') , $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "Category New";
        return view('pages.admin.category.new', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validator = $request->validate([
        'name' => 'required|unique:categories|max:255',
        'description' => 'required',
        'image' => 'required|image',
    ]);

    $imagePath = request()->file('image')->store('images');
    $category = new Category;
    $category->name = $request->name;
    $category->description = $request->description;
    $category->image = $imagePath;
    $category->save();

    return redirect()->route('admin.category')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $id)
    {
        $data['title'] = "Category Edit";
        $data['id'] = $id;
        return view('pages.admin.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $id)
    {
        $validator = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'required',
        ]);

        if(request()->file('image')) {
            $validator = $request->validate([
                'image' => 'required|image',
            ]);
            $imagePath = request()->file('image')->store('images');
            $id->image = $imagePath;
        }
        $id->name = $request->name;
        $id->description = $request->description;
        $id->update();

        return redirect()->route('admin.category')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $id)
    {
        $id->delete();
        return redirect()->route('admin.category')->with('success', 'Category deleted successfully.');
    }
}
