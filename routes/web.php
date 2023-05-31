<?php

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//List of user routes
Route::middleware(['user'])->group(function(){
    Route::get('/home', [UserController::class, 'index'])->name('user.home');
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/checkout', function(Request $request){
         $request->collect('carts')->each(function(array $cart){
            var_dump($cart["id"] );
         });
        
       

        
    });
    //other routes for any user type
});

Route::middleware(['admin'])->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    //other routes for admin only
});