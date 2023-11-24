<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function buyer(Product $product) {
        return view('pages.buyer', compact('product'));
    }
}
