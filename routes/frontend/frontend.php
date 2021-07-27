<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\IndexController;
 use App\Http\Controllers\Frontend\LanguageController;
 use App\Models\User;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', function () {
    return view('welcome');
});


//USER ALL ROUTE
Route::middleware('auth')->group(function () {
    Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
        $user = User::find(Auth::user()->id);
        return view('dashboard', compact('user'));
    })->name('dashboard');
    Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
    Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile/update', [IndexController::class, 'UserProfileUpdate'])->name('user.profile.update');
    Route::get('/user/password/edit', [IndexController::class, 'UserEditPassword'])->name('user.password.edit');
    Route::post('/user/password/update', [IndexController::class, 'UserUpdatePassword'])->name('user.password.update');
});


Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/language/english', [LanguageController::class, 'english'])->name('english.language');
Route::get('/language/turkish', [LanguageController::class, 'turkish'])->name('turkish.language');

Route::get('/product/details/{id}/{slug}', [IndexController::class, 'product_details']);

Route::get('/product/tag/{tag}/{lang}', [IndexController::class, 'product_tag']);

Route::get('/subcategory/product/{lang}/{subcat_id}/{slug}', [IndexController::class, 'subCatWiseProduct']);
Route::get('/subsubcategory/product/{lang}/{subsubcat_id}/{slug}', [IndexController::class, 'subSubCatWiseProduct']);

// Add To Cart view modal
Route::get('/product/view/modal/{id}', [IndexController::class, 'productModalView']);
// Add To Cart Store Data
Route::post('/cart/data/store/{id}', [CartController::class, 'addToCart']);


