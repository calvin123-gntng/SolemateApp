<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = Cart::where('user_id', Auth::user()->id)->get();
        $total = 0;
        $price = 0;
        $tax = 0;
        $quantity = 0;
        return view('pages.cart', compact('collection','total','price','tax','quantity'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'qty_buyer' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $product = Product::find($request->product_id);
        if($request->qty_buyer > $product->stock) {
            return redirect()->back()->withErrors(['quantity' => 'Quantity must be less than stock']);
        }

        Cart::create([
            'product_id' => $request->product_id,
            'quantity' => $request->qty_buyer,
            'user_id' => Auth::user()->id,
            'subtotal' => $product->price * $request->qty_buyer,
        ]);

        return redirect()->route('cart')->with('success', 'Product added to cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
