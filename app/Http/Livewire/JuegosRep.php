<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Juego;
use App\Models\Aula;
use App\Models\Categoria;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JuegosRepExport;
use PDF;

class JuegosRep extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_aul, $id_cat, $nombre_jue, $imagen, $precio_jue, $descripcion_jue;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';

        return view('livewire.juegos-rep.view', [
            'juegos' => Juego::with('categorias')->with('aulas')
                        ->whereHas('aulas', fn ($query) => 
                        $query->where('codigo_aul', 'LIKE', $keyWord)
                        )
                        ->whereHas('categorias', fn ($query) => 
                        $query->where('tipo_cat', 'LIKE', $keyWord)
                        )
						->orWhere('nombre_jue', 'LIKE', $keyWord)
						->orWhere('imagen', 'LIKE', $keyWord)
						->orWhere('precio_jue', 'LIKE', $keyWord)
						->orWhere('descripcion_jue', 'LIKE', $keyWord)   

                        ->get()      
,
        ]);
    }
    public function viewPDF()
    {
        $keyWord = '%'.$this->keyWord .'%';

        $juegos = Juego::with('categorias')->with('aulas')
        ->whereHas('aulas', fn ($query) => 
        $query->where('codigo_aul', 'LIKE', $keyWord)
        )
        ->whereHas('categorias', fn ($query) => 
        $query->where('tipo_cat', 'LIKE', $keyWord)
        )
        ->orWhere('nombre_jue', 'LIKE', $keyWord)
        ->orWhere('imagen', 'LIKE', $keyWord)
        ->orWhere('precio_jue', 'LIKE', $keyWord)
        ->orWhere('descripcion_jue', 'LIKE', $keyWord)   

        ->get();
        $pdf = PDF::loadView('livewire.juegos-rep.jugadoresReporte', array('juegos'=> $juegos))->setPaper('a4','landscape');
        return $pdf->stream();
    }
    
    public function downloadPDF()
    {
        $keyWord = '%'.$this->keyWord .'%';

        $juegos = Juego::with('categorias')->with('aulas')
        ->whereHas('aulas', fn ($query) => 
        $query->where('codigo_aul', 'LIKE', $keyWord)
        )
        ->whereHas('categorias', fn ($query) => 
        $query->where('tipo_cat', 'LIKE', $keyWord)
        )
        ->orWhere('nombre_jue', 'LIKE', $keyWord)
        ->orWhere('imagen', 'LIKE', $keyWord)
        ->orWhere('precio_jue', 'LIKE', $keyWord)
        ->orWhere('descripcion_jue', 'LIKE', $keyWord)   

        ->get();
        $pdf = PDF::loadView('livewire.juegos-rep.jugadoresReporte', array('juegos'=> $juegos))->setPaper('a4','landscape');
        return $pdf->download('Reporte de Juegos.pdf');
    }
    public function exportExcel(){

        return Excel::download(new JuegosRepExport, 'juegos.xlsx');
    }
}

	
