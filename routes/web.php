<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileControlller;
use App\Http\Controllers\Backend\BrandController;
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
    Route::get('/view', [BrandController::class, 'index']) -> name('admin.brand.index');
    Route::get('/store', [BrandController::class, 'store']) -> name('admin.brand.store');
});
