<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\ProductEnquiryController;

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


// Frontend Pages Get Request
Route::get('/',[FrontendController::class, 'index']);
Route::get('/about-us',[FrontendController::class, 'aboutus']);
Route::get('/product-details/{product_uid}',[FrontendController::class, 'product_details']);
Route::get('/products-list',[FrontendController::class, 'products_list']);
Route::get('/cost-saving-calculation',[FrontendController::class, 'cost_saving_calculator']);
Route::get('/contact-us',[FrontendController::class, 'contactus']);

// Frontend Pages Post Request.
Route::post('/product-enquiry',[FrontendController::class, 'submit-enquiry-form']);
Route::post('/contact-us',[FrontendController::class, 'submit-contact-form']);

// Admin PAnel Routes
Route::prefix('admin')->group(function () {

    // Admin Other Pages Routes
    Route::get('/',[AdminController::class,'adminLoginPage']);
    Route::get('/login',[AdminController::class,'adminLoginPage'])->name('adminLoginPage');
    Route::get('/dashboard',[AdminController::class,'adminDashboard'])->name('adminDashboard');
    Route::get('/account',[AdminController::class,'adminAccountPage'])->name('adminDashboard');
    Route::get('/leads',[AdminController::class,'leads'])->name('leads');
    Route::get('/settings/all',[GeneralSettingController::class,'index'])->name('settings');
    Route::get('/forgot-password',[AdminController::class,'forgotPassword'])->name('forgot-password');
    Route::get('/generate-password/{newpass}',[AdminController::class,'generatePassword'])->name('generatePassword');

    // Products Routes
    Route::get('/product/all',[ProductController::class,'index'])->name('productsAll');
    Route::get('/product/add',[ProductController::class,'create'])->name('productAdd');
    Route::get('/product/edit/{product_uid}',[ProductController::class,'edit'])->name('productEdit');
    Route::get('/product/assets/get/{product_uid}',[ProductController::class,'getAssets'])->name('productGetAssets');
    Route::get('/product/sepcifications/get/{product_uid}',[ProductController::class,'getSepcifications'])->name('productGetSepcifications');
    Route::get('/product/enquiries',[ProductEnquiryController::class,'index'])->name('productsEnquiryAll');

    // Category Routes
    Route::get('/category/all',[CategoryController::class,'index'])->name('categories');
    Route::get('/category/add',[CategoryController::class,'create'])->name('categoryAdd');
    Route::get('/category/edit/{category_uid}',[CategoryController::class,'edit'])->name('categoryEdit');

    // Product Enquiries

    // Post Routes
    Route::post('/adminLoginPost',[AdminController::class,'adminLoginPost']);

    Route::post('/product/add',[ProductController::class,'store'])->name('productAddPost');
    Route::post('/product/edit/{product_uid}',[ProductController::class,'update'])->name('productEdit');
    Route::post('/product/delete/{product_uid}',[ProductController::class,'delete'])->name('productEdit');
    Route::post('/product/addAssets',[ProductController::class,'addAssets'])->name('productAddAssets');
    Route::post('/product/addSpecification',[ProductController::class,'addSpecification'])->name('productAddSpecification');
    Route::post('/product/deleteAssets/{product_uid}/{key}',[ProductController::class,'deleteAssets'])->name('productDeleteAssets');
    Route::post('/product/deleteSpecifications/{product_uid}/{key}',[ProductController::class,'deleteSpecifications'])->name('productDeleteAssets');
    
    Route::post('/category/add',[CategoryController::class,'store'])->name('categoryAddPost');
    Route::post('/category/edit/{category_uid}',[CategoryController::class,'update'])->name('categoryEdit');
    Route::post('/category/delete/{category_uid}',[CategoryController::class,'delete'])->name('categoryDelete');
    
    Route::post('/settings/all/',[AdminController::class,'settingEdit'])->name('settingEdit');
    Route::post('/settings/edit/{id}',[GeneralSettingController::class,'update'])->name('settingEdit');
    Route::post('/settings/delete/{id}',[GeneralSettingController::class,'destroy'])->name('settingEdit');
    Route::post('/settings/add',[GeneralSettingController::class,'store'])->name('settingAdd');
    
    Route::post('/account/{id}',[AdminController::class,'adminAccountUpdate'])->name('adminAccountUpdate');
    Route::get('/logout',[AdminController::class,'logout'])->name('logout');
    
});
