<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function category() {
        $categories = Category::orderBy('id','asc')->take(5)->get();
        $collection = Product::paginate(6);
        return view('pages.category', compact('categories','collection'));
    }

    public function product($category) {
        $collection = Product::where('category_id', $category)->paginate(6);
        return view('pages.category', compact('collection'));
    }
}
