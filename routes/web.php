<?php

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

// show dashboard all certificates
Route::get('/', function () {
    return view('index', [
        'certificates' => Certificate::all()
    ]);
});

// show single certificate
Route::get('/certificates/{id}', function ($id) {
    return view('show', [
        'certificate' => Certificate::find($id)
    ]);
});

Route::get('/certificates/{id}/edit', function ($id) {
    return view('edit', [
        'certificate' => Certificate::find($id)
    ]);
});
