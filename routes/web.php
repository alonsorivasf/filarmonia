<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\SolicitudController;

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

Route::get('/offline', function () {
    return view('offline');
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/altas', function () {
    return Inertia::render('Altas');
})->name('altas');

Route::middleware(['auth:sanctum', 'verified'])->get('/consultas', function () {
    return Inertia::render('Consultas');
})->name('consultas');

Route::middleware(['auth:sanctum', 'verified'])->get('/mobiliario', function () {
    return Inertia::render('Mobiliario');
})->name('mobiliario');

Route::middleware(['auth:sanctum', 'verified'])->get('/reportes', function () {
    return Inertia::render('Reportes');
})->name('reportes');

//Route::get('/consultapacientes', 'PacienteController@index');
Route::get('/consultapacientes', [PacienteController::class, 'index']);
Route::post('/agregarpaciente', [PacienteController::class, 'store']);

Route::get('/consultasolicitudes', [SolicitudController::class, 'index']);
Route::post('/registrarsolicitud', [SolicitudController::class, 'store']);
Route::get('/cancelarsolicitud/{id}', [SolicitudController::class, 'destroy']);
Route::get('/actualizarsolicitud/{id}', [SolicitudController::class, 'update']);
Route::post('/editarsolicitud', [SolicitudController::class, 'editar']);

