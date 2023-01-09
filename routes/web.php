<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Aulas;
use App\Http\Livewire\Categorias;
use App\Http\Livewire\Equipos;
use App\Http\Livewire\PartidaEqus;
use App\Http\Livewire\JugadorIns;
use App\Http\Livewire\JuegosRep;
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
    return view('sample');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dash', function () {
        return view('dash.index');
    })->name('dash');
});

//Route Hooks - Do not delete//
	Route::view('partida-inds', 'livewire.partida-inds.index');
	Route::view('partida-equs', 'livewire.partida-equs.index');
	Route::view('horarios', 'livewire.horarios.index');
	Route::view('equipos', 'livewire.equipos.index');
	Route::view('aulas', 'livewire.aulas.index');
	Route::view('jugadors', 'livewire.jugadors.index');
	Route::view('juegos', 'livewire.juegos.index');

	Route::view('inscripcion-equs', 'livewire.inscripcion-equs.index');
	Route::view('inscripcion-inds', 'livewire.inscripcion-inds.index');
	Route::view('categorias', 'livewire.categorias.index');
	Route::view('jugadores-ins', 'livewire.jugadores-ins.index');
	Route::view('juegos-rep', 'livewire.juegos-rep.index');

	Route::get('aulas/view-pdf', [Aulas::class, 'viewPDF'])->name('viewAulas-pdf');
	Route::get('aulas/download-pdf', [Aulas::class, 'downloadPDF'])->name('downloadAulas-pdf');
	Route::get('categorias/view-pdf', [Categorias::class, 'viewPDF'])->name('viewCategorias-pdf');
	Route::get('categorias/download-pdf', [Categorias::class, 'downloadPDF'])->name('downloadCategorias-pdf');
	Route::get('equipos/view-pdf', [Equipos::class, 'viewPDF'])->name('viewEquipos-pdf');
	Route::get('equipos/download-pdf', [Equipos::class, 'downloadPDF'])->name('downloadEquipos-pdf');
	Route::get('partida-equs/view-pdf', [PartidaEqus::class, 'viewPDF'])->name('viewPartidaEqu-pdf');
	Route::get('partida-equs/download-pdf', [PartidaEqus::class, 'downloadPDF'])->name('downloadPartidaEqu-pdf');

	Route::get('jugadores-ins/view-pdf', [JugadorIns::class, 'viewPDF'])->name('viewJugadorIns-pdf');
	Route::get('jugadores-ins/download-pdf', [JugadorIns::class, 'downloadPDF'])->name('downloadJugadorIns-pdf');

	Route::get('juegos-rep/view-pdf', [JuegosRep::class, 'viewPDF'])->name('viewJuegosRep-pdf');
	Route::get('juegos-rep/download-pdf', [JuegosRep::class, 'downloadPDF'])->name('downloadJuegosRep-pdf');
