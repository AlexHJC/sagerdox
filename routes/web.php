<?php

use App\Http\Controllers\AlertController;
use App\Models\Certificate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Models\Alert;
use App\Models\Product;

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

// MAIN show dashboard all certificates [to show all triggered alerts later]

Route::get('/', [CertificateController::class, 'index']);

// CREATE CERTIFICATE show create page for certificates
Route::get('/certificates/create', [CertificateController::class, 'create'])->middleware('auth');

// UPDATE CERTIFICATE store listing data when posted from form
Route::post('/certificates', [CertificateController::class, 'store'])->middleware('auth');

// UPDATE CERTIFICATE show page to edit existing certificate
Route::get('/certificates/{certificate}/edit', [CertificateController::class, 'edit'])->middleware('auth');

// UPDATE CERTIFICATE submit edited certificate to update
Route::put('/certificates/{certificate}', [CertificateController::class, 'update'])->middleware('auth');

// DELETE CERTIFICATE submit edited certificate to update
Route::delete('/certificates/{certificate}', [CertificateController::class, 'destroy'])->middleware('auth');

// READ CERTIFICATE show single certificate
Route::get('/certificates/{certificate}', [CertificateController::class, 'show']);

// show certificate manage page
Route::get('/certificates/manage', [CertificateController::class, 'manage'])->middleware('auth');

// CREATE USER show user registration form page
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// CREATE USER post new user data
Route::post('/users', [UserController::class, 'store']);

// logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// show user manage page
Route::get('/users/manage', [UserController::class, 'manage']);

// crud create, read, update, delete

// CREATE ALERT show create page for alerts
Route::get('/alerts/create', [AlertController::class, 'create']);

// READ ALERT show read page for alerts
Route::get('/alerts/{alert}', [AlertController::class, 'show']);

// UPDATE ALERT store new alert data
Route::post('/alerts', [AlertController::class, 'store']);

// // CREATE ALERT show create page for alerts
// Route::get('/alerts/create', [AlertController::class, 'create']);

// // READ ALERT show read page for alerts
// Route::get('/alerts/{alert}', [AlertController::class, 'show']);

// // UPDATE ALERT store new alert data
// Route::post('/alerts', [AlertController::class, 'store']);

// CREATE COMPANY show create page for companies
Route::get('/companies/create', [CompanyController::class, 'create']);

// UPDATE COMPANY store new company data
Route::post('/companies', [CompanyController::class, 'store']);

// READ COMPANY show read page for COMPANY
Route::get('/companies/{company}', [CompanyController::class, 'show']);

// // CREATE COMPANY show create page for companies
// Route::get('/companies/create', [CompanyController::class, 'create']);

// // UPDATE COMPANY store new company data
// Route::post('/companies', [CompanyController::class, 'store']);

// // READ COMPANY show read page for COMPANY
// Route::get('/companies/{company}', [CompanyController::class, 'show']);

// CREATE PRODUCT show create page for products
Route::get('/products/create', [ProductController::class, 'create']);

// UPDATE PRODUCT store new product data
Route::post('/products', [ProductController::class, 'store']);
