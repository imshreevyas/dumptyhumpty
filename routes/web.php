<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProgramController;
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
Route::get('/program-details/{program_uid}',[FrontendController::class, 'program_details']);
Route::get('/programs-list',[FrontendController::class, 'programs_list']);
Route::get('/cost-saving-calculation',[FrontendController::class, 'cost_saving_calculator']);
Route::get('/contact-us',[FrontendController::class, 'contactus']);

// Frontend Pages Post Request.
Route::post('/program-enquiry',[FrontendController::class, 'submit-enquiry-form']);
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
    Route::get('/program/all',[ProgramController::class,'index'])->name('pr3ogramsAll');
    Route::get('/program/add',[ProgramController::class,'create'])->name('programAdd');
    Route::get('/program/edit/{program_uid}',[ProgramController::class,'edit'])->name('programEdit');
    Route::get('/program/assets/get/{program_uid}',[ProgramController::class,'getAssets'])->name('programGetAssets');
    Route::get('/program/enquiries',[ProductEnquiryController::class,'index'])->name('programsEnquiryAll');

    // Category Routes
    Route::get('/category/all',[CategoryController::class,'index'])->name('categories');
    Route::get('/category/add',[CategoryController::class,'create'])->name('categoryAdd');
    Route::get('/category/edit/{category_uid}',[CategoryController::class,'edit'])->name('categoryEdit');

    // Product Enquiries

    // Post Routes
    Route::post('/adminLoginPost',[AdminController::class,'adminLoginPost']);

    Route::post('/program/add',[ProgramController::class,'store'])->name('programAddPost');
    Route::post('/program/edit/{program_uid}',[ProgramController::class,'update'])->name('programEdit');
    Route::post('/program/delete/{program_uid}',[ProgramController::class,'delete'])->name('programDelete');
    Route::post('/program/addAssets',[ProgramController::class,'addAssets'])->name('programAddAssets');
    Route::post('/program/deleteAssets/{program_uid}/{key}',[ProgramController::class,'deleteAssets'])->name('programDeleteAssets');
    
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
