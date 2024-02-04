<?php

use App\Http\Controllers\ProfileController;
use Database\Seeders\CategoriesSeeder;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'checkUserRole'])->name('dashboard');

Route::get('/client', function () {
    return view('dashboard-cli');
})->middleware(['auth', 'verified'])->name('client');




Route::middleware('auth')->group(function () {
    Route::get('/catalogo', [ProductController::class, 'guest'])->name('catalogo'); 
    Route::get('/categorias', [CategoryController::class, 'guest'])->name('categorias');
    Route::get('/usuarios', [UserController::class, 'guest'])->name('usuarios');
   
    //Route::resource('carts', CartController::class);
    Route::post('/add-to-cart/{productId}', [CartController::class, 'addToCart'])->name('cart.addToCart');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');
    Route::delete('/carts/{cart}', [CartController::class, 'destroy'])->name('carts.destroy');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['auth', 'verified', 'checkUserRole'])->group(function () {
        Route::resource('products', ProductController::class);
        Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    
        Route::resource('categories', CategoryController::class);
        Route::resource('user', UserController::class);
    });
   
});



require __DIR__.'/auth.php';
