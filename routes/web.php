<?php

use App\Http\Controllers\CapturarResultadosController;
use App\Http\Controllers\ConceptoController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PDFController;

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

//---------ESTUDIOS
Route::get('/dashboard', function () {
    $estudios = auth()->user()->estudios;
    return view('dashboard', compact('estudios'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get(
    '/estudios/crear',
    'App\Http\Controllers\EstudioController@create'
)->middleware(['auth', 'verified'])->name('estudios.create');

Route::post(
    '/estudios',
    'App\Http\Controllers\EstudioController@store'
)->middleware(['auth', 'verified'])->name('estudios.store');

Route::get(
    '/estudios/{estudio}/detalles',
    'App\Http\Controllers\EstudioController@show'
)->middleware(['auth', 'verified'])->name('estudios.show');

Route::patch(
    '/estudios/{estudio}/actualizar',
    'App\Http\Controllers\EstudioController@update'
)->middleware(['auth', 'verified'])->name('estudios.update');

Route::delete(
    '/estudios/{estudio}/eliminar',
    'App\Http\Controllers\EstudioController@delete'
)->middleware(['auth', 'verified'])->name('estudios.delete');

//-----------ENCUESTAS
Route::get(
    '/estudios/{estudio}/encuestas/mostrar',
    'App\Http\Controllers\PollController@index'
)->middleware(['auth', 'verified'])->name('polls.index');

Route::get(
    '/estudios/{estudio}/encuestas/crear/',
    'App\Http\Controllers\PollController@create'
)->middleware(['auth', 'verified'])->name('polls.create');

Route::post(
    '/estudios/{estudio}/encuestas',
    'App\Http\Controllers\PollController@store'
)->middleware(['auth', 'verified'])->name('polls.store');

Route::get(
    '/estudios/{estudio}/encuestas/{encuesta}',
    'App\Http\Controllers\PollController@show'
)->middleware(['auth', 'verified'])->name('polls.show');

//--------PREGUNTAS
Route::get(
    '/estudios/{estudio}/encuestas/{encuesta}/preguntas/crear',
    'App\Http\Controllers\PreguntaController@create'
)->middleware(['auth', 'verified'])->name('preguntas.create');

Route::post(
    '/estudios/{estudio}/encuestas/{encuesta}/preguntas',
    'App\Http\Controllers\PreguntaController@store'
)->middleware(['auth', 'verified'])->name('preguntas.store');

Route::get(
    '/estudios/{estudio}/encuestas/{encuesta}/preguntas/{pregunta}/editar',
    'App\Http\Controllers\PreguntaController@edit'
)->middleware(['auth', 'verified'])->name('preguntas.edit');

Route::patch(
    '/estudios/{estudio}/encuestas/{encuesta}/preguntas/{pregunta}/actualizar',
    'App\Http\Controllers\PreguntaController@update'
)->middleware(['auth', 'verified'])->name('preguntas.update');

Route::delete(
    '/estudios/{estudio}/encuestas/{encuesta}/preguntas/{pregunta}/eliminar',
    'App\Http\Controllers\PreguntaController@delete'
)->middleware(['auth', 'verified'])->name('preguntas.delete');

//--------FORMULARIOS
Route::get(
    '/estudios/{estudio}/formularios/{encuesta}-{slug}',
    'App\Http\Controllers\FormularioController@show'
)->middleware(['auth', 'verified'])->name('formulario.show');

Route::post(
    '/formularios/{encuesta}-{slug}',
    'App\Http\Controllers\FormularioController@store'
)->middleware(['auth', 'verified'])->name('formulario.store');

//-------CONCLUSION
Route::get(
    '/estudios/{estudio}/conclusion/mostrar',
    'App\Http\Controllers\ConclusionController@index'
)->middleware(['auth', 'verified'])->name('conclusion.index');

Route::patch(
    '/estudios/{estudio}/conclusion/actualizar',
    'App\Http\Controllers\ConclusionController@update'
)->middleware(['auth', 'verified'])->name('conclusion.update');

Route::get(
    '/estudios/{estudio}/conclusion/crear',
    'App\Http\Controllers\ConclusionController@create'
)->middleware(['auth', 'verified'])->name('conclusion.create');

Route::post(
    '/estudios/{estudio}/conclusion/guardar',
    'App\Http\Controllers\ConclusionController@store'
)->middleware(['auth', 'verified'])->name('conclusion.store');

//-------CONCEPTO
// Route::get(
//     '/estudios/{estudio}/concepto/',
//     [ConceptoController::class,'index']
// )->middleware(['auth', 'verified'])->name('concepto.index');

// Route::get(
//     '/estudios/{estudio}/concepto/crear',
//     [ConceptoController::class,'create']
// )->middleware(['auth', 'verified'])->name('concepto.create');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(ConceptoController::class)->group(function () {
        Route::get('/estudios/{estudio}/conceptos/', 'index')->name('conceptos.index');
        Route::get('/estudios/{estudio}/conceptos/crear', 'create')->name('conceptos.create');
        Route::post('/estudios/{estudio}/conceptos/', 'store')->name('conceptos.store');
        Route::get('/estudios/{estudio}/conceptos/{concepto}', 'show')->name('conceptos.show');
        Route::get('/estudios/{estudio}/conceptos/{concepto}/editar', 'edit')->name('conceptos.edit');
        Route::patch('/estudios/{estudio}/conceptos/{concepto}', 'update')->name('conceptos.update');
        Route::delete('/estudios/{estudio}/conceptos/{concepto}', 'destroy')->name('conceptos.destroy');
    });

    Route::controller(CapturarResultadosController::class)->group(function () {
        Route::get('/estudios/{estudio}/resultados/', 'index')->name('resultados.index');
        Route::patch('/estudios/{estudio}/resultados/{concepto}', 'update')->name('resultados.update');
    });
});

Route::get(
    '/estudios/{estudio}/generate-pdf', [PDFController::class, 'generatePDF']
)->middleware(['auth', 'verified'])->name('pdf.generate');

require __DIR__ . '/auth.php';
