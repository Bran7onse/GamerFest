<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Aulas;
use App\Http\Livewire\Categorias;
use App\Http\Livewire\Equipos;
use App\Http\Livewire\PartidaEqus;
use App\Http\Livewire\JugadorIns;
use App\Http\Livewire\Recaudacion;
use App\Http\Livewire\EquiposIns;
use App\Http\Livewire\JuegosRep;
use App\Http\Livewire\Partidos;
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
    'verified'
])->group(function () {
    Route::get('/dash', function () {
        return view('dash.index');
    })->name('dash');
});

//Route Hooks - Do not delete//
	Route::view('individuales', 'livewire.individuales.index')->middleware('auth');
	Route::view('partida-inds', 'livewire.partida-inds.index');
	Route::view('partida-equs', 'livewire.partida-equs.index');
	Route::view('horarios', 'livewire.horarios.index');
	Route::view('equipos', 'livewire.equipos.index');
	Route::view('aulas', 'livewire.aulas.index');
	Route::view('jugadors', 'livewire.jugadors.index');
	Route::view('juegos', 'livewire.juegos.index');
	Route::view('jugadores-ins', 'livewire.jugadores-ins.index');

	Route::view('inscripcion-equs', 'livewire.inscripcion-equs.index');
	Route::view('inscripcion-inds', 'livewire.inscripcion-inds.index');
	Route::view('categorias', 'livewire.categorias.index');
	Route::view('jugadores-ins', 'livewire.jugadores-ins.index');
	Route::view('equipos-ins', 'livewire.equipos-ins.index');
	Route::view('recaudacion', 'livewire.recaudacion.index');
	Route::view('partidos', 'livewire.partidos.index');
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

	Route::get('equipos-ins/view-pdf', [EquiposIns::class, 'viewPDF'])->name('viewEquiposIns-pdf');
	Route::get('equipos-ins/download-pdf', [EquiposIns::class, 'downloadPDF'])->name('downloadEquiposIns-pdf');
	Route::get('recaudacion/view-pdf', [Recaudacion::class, 'viewPDF'])->name('viewRecaudacion-pdf');
	Route::get('recaudacion/download-pdf', [Recaudacion::class, 'downloadPDF'])->name('downloadRecaudacion-pdf');

	Route::get('partidos/view-pdf', [Partidos::class, 'viewPDF'])->name('viewPartidos-pdf');
	Route::get('partidos/download-pdf', [Partidos::class, 'downloadPDF'])->name('downloadPartidos-pdf');

	
	Route::get('juegos-rep/view-pdf', [JuegosRep::class, 'viewPDF'])->name('viewJuegosRep-pdf');
	Route::get('juegos-rep/download-pdf', [JuegosRep::class, 'downloadPDF'])->name('downloadJuegosRep-pdf');

	Route::get('jugadores-ins/excel', [JugadorIns::class, 'exportExcel'])->name('excelJugadorIns');
	Route::get('juegos-rep/excel', [JuegosRep::class, 'exportExcel'])->name('excelJuegos');
	Route::get('equipos-ins/excel', [EquiposIns::class, 'exportExcel'])->name('excelEquipos');
	Route::get('recaudacion/excel', [Recaudacion::class, 'exportExcel'])->name('excelRecaudacion');
	Route::get('partidos/excel', [Partidos::class, 'exportExcel'])->name('excelPartidos');