<?php

use App\Http\Controllers\BiggController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('/shop/{slug?}', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/tag/{slug?}', [\App\Http\Controllers\ShopController::class, 'tag'])->name('shop.tag');
Route::get('/product/{product:slug}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

// react route
Route::get('products/{slug?}', [\App\Http\Controllers\ShopController::class, 'getProducts']);
Route::get('products', [\App\Http\Controllers\HomeController::class, 'getProducts']);
Route::get('product-detail/{product:slug}', [\App\Http\Controllers\ProductController::class, 'getProductDetail']);
Route::post('carts', [\App\Http\Controllers\CartController::class, 'store']);
Route::get('carts', [\App\Http\Controllers\CartController::class, 'showCart']);
// ongkir
Route::get('api/provinces', [\App\Http\Controllers\OngkirController::class, 'getProvinces']);
Route::get('api/cities', [\App\Http\Controllers\OngkirController::class, 'cities']);
Route::get('api/shipping-cost', [\App\Http\Controllers\OngkirController::class, 'shippingCost']);
Route::post('api/set-shipping', [\App\Http\Controllers\OngkirController::class, 'setShipping']);
Route::post('api/checkout', [\App\Http\Controllers\OrderController::class, 'checkout']);
// get user login
Route::get('api/users', [\App\Http\Controllers\UserController::class, 'index']);
// ==========

Route::group(['middleware' => 'auth'], function() {
    
    Route::get('/order/checkout', [\App\Http\Controllers\OrderController::class, 'process'])->name('checkout.process');
    Route::resource('/cart', \App\Http\Controllers\CartController::class)->except(['store', 'show']);

    Route::group(['middleware' => ['isAdmin'],'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
       
        // categories
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::post('categories/images', [\App\Http\Controllers\Admin\CategoryController::class,'storeImage'])->name('categories.storeImage');
    
        // tags
        Route::resource('tags', \App\Http\Controllers\Admin\TagController::class);
    
        // products
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
        Route::post('products/images', [\App\Http\Controllers\Admin\ProductController::class,'storeImage'])->name('products.storeImage');
    });
});


// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('s-sport')->group(function () {
    Route::get('/about', [BiggController::class, 'about'])->name('about');
    Route::get('/blog-details', [BiggController::class, 'blog_details'])->name('blog-details');
    Route::get('/blog', [BiggController::class, 'blog'])->name('blog');
    Route::get('/cart', [BiggController::class, 'cart'])->name('cart');
    Route::get('/checkout', [BiggController::class, 'checkout'])->name('checkout');
    Route::get('/contact', [BiggController::class, 'contact'])->name('contact');
    Route::get('/', [BiggController::class, 'index'])->name('index');

    Route::get('/login', [BiggController::class, 'login'])->name('login');
    Route::post('/login_store', [BiggController::class, 'login_store'])->name('login_store');

    Route::get('/my-account', [BiggController::class, 'my_account'])->name('my-account');
    Route::get('/privacy-policy', [BiggController::class, 'privacy'])->name('privacy-policy');
    Route::get('/product-details/{id}', [BiggController::class, 'product_details'])->name('product-details');
    Route::get('/register', [BiggController::class, 'register'])->name('register');
    Route::get('/shop', [BiggController::class, 'shop'])->name('shop');
    Route::get('/terms-conditions', [BiggController::class, 'terms_conditions'])->name('terms-conditions');
    Route::get('/search', [BiggController::class, 'search'])->name('search');
    Route::get('/filter', [BiggController::class, 'filter'])->name('filter');
    Route::get('/Dashboard', [BiggController::class, 'Dashboard'])->name('Dashboard');
    Route::get('/panier', [BiggController::class, 'panier'])->name('panier');
    Route::get('/likes', [BiggController::class, 'likes'])->name('likes');
    Route::get('/Logout', [BiggController::class, 'Logout'])->name('Logout');
    Route::get('/signup', [BiggController::class, 'signup'])->name('signup');
    Route::post('/signup_store', [BiggController::class, 'signup_store'])->name('signup_store');

    Route::post('/add_product/id', [BiggController::class, 'add_product'])->name('add_product');
    //
    Route::get('/autocomplete', [BiggController::class, 'autocomplete'])->name('autocomplete');
    Route::get('/app', [BiggController::class, 'app'])->name('app');

    Route::get('/logout', [BiggController::class, 'logout'])->name('logout');

});
