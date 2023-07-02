<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('inicio');
});

Route::get('demanda' , [\App\Http\Controllers\DemandaController::class, 'index'])
    ->name('demanda.index');
Route::get('demanda/{id_demanda}/edit' , [\App\Http\Controllers\DemandaController::class, 'edit'])
    ->name('demanda.edit');
Route::get('demanda/create' , [\App\Http\Controllers\DemandaController::class, 'create'])
    ->name('demanda.create');
Route::post('demanda/store' , [\App\Http\Controllers\DemandaController::class, 'store'])
    ->name('demanda.store');
Route::patch('demanda/{id_demanda}/update' , [\App\Http\Controllers\DemandaController::class, 'update'])
    ->name('demanda.update');

Route::get('tipo_demanda' , [\App\Http\Controllers\TipoDemandaController::class, 'index'])
    ->name('tipo_demanda.index');
Route::get('tipo_demanda/{id_tipo_demanda}/edit' , [\App\Http\Controllers\TipoDemandaController::class, 'edit'])
    ->name('tipo_demanda.edit');
Route::get('tipo_demanda/create' , [\App\Http\Controllers\TipoDemandaController::class, 'create'])
    ->name('tipo_demanda.create');
Route::post('tipo_demanda/store' , [\App\Http\Controllers\TipoDemandaController::class, 'store'])
    ->name('tipo_demanda.store');
Route::patch('tipo_demanda/{id_tipo_demanda}/update' , [\App\Http\Controllers\TipoDemandaController::class, 'update'])
    ->name('tipo_demanda.update');

Route::get('bairro' , [\App\Http\Controllers\BairroController::class, 'index'])
    ->name('bairro.index');
Route::get('bairro/{id_bairro}/edit' , [\App\Http\Controllers\BairroController::class, 'edit'])
    ->name('bairro.edit');
Route::get('bairro/create' , [\App\Http\Controllers\BairroController::class, 'create'])
    ->name('bairro.create');
Route::post('bairro/store' , [\App\Http\Controllers\BairroController::class, 'store'])
    ->name('bairro.store');
Route::patch('bairro/{id_bairro}/update' , [\App\Http\Controllers\BairroController::class, 'update'])
    ->name('bairro.update');

Route::get('situacao' , [\App\Http\Controllers\SituacaoController::class, 'index'])
    ->name('situacao.index');
Route::get('situacao/{id_situacao}/edit' , [\App\Http\Controllers\SituacaoController::class, 'edit'])
    ->name('situacao.edit');
Route::get('situacao/create' , [\App\Http\Controllers\SituacaoController::class, 'create'])
    ->name('situacao.create');
Route::post('situacao/store' , [\App\Http\Controllers\SituacaoController::class, 'store'])
    ->name('situacao.store');
Route::patch('situacao/{id_situacao}/update' , [\App\Http\Controllers\SituacaoController::class, 'update'])
    ->name('situacao.update');

    Route::get('geocoder/search', 'GeocoderController@search')
        ->name('geocoder.search');


    Route::get('user/create' , [\App\Http\Controllers\AuthController::class, 'create'])
    ->name('user.create');
Route::post('user/store' , [\App\Http\Controllers\AuthController::class, 'store'])
    ->name('user.store');
Route::get('user/login' , [\App\Http\Controllers\AuthController::class, 'login'])
    ->name('user.login');
Route::post('user/autenticar' , [\App\Http\Controllers\AuthController::class, 'autenticar'])
    ->name('user.autenticar');
    Route::get('user/logout' , [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('user.logout');
    Route::get('trocar-senha/{id}', [\App\Http\Controllers\AuthController::class, 'trocarSenhaForm'])->name('user.trocar.senha.get');

    Route::post('/trocar-senha/{id}', [\App\Http\Controllers\AuthController::class,'trocarSenha'])->name('user.trocar.senha.post');

    Route::get('enviar-email', [\App\Http\Controllers\AuthController::class,'enviarEmailForm'])->name('user.enviar_email');

    Route::post('enviar-email', [\App\Http\Controllers\AuthController::class, 'enviarEmail'])->name('user.store_email');
