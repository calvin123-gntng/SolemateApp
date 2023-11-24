<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Cart;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Order';
        $collection = Order::paginate(10);
        return view('pages.admin.order.index', $data , compact('collection'));
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
        $carts = Cart::where('user_id', Auth::user()->id)->get();
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->grandtotal = $request->grandtotal;
            $order->created_at = now();
            $order->save();

            foreach($carts as $cart){
                $product = Product::find($cart->product_id);
                $product->stock = $product->stock - $cart->quantity;
                $product->update();
                $orderDetails = new OrderDetail;
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $cart->product_id;
                $orderDetails->quantity = $cart->quantity;
                $orderDetails->subtotal = $cart->subtotal;
                $orderDetails->save();
                $cart->delete();
            }
        return view('pages.checkout');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $data['title'] = 'Order';
        return view('pages.admin.order.detail' , $data, compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.order')->with('success', 'Order deleted successfully');
    }
}
