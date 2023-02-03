<?php

use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\UserControler;
use App\Http\Controllers\UserController;
use App\Http\Livewire\CrudArea;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'admin', 'as' => 'admin.', 'middleware' => [
        'can:admin', 'auth:sanctum',
        config('jetstream.auth_session'),
         'verified']
], function (){
    Route::get('/dashboard', [UserController::class, 'dashboardAdmin'])->name('dashboard');
    Route::get('areas', CrudArea::class)->name('areas');

    Route::resource('users', UserController::class);
    Route::resource('fotos', FotoController::class);
    Route::resource('disciplinas', DisciplinaController::class);
});

