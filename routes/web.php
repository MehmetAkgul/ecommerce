<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileControlller;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryCotroller;
use App\Http\Controllers\Frontend\IndexController;
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

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('login', [AdminController::class, 'loginForm']);
    Route::post('login', [AdminController::class, 'store'])->name('admin.login');
});


Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');
//Admin All Route

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileControlller::class, 'index'])->name('admin.profile.index');
Route::get('/admin/profile/edit', [AdminProfileControlller::class, 'edit'])->name('admin.profile.edit');
Route::post('/admin/profile/update', [AdminProfileControlller::class, 'update'])->name('admin.profile.update');
Route::get('/admin/password/edit', [AdminProfileControlller::class, 'editPassword'])->name('admin.password.edit');
Route::post('/admin/password/update', [AdminProfileControlller::class, 'updatePassword'])->name('admin.password.update');


//  Hi.. {{ Auth::user()->name }}


//USER ALL ROUTE

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $user = User::find(Auth::user()->id);
    return view('dashboard', compact('user'));
})->name('dashboard');

Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/update', [IndexController::class, 'UserProfileUpdate'])->name('user.profile.update');
Route::get('/user/password/edit', [IndexController::class, 'UserEditPassword'])->name('user.password.edit');
Route::post('/user/password/update', [IndexController::class, 'UserUpdatePassword'])->name('user.password.update');


//ALL BRAND ROUTE
Route::prefix('brand')->group(function () {
    Route::get('/view', [BrandController::class, 'index'])->name('backend.brand.index');
    Route::post('/store', [BrandController::class, 'store'])->name('backend.brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('backend.brand.edit');
    Route::post('/update', [BrandController::class, 'update'])->name('backend.brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('backend.brand.delete');
});


//ALL CATEGORY ROUTE
Route::prefix('category')->group(function () {

    //ALL CATEGORY ROUTE
    Route::get('/view', [CategoryController::class, 'index'])->name('backend.category.index');
    Route::post('/store', [CategoryController::class, 'store'])->name('backend.category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('backend.category.edit');
    Route::post('/update', [CategoryController::class, 'update'])->name('backend.category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('backend.category.delete');
    //ALL CATEGORY ROUTE

    Route::get('/sub/view', [SubCategoryController::class, 'index'])->name('backend.subcategory.index');
    Route::post('/sub/store', [SubCategoryController::class, 'store'])->name('backend.subcategory.store');
    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'edit'])->name('backend.subcategory.edit');
    Route::post('/sub/update', [SubCategoryController::class, 'update'])->name('backend.subcategory.update');
    Route::get('/sub/delete/{id}', [SubCategoryController::class, 'delete'])->name('backend.subcategory.delete');

    Route::get('/sub/sub/view', [SubSubCategoryCotroller::class, 'index'])->name('backend.subsubcategory.index');
    Route::get('/subcategory/ajax/{category_id}', [SubSubCategoryCotroller::class, 'getsubcategory']);
    Route::get('/subsubcategory/ajax/{subcategory_id}', [SubSubCategoryCotroller::class, 'getsubsubcategory']);
    Route::post('/sub/sub/store', [SubSubCategoryCotroller::class, 'store'])->name('backend.subsubcategory.store');
    Route::get('/sub/sub/edit/{id}', [SubSubCategoryCotroller::class, 'edit'])->name('backend.subsubcategory.edit');
    Route::post('/sub/sub/update', [SubSubCategoryCotroller::class, 'update'])->name('backend.subsubcategory.update');
    Route::get('/sub/sub/delete/{id}', [SubSubCategoryCotroller::class, 'delete'])->name('backend.subsubcategory.delete');
});

//ALL PRODUCT ROUTE
Route::prefix('product')->group(function () {
    Route::get('/index', [ProductController::class, 'index'])->name('backend.product.index');
    Route::get('/inactive/{id}', [ProductController::class, 'inactive'])->name('backend.product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'active'])->name('backend.product.active');
    Route::get('/create', [ProductController::class, 'create'])->name('backend.product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('backend.product.store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('backend.product.edit');
    Route::post('/update', [ProductController::class, 'update'])->name('backend.product.update');
    Route::post('/img/update', [ProductController::class, 'multi_img_update'])->name('backend.product.img.update');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('backend.product.delete');
    Route::get('/img/delete/{id}', [ProductController::class, 'multi_img_delete'])->name('backend.product.img.delete');
});

//ALL SLIDER ROUTE
Route::prefix('slider')->group(function () {
    Route::get('/index', [SliderController::class, 'index'])->name('backend.slider.index');
    Route::get('/inactive/{id}', [SliderController::class, 'inactive'])->name('backend.slider.inactive');
    Route::get('/active/{id}', [SliderController::class, 'active'])->name('backend.slider.active');
    Route::post('/store', [SliderController::class, 'store'])->name('backend.slider.store');
    Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('backend.slider.edit');
    Route::post('/update', [SliderController::class, 'update'])->name('backend.slider.update');
    Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('backend.slider.delete');
});
