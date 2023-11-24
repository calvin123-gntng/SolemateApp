<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;

class DashboardAdminController extends Controller
{
    //index
    public function index() {
        $data["title"] = "Dashboard";
        $productsCount = Product::count();
        $products = ($productsCount > 0) ? round($productsCount / pow(10, floor(log10($productsCount)))) * pow(10, floor(log10($productsCount))) : 0;

        $categoriesCount = Category::count();
        $categories = ($categoriesCount > 0) ? round($categoriesCount / pow(10, floor(log10($categoriesCount)))) * pow(10, floor(log10($categoriesCount))) : 0;

        $ordersCount = Order::count();
        $orders = ($ordersCount > 0) ? round($ordersCount / pow(10, floor(log10($ordersCount)))) * pow(10, floor(log10($ordersCount))) : 0;

        return view('pages.admin.dashboard', compact('products','categories','orders') , $data);
    }
}
