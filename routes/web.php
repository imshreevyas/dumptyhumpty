<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\ProductEnquiryController;
use App\Http\Controllers\FreeMaterialController;

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
    Route::get('/program/assets/get/{column}/{program_uid}',[ProgramController::class,'getAssets'])->name('programGetAssets');
    Route::get('/program/enquiries',[ProductEnquiryController::class,'index'])->name('programsEnquiryAll');

    // Faqs Routes
    Route::get('/faq/all',[FaqController::class,'index'])->name('faqs');
    Route::get('/faq/add',[FaqController::class,'create'])->name('faqAdd');
    Route::get('/faq/edit/{faq_uid}',[FaqController::class,'edit'])->name('faqEdit');
    
    // Free Material Users
    Route::get('/free-material-users/all',[FreeMaterialController::class,'index'])->name('freeMaterialAll');
    Route::get('/free-material/add',[FreeMaterialController::class,'create'])->name('freeMaterialAdd');
    Route::get('/free-material/edit/{file_uid}',[FreeMaterialController::class,'edit'])->name('freeMaterialEdit');
    Route::get('/free-material/assets/get/{file_uid}',[FreeMaterialController::class,'getAssets'])->name('freeMaterialGetAssets');

    // Post Routes
    Route::post('/adminLoginPost',[AdminController::class,'adminLoginPost']);

    Route::post('/program/add',[ProgramController::class,'store'])->name('programAddPost');
    Route::post('/program/edit/{program_uid}',[ProgramController::class,'update'])->name('programEdit');
    Route::post('/program/delete/{program_uid}',[ProgramController::class,'delete'])->name('programDelete');
    Route::post('/program/addAssets',[ProgramController::class,'addAssets'])->name('programAddAssets');
    Route::post('/program/deleteAssets/{program_uid}/{key}',[ProgramController::class,'deleteAssets'])->name('programDeleteAssets');
    
    Route::post('/faq/add',[FaqController::class,'store'])->name('faqAddPost');
    Route::post('/faq/edit/{faq_uid}',[FaqController::class,'update'])->name('faqEdit');
    Route::post('/faq/delete/{faq_uid}',[FaqController::class,'delete'])->name('faqDelete');

    Route::post('/free-material/add',[FreeMaterialController::class,'store'])->name('freeMaterialAddPost');
    Route::post('/free-material/edit/{free_material_uid}',[FreeMaterialController::class,'update'])->name('freeMaterialEdit');
    Route::post('/free-material/delete/{free_material_uid}',[FreeMaterialController::class,'delete'])->name('freeMaterialDelete');
    Route::post('//free-material/addAssets',[FreeMaterialController::class,'addAssets'])->name('freeMaterialAddAssets');
    
    Route::post('/settings/all/',[AdminController::class,'settingEdit'])->name('settingEdit');
    Route::post('/settings/edit/{id}',[GeneralSettingController::class,'update'])->name('settingEdit');
    Route::post('/settings/delete/{id}',[GeneralSettingController::class,'destroy'])->name('settingEdit');
    Route::post('/settings/add',[GeneralSettingController::class,'store'])->name('settingAdd');
    
    Route::post('/account/{id}',[AdminController::class,'adminAccountUpdate'])->name('adminAccountUpdate');
    Route::get('/logout',[AdminController::class,'logout'])->name('logout');
    
});
