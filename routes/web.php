<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\GenderController;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuestAdminMiddleware;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Frontend\WishListController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UsersController;






Route::get('/', function () {
    return view('welcome');
});
Route::get('/session', function () {
    $session = session()->all();
    echo '<pre>';
    print_r($session);
    echo '</pre>';
});
Route::get('/session-destroy', function () {
    session()->flush();
    return redirect()->back()->with('success', 'Product deleted Successfully');
})->name('destroy-session');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');



Route :: prefix('admin')->name('admin.')->group(function( ){

    Route:: middleware([GuestAdminMiddleware::class])->group(function(){
        Route::get('/login', [AdminLoginController::class, 'index'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');
    });

    Route:: middleware(['auth',AdminMiddleware::class])->group(function(){
    Route::get('/home', [AdminHomeController::class, 'index'])->name('home');
});
}) ;

Auth::routes();

Route::controller(CheckoutController::class)->group(function (){
    Route::get('/checkouts', 'index')->name('checkout');
    Route::post('/checkouts/store',  'store')->name('checkout.store');
    Route::get('/checkout/success/{order_number}', 'showSuccess')->name('checkout.success');
});
Route::controller(StripeController::class)->group(function(){
    Route::get('/stripe', 'stripe');
    Route::post('/stripe', 'stripePost')->name('stripe.post');
});






Route::get('/search', [SearchController::class, 'searchResults'])->name('search.index');
Route::get('/autocomplete', [SearchController::class, 'autocomplete'])->name('search.autocomplete');

Route::controller(MainController::class)->group(function () {
    Route::get('/', 'index');

    Route::get('/about', 'about')->name('about');
    Route::get('/product', 'product')->name('product');
    Route::get('/product/{slug}', 'productdetail')->name('product_details');
    Route::get('/category', 'categories')->name('categories');
    Route::get('/category/{slug}', 'viewcategory')->name('category_details');
    Route::get('/gender', 'gender')->name('gender');
    Route::get('/gender/{name}', 'viewgender')->name('gender_details');
    Route::fallback( 'notfound')->name('notfound');
    Route::get('/blog',  'blog_home')->name('blog');
Route::get('/blog/{slug}',  'blog_show')->name('blog-details');});



Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::delete('/cart/remove/{product}', [CartController::class, 'removeFromCart'])->name('cart.remove');
        Route::put('/cart/update/{productId}', [CartController::class, 'update'])->name('cart.update');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware(UserMiddleware::class);

    Route::middleware('auth')->group(function () {

        Route::get('/wishlist', [App\Http\Controllers\Frontend\WishListController::class, 'showWishlist'])->name('wishlist.index');
        Route::post('/wishlist/add/{product}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
        Route::delete('/wishlist/remove/{product}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
    });

    Route:: middleware(['auth',AdminMiddleware::class])->group(function(){
    Route::get('dashboard/product/create',[ProductController::class,'create' ] )->name('admin.product.create');
Route::controller(ProductController::class)->prefix('dashboard')->group(function () {
    Route::get('/product', 'index')->name('admin.product');
    Route::get('/product/{slug}', 'productdetail')->name('admin.product.details');
   Route::post('/product/store', 'store')->name('admin.product.store');
    Route::get('/product/edit/{id}', 'edit')->name('admin.product.edit');
    Route::post('/product/update/{id}', 'update')->name('admin.product.update');
    Route::get('/product/delete/{id}', 'destroy')->name('admin.product.delete');
     Route::post('/product/deleteSelected', 'deleteSelected')->name('admin.product.deleteSelected');
     Route::get('/search', 'searchResults')->name('product.search.index');
     Route::get('/autocomplete',  'autocomplete')->name('product.search.autocomplete');
});
Route::controller(GenderController::class)->prefix('dashboard')->group(function () {
    Route::get('/gender', 'index')->name('admin.gender');
    Route::get('/gender/create', 'create')->name('admin.gender.create');
    Route::post('/gender/store', 'store')->name('admin.gender.store');
    Route::get('/gender/edit/{id}', 'edit')->name('admin.gender.edit');
    Route::post('/gender/update/{id}', 'update')->name('admin.gender.update');
    Route::get('/gender/delete/{id}', 'delete')->name('admin.gender.delete');
     Route::post('/gender/deleteSelected', 'deleteSelected')->name('admin.gender.deleteSelected');
});

Route::controller(CategoriesController::class)->prefix('dashboard')->group(function () {
    Route::get('/category', 'category')->name('admin.category');
    Route::get('/category/create', 'create_category')->name('admin.category.create');
    Route::post('/category/store', 'store_category')->name('admin.category.store');
    Route::get('/category/edit/{id}', 'edit_category')->name('admin.category.edit');
    Route::post('/category/update/{id}', 'update_category')->name('admin.category.update');
    Route::get('/category/delete/{id}', 'delete_category')->name('admin.category.delete');
     Route::post('/category/deleteSelected', 'deleteSelected')->name('admin.category.deleteSelected');
});

Route::controller(BlogController::class)->prefix('dashboard')->group(function () {

    Route::get('/Blog', 'blogs')->name('admin.blog');
    Route::get('/Blog/create', 'create')->name('admin.blog.create');
    Route::post('/Blog/store', 'store')->name('admin.blog.store');
    Route::get('/Blog/{id}/edit',  'edit')->name('admin.blog.edit');
    Route::post('/admin/Blog/update/{id}', 'update')->name('admin.Blog.update');
    Route::delete('/admin/Blog/{id}',  'destroy')->name('admin.blog.delete');
    Route::post('/blog/deleteSelected',  'deleteSelected')->name('admin.blog.deleteSelected');
    Route::delete('/blog/bulk-delete',  'deleteSelected')->name('admin.blog.bulkDelete');
    Route::delete('/blog/bulk-delete', 'deleteSelected')->name('admin.blog.bulkDelete');
});
Route::controller(CheckoutController::class)->prefix('dashboard')->group(function () {

    Route::get('/order', 'order')->name('admin.order');
    Route::get('/order/{order_number}', 'orderdetail')->name('admin.order-detail');

});
Route::controller(UsersController::class)->prefix('dashboard')->group(function () {
Route::get('/customer', 'index')->name('customer');
Route::get('/customer', 'index')->name('customer');
Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');

});


});







