<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class,'home'])->name('home');

Route::get('/login', [UserController::class,'login'])->name('login');
Route::post('/login', [UserController::class,'do_login'])->name('do_login');
Route::get('/logout', [UserController::class,'do_logout'])->name('logout');

Route::get('/register', [UserController::class,'register'])->name('register');
Route::post('/register', [UserController::class,'do_register'])->name('do_register');

Route::post('/cart', [CartController::class,'store'])->name('cart');
Route::get('/cart', [CartController::class,'index'])->name('cart');
Route::get('/product/{name}', function (string $name) {
    if($name == 'nike') {
        return view('pages.product-nike');
    }
    elseif($name == 'dior') {
        return view('pages.product-dior');
    }
    elseif($name == 'balenciaga') {
        return view('pages.product-balenciaga');
    }
    elseif($name == 'adidas') {
        return view('pages.product-adidas');
    }
})->name('product');

Route::get('/buyer/{product}', [BuyerController::class,'buyer'])->name('buyer');

Route::get('/category', [WebController::class,'category'])->name('category');
Route::get('/product/{category}', [WebController::class,'product'])->name('product.category');

Route::get('/designer', function () {
    return view('pages.designer');
})->name('designer');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::post('/checkout',[OrderController::class,'store'])->name('checkout');

// Admin Routes
Route::get('/admin', [DashboardAdminController::class, 'index']);
Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');

Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product');
Route::get('/admin/product/new', [ProductController::class, 'create'])->name('admin.product.new');
Route::post('/admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');
Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
Route::patch('/admin/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
Route::get('/admin/product/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');

Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
Route::get('/admin/category/new', [CategoryController::class, 'create'])->name('admin.category.new');
Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::patch('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');

Route::get('/admin/order', [OrderController::class, 'index'])->name('admin.order');
Route::get('/admin/order/{order}', [OrderController::class, 'show'])->name('order.show');
Route::get('/admin/order/destroy/{order}', [OrderController::class, 'destroy'])->name('order.destroy');

// Route::get('/admin/report', function () {
//     return view('pages.admin.report.table');
// })->name('report.table');
