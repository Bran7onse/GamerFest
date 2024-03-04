<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Individuale;
use App\Models\Juego;
use App\Models\InscripcionInd;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JugadorInsExport;
use PDF;
class JugadorIns extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_ind, $nombre_ind, $cedula_ind, $telefono_ind, $correo_ind, $descripcion_ind,$nombre_jue;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $nombre_jue = $this->nombre_jue ;
        $juegos = Juego::all();
        return view('livewire.jugadores-ins.view', [
            'jugadorsIns' => InscripcionInd::with('individuales')->with('juegos')
            ->whereHas('individuales', fn ($query) => 
            $query->orderBy('nombre_ind','desc')
        )
                        ->whereHas('juegos', function ($query) use($nombre_jue){
                            if($nombre_jue){
                                $query->where('nombre_jue', '=', $nombre_jue);
                                
                            }
                        } )
                        
                        
                        
			->get(),
        ],compact('juegos'));
    }
	
    public function viewPDF()
    {
        $keyWord = '%'.$this->keyWord .'%';

        $jugadorIns = InscripcionInd::with('individuales')->with('juegos')
        ->whereHas('individuales', fn ($query) => 
        $query->where('nombre_ind', 'LIKE', $keyWord)
        )
        ->whereHas('individuales', fn ($query) => 
        $query->where('cedula_ind', 'LIKE', $keyWord)
        )
        ->whereHas('individuales', fn ($query) => 
        $query->where('telefono_ind', 'LIKE', $keyWord)
        )
        ->whereHas('individuales', fn ($query) => 
        $query->where('correo_ind', 'LIKE', $keyWord)
        )
        ->whereHas('individuales', fn ($query) => 
        $query->where('descripcion_ind', 'LIKE', $keyWord)
        )
        ->whereHas('juegos', fn ($query) => 
        $query->where('nombre_jue', 'LIKE', $keyWord)
        )
        ->orWhere('precio_ins', 'LIKE', $keyWord)
        ->get();
        $pdf = PDF::loadView('livewire.jugadores-ins.jugadorInsReporte', array('jugadorIns'=> $jugadorIns))->setPaper('a4','landscape');
        return $pdf->stream();
    }
    
    public function downloadPDF()
    {
        $keyWord = '%'.$this->keyWord .'%';

        $jugadorIns = InscripcionInd::with('individuales')->with('juegos')
        ->whereHas('individuales', fn ($query) => 
        $query->where('nombre_ind', 'LIKE', $keyWord)
        )
        ->whereHas('individuales', fn ($query) => 
        $query->where('cedula_ind', 'LIKE', $keyWord)
        )
        ->whereHas('individuales', fn ($query) => 
        $query->where('telefono_ind', 'LIKE', $keyWord)
        )
        ->whereHas('individuales', fn ($query) => 
        $query->where('correo_ind', 'LIKE', $keyWord)
        )
        ->whereHas('individuales', fn ($query) => 
        $query->where('descripcion_ind', 'LIKE', $keyWord)
        )
        ->whereHas('juegos', fn ($query) => 
        $query->where('nombre_jue', 'LIKE', $keyWord)
        )
        ->orWhere('precio_ins', 'LIKE', $keyWord)
        ->get();
        $pdf = PDF::loadView('livewire.jugadores-ins.jugadorInsReporte', array('jugadorIns'=> $jugadorIns))->setPaper('a4','landscape');
        return $pdf->download('Jugadores_Inscritos.pdf');
    }
    public function exportExcel(){

        return Excel::download(new JugadorInsExport, 'jugadores.xlsx');
    }
}