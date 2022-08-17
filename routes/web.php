<?php

use App\Http\Controllers\AlertController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;

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

// show certificate manage page
Route::get('/certificates/manage', [CertificateController::class, 'manage'])->middleware('auth');

// UPDATE CERTIFICATE show page to edit existing certificate
Route::get('/certificates/{certificate}/edit', [CertificateController::class, 'edit'])->middleware('auth');

// UPDATE CERTIFICATE submit edited certificate to update
Route::put('/certificates/{certificate}', [CertificateController::class, 'update'])->middleware('auth');

// DELETE CERTIFICATE delete certificate
Route::delete('/certificates/{certificate}', [CertificateController::class, 'destroy'])->middleware('auth');

// READ CERTIFICATE show single certificate
Route::get('/certificates/{certificate}', [CertificateController::class, 'show']);

// certificates select2 ajax query route
Route::post('/getCertificates', [CertificateController::class, 'getCertificates'])->name('getCertificates')->middleware('auth');

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
Route::get('/users/manage', [UserController::class, 'manage'])->middleware('auth');

// CREATE ALERT show create page for alerts
Route::get('/alerts/create', [AlertController::class, 'create'])->middleware('auth');

// show alerts manage page
Route::get('/alerts/manage', [AlertController::class, 'manage'])->middleware('auth');

// READ ALERT show read page for alerts
Route::get('/alerts/{alert}', [AlertController::class, 'show']);

// UPDATE ALERT store new alert data
Route::post('/alerts', [AlertController::class, 'store'])->middleware('auth');

// UPDATE ALERT show page to edit existing alert
Route::get('/alerts/{alert}/edit', [AlertController::class, 'edit'])->middleware('auth');

// UPDATE ALERT submit edited alert to update
Route::put('/alerts/{alert}', [AlertController::class, 'update'])->middleware('auth');

// DELETE ALERT delete alert
Route::delete('/alerts/{alert}', [AlertController::class, 'destroy'])->middleware('auth');

// Alerts select2 ajax query route
Route::post('/getAlerts', [AlertController::class, 'getAlerts'])->name('getAlerts')->middleware('auth');

// CREATE COMPANY show create page for companies
Route::get('/companies/create', [CompanyController::class, 'create'])->middleware('auth');

// UPDATE COMPANY store new company data
Route::post('/companies', [CompanyController::class, 'store'])->middleware('auth');

// show company manage page
Route::get('/companies/manage', [CompanyController::class, 'manage'])->middleware('auth');

// READ COMPANY show read page for company
Route::get('/companies/{company}', [CompanyController::class, 'show']);

// UPDATE COMPANY PAGE show edit page for company
Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->middleware('auth');

// UPDATE COMPANY submit edited company to update
Route::put('/companies/{company}', [CompanyController::class, 'update'])->middleware('auth');

// DELETE COMPANY delete company
Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->middleware('auth');

// Companies select2 ajax query route
Route::post('/getCompanies', [CompanyController::class, 'getCompanies'])->name('getCompanies')->middleware('auth');

// CREATE PRODUCT show create page for products
Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth');

// UPDATE PRODUCT store new product data
Route::post('/products', [ProductController::class, 'store'])->middleware('auth');

// show product page
Route::get('/products/manage', [ProductController::class, 'manage'])->middleware('auth');

// UPDATE PRODUCT submit edited product to update
Route::put('/products/{product}', [ProductController::class, 'update'])->middleware('auth');

// READ PRODUCT show single product
Route::get('/products/{product}', [ProductController::class, 'show']);

// UPDATE PRODUCT show show edit page for product
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->middleware('auth');

// DELETE PRODUCT delete product
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->middleware('auth');

// Products select2 ajax query route
Route::post('/getProducts', [ProductController::class, 'getProducts'])->name('getProducts')->middleware('auth');
