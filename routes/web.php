<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;

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

//_____Login and verification______//
Auth::routes();

//--Verification Verify
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

//----Verification Notice
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
//______________End______________//


//_____Login and verification______//
//error not show just use
Route::post('/resent-email', [App\Http\Controllers\HomeController::class, 'resend'])->name('verification.resend');
Route::get('/deposite/money', [App\Http\Controllers\HomeController::class, 'deposite'])->name('deposite.money')->middleware('verified');

Route::get('/password/change', [App\Http\Controllers\HomeController::class, 'password_change'])->name('password.change')->middleware('verified');
Route::post('/update/password', [App\Http\Controllers\HomeController::class, 'update_password'])->name('update.password')->middleware('verified');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/details/{id}', [App\Http\Controllers\HomeController::class, 'details'])->name('user.details');
//_________________End_____________//


// //_____________Category___________//
Route::get('/index/category', [CategoryController::class, 'category_index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'category_create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'category_store'])->name('category.store');

Route::get('/category/edit/{id}', [CategoryController::class, 'category_edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'category_update'])->name('cateory.update');
Route::get('/category/destroy/{id}', [CategoryController::class, 'category_destroy'])->name('category.destroy');
//_________________End_____________//


// //_____________Sub Category___________//
Route::get('/index/subcategory', [SubcategoryController::class, 'subcategory_index'])->name('subcategory.index');
Route::get('/category/subcategory', [SubcategoryController::class, 'subcategory_create'])->name('subcategory.create');
Route::post('/category/subcategory', [SubcategoryController::class, 'subcategory_store'])->name('subcategory.store');

Route::get('/subcategory/edit/{id}', [SubcategoryController::class, 'subcategory_edit'])->name('subcategory.edit');
Route::post('/subcategory/update/{id}', [SubcategoryController::class, 'subcategory_update'])->name('subcategory.update');
Route::get('/subcategory/destroy/{id}', [SubcategoryController::class, 'subcategory_destroy'])->name('subcategory.destroy');
//_________________End_____________//




// //_____________Student___________//
// Route::resource('/students', StudentController::class);

