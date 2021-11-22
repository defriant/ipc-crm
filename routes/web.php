<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\CSController;
use App\Mail\EmailVerification;



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

Route::get('/enkrip', [WebController::class, 'enkrip']);
Route::get('/dekrip', [WebController::class, 'dekrip']);
Route::get('/file-enkrip', [WebController::class, 'fileEncrypt']);

// Check role
Route::get('/check-this-user-role', [WebController::class, 'check_this_user_role']);

// Registration
Route::post('/verification', [RegisController::class, 'verification']);
Route::get('/verification-attempt/{code}/{id}', [RegisController::class, 'verification_attempt']);
Route::post('/verification/next', [RegisController::class, 'register_add']);
Route::get('/verification/resend/{id}', [RegisController::class, 'resend_code']);

// User Route
Route::get('/', [WebController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function(){
    Route::get('/user-logout', [WebController::class, 'logout']);
    Route::get('/aktifitas', [WebController::class, 'aktifitas']);
    Route::get('/get-notification', [WebController::class, 'get_notif']);
    Route::get('/get-notification-count', [WebController::class, 'get_notif_count']);
    Route::get('/notification-read', [WebController::class, 'notif_read']);
    Route::get('/profile/edit', [WebController::class, 'user_profile']);
    Route::post('/profile/{id}/update', [WebController::class, 'user_profile_update']);
    Route::get('/advanced-profile', [RegisController::class, 'advanced_profile']);
    Route::post('/advanced-profile', [RegisController::class, 'advanced_profile_update']);
    Route::get('/company-registration', [RegisController::class, 'company_registration']);
    Route::post('/company-registration/add', [RegisController::class, 'company_registration_add']);
    Route::get('/company-registration/reupload', [RegisController::class, 'company_registration_reupload']);
    Route::post('/company-registration/reupload/{id}', [RegisController::class, 'company_registration_reupload_post']);
    Route::post('/company-update', [WebController::class, 'company_update']);
    Route::get('/customer-service', [CSController::class, 'cs']);
    Route::get('/customer-service/page', [CSController::class, 'cs_page']);
    Route::get('/customer-service/{id}', [CSController::class, 'view']);
    Route::get('/buat-pengaduan', [CSController::class, 'pengaduan']);
    Route::post('/buat-pengaduan/submit', [CSController::class, 'submit_pengaduan']);
    Route::post('/balas-tanggapan/{id}', [CSController::class, 'balas_tanggapan']);
    Route::get('/tutup-pengaduan/{id}', [CSController::class, 'tutup_pengaduan']);
});


// Admin Route
Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.cs');
    Route::get('/user-activity', [AdminController::class, 'user_activity']);
    Route::get('/all-company', [AdminController::class, 'all_company']);
    Route::get('/company-view/{id}', [AdminController::class, 'company_view']);

    Route::get('/company/registration', [AdminController::class, 'registration'])->name('admin.company.registration');
    Route::get('/registration/{id}', [AdminController::class, 'registration_show'])->name('admin.registration.show');
    Route::get('/company-registration/terima/{id}', [AdminController::class, 'terima_permintaan']);
    Route::post('/company-registration/tolak/{id}', [AdminController::class, 'tolak_permintaan']);
    Route::get('/company-regis', [AdminController::class, 'company_regis']);
    Route::get('/company-regis-count', [AdminController::class, 'company_regis_count']);
    Route::get('/download/surat-permohonan/{id}', [AdminController::class, 'surat_permohonan']);
    Route::get('/complaint', [AdminController::class, 'complaint'])->name('admin.complaints');
    Route::get('/complaint-side-menu-notif', [AdminController::class, 'complaint_side_menu_notif']);
    Route::get('/complaint-all', [AdminController::class, 'complaint_all']);
    Route::get('/complaint-all-data', [AdminController::class, 'complaint_all_data']);
    Route::get('/complaint-new', [AdminController::class, 'complaint_new']);
    Route::get('/complaint-new-data', [AdminController::class, 'complaint_new_data']);
    Route::get('/complaint-new-data-count', [AdminController::class, 'complaint_new_data_count']);
    Route::get('/complaint-ongoing', [AdminController::class, 'complaint_ongoing']);
    Route::get('/complaint-ongoing-data', [AdminController::class, 'complaint_ongoing_data']);
    Route::get('/complaint-ongoing-data-count', [AdminController::class, 'complaint_ongoing_data_count']);
    Route::get('/complaint/{id}', [AdminController::class, 'complaint_view'])->name('admin.complaints.view');
    Route::get('/foll-up/{id}', [AdminController::class, 'foll_up']);
    Route::post('/balas-pengaduan/{id}', [AdminController::class, 'balas']);
    Route::get('/customer-reply', [AdminController::class, 'customer_reply']);

});

// auth
Auth::routes();
