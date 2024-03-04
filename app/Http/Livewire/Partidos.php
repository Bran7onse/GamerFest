<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PartidaEqu;
use App\Models\PartidaInd;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PartidosExport;
use PDF;
class Partidos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_equ, $nombre_ind, $cedula_ind, $telefono_ind, $correo_ind, $descripcion_ind;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
       
        return view('livewire.partidos.view', [
            'partidosInd' => PartidaInd::with('jugadors1')->with('jugadors2')->with('jugadors3')
            ->whereHas('jugadors1', fn ($query) => 
            $query->where('nombre_ind', 'LIKE', $keyWord)
            )
            ->whereHas('jugadors2', fn ($query) => 
            $query->where('nombre_ind', 'LIKE', $keyWord)
            )
            ->whereHas('jugadors3', fn ($query) => 
            $query->where('nombre_ind', 'LIKE', $keyWord)
            )
            ->orWhere('fecha_par_ind', 'LIKE', $keyWord)
            ->orWhere('observacion_par_ind', 'LIKE', $keyWord)
            ->get(),
        ],[
            'partidosEqu' => PartidaEqu::with('equipo1')->with('equipo2')->with('equipo3')
            ->whereHas('equipo1', fn ($query) => 
            $query->where('nombre_equ', 'LIKE', $keyWord)
            )
            ->whereHas('equipo2', fn ($query) => 
            $query->where('nombre_equ', 'LIKE', $keyWord)
            )
            ->whereHas('equipo3', fn ($query) => 
            $query->where('nombre_equ', 'LIKE', $keyWord)
            )
            ->orWhere('fecha_par_equ', 'LIKE', $keyWord)
            ->orWhere('observacion_par_equ', 'LIKE', $keyWord)
            ->get(),
        ]);
    }
	
    public function viewPDF()
    {
        $keyWord = '%'.$this->keyWord .'%';
        $partidosInd = PartidaInd::with('jugadors1')->with('jugadors2')->with('jugadors3')
        ->whereHas('jugadors1', fn ($query) => 
        $query->where('nombre_ind', 'LIKE', $keyWord)
        )
        ->whereHas('jugadors2', fn ($query) => 
        $query->where('nombre_ind', 'LIKE', $keyWord)
        )
        ->whereHas('jugadors3', fn ($query) => 
        $query->where('nombre_ind', 'LIKE', $keyWord)
        )
        ->orWhere('fecha_par_ind', 'LIKE', $keyWord)
        ->orWhere('observacion_par_ind', 'LIKE', $keyWord)
        ->get();
        

        $partidosEqu = PartidaEqu::with('equipo1')->with('equipo2')->with('equipo3')
        ->whereHas('equipo1', fn ($query) => 
        $query->where('nombre_equ', 'LIKE', $keyWord)
        )
        ->whereHas('equipo2', fn ($query) => 
        $query->where('nombre_equ', 'LIKE', $keyWord)
        )
        ->whereHas('equipo3', fn ($query) => 
        $query->where('nombre_equ', 'LIKE', $keyWord)
        )
        ->orWhere('fecha_par_equ', 'LIKE', $keyWord)
        ->orWhere('observacion_par_equ', 'LIKE', $keyWord)
        ->get();
        $pdf = PDF::loadView('livewire.partidos.partidosReporte', array('partidosInd'=> $partidosInd),array('partidosEqu'=> $partidosEqu))->setPaper('a4','landscape');
        return $pdf->stream();
    }
    
    public function downloadPDF()
    {
        $keyWord = '%'.$this->keyWord .'%';
        $partidosInd = PartidaInd::with('jugadors1')->with('jugadors2')->with('jugadors3')
        ->whereHas('jugadors1', fn ($query) => 
        $query->where('nombre_ind', 'LIKE', $keyWord)
        )
        ->whereHas('jugadors2', fn ($query) => 
        $query->where('nombre_ind', 'LIKE', $keyWord)
        )
        ->whereHas('jugadors3', fn ($query) => 
        $query->where('nombre_ind', 'LIKE', $keyWord)
        )
        ->orWhere('fecha_par_ind', 'LIKE', $keyWord)
        ->orWhere('observacion_par_ind', 'LIKE', $keyWord)
        ->get();
        

        $partidosEqu = PartidaEqu::with('equipo1')->with('equipo2')->with('equipo3')
        ->whereHas('equipo1', fn ($query) => 
        $query->where('nombre_equ', 'LIKE', $keyWord)
        )
        ->whereHas('equipo2', fn ($query) => 
        $query->where('nombre_equ', 'LIKE', $keyWord)
        )
        ->whereHas('equipo3', fn ($query) => 
        $query->where('nombre_equ', 'LIKE', $keyWord)
        )
        ->orWhere('fecha_par_equ', 'LIKE', $keyWord)
        ->orWhere('observacion_par_equ', 'LIKE', $keyWord)
        ->get();
        $pdf = PDF::loadView('livewire.partidos.partidosReporte', array('partidosInd'=> $partidosInd),array('partidosEqu'=> $partidosEqu))->setPaper('a4','landscape');
        return $pdf->download('Partidos.pdf');
    }
    public function exportExcel(){

        return Excel::download(new PartidosExport, 'partidos.xlsx');
    }
}