<?php

use App\Http\Controllers\CertificateController;
use App\Models\Certificate;
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

// MAIN show dashboard all certificates [to show all triggered alerts later]

Route::get('/', [CertificateController::class, 'index']);

// CREATE CERTIFICATE show create page for certificates
Route::get('/certificates/create', [CertificateController::class, 'create']);

// UPDATE CERTIFICATE store listing data when posted from form
Route::post('/certificates', [CertificateController::class, 'store']);

// UPDATE CERTIFICATE show page to edit existing certificate
Route::get('/certificates/{certificate}/edit', [CertificateController::class, 'edit']);

// UPDATE CERTIFICATE submit edited certificate to update
Route::put('/certificates/{certificate}', [CertificateController::class, 'update']);

// DELETE CERTIFICATE submit edited certificate to update
Route::delete('/certificates/{certificate}', [CertificateController::class, 'destroy']);

// READ CERTIFICATE show single certificate
Route::get('/certificates/{certificate}', [CertificateController::class, 'show']);







// DELETE CERTIFICATE
