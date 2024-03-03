<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PartidaEqu;
use App\Models\InscripcionEqu;
use PDF;
class PartidaEqus extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_equ1, $id_equ2, $ganador_par_equ, $fecha_par_equ, $observacion_par_equ;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $inscritos = InscripcionEqu::with('equipos')->get();
        return view('livewire.partida-equs.view', [
            'partidaEqus' => PartidaEqu::with('equipo1')->with('equipo2')->with('equipo3')
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
        ], compact('inscritos'));
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->id_equ1 = null;
		$this->id_equ2 = null;
		$this->ganador_par_equ = null;
		$this->fecha_par_equ = null;
		$this->observacion_par_equ = null;
    }

    public function store()
    {
        $this->validate([
		'id_equ1' => 'required',
		'id_equ2' => 'required',
		'ganador_par_equ' => 'required',
        ]);

        PartidaEqu::create([ 
			'id_equ1' => $this-> id_equ1,
			'id_equ2' => $this-> id_equ2,
			'ganador_par_equ' => $this-> ganador_par_equ,
			'fecha_par_equ' => $this-> fecha_par_equ,
			'observacion_par_equ' => $this-> observacion_par_equ
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'PartidaEqu Successfully created.');
    }

    public function edit($id)
    {
        $record = PartidaEqu::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_equ1 = $record-> id_equ1;
		$this->id_equ2 = $record-> id_equ2;
		$this->ganador_par_equ = $record-> ganador_par_equ;
		$this->fecha_par_equ = $record-> fecha_par_equ;
		$this->observacion_par_equ = $record-> observacion_par_equ;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_equ1' => 'required',
		'id_equ2' => 'required',
		'ganador_par_equ' => 'required',
        ]);

        if ($this->selected_id) {
			$record = PartidaEqu::find($this->selected_id);
            $record->update([ 
			'id_equ1' => $this-> id_equ1,
			'id_equ2' => $this-> id_equ2,
			'ganador_par_equ' => $this-> ganador_par_equ,
			'fecha_par_equ' => $this-> fecha_par_equ,
			'observacion_par_equ' => $this-> observacion_par_equ
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'PartidaEqu Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = PartidaEqu::where('id', $id);
            $record->delete();
        }
    }
    public function viewPDF()
    {
        $keyWord = '%'.$this->keyWord .'%';

        $partidaEqus = PartidaEqu::with('equipo1')->with('equipo2')->with('equipo3')
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
        $pdf = PDF::loadView('livewire.partida-equs.partidaEquCatalogo', array('partidaEqus'=> $partidaEqus))->setPaper('a4','portrait');
        return $pdf->stream();
    }
    
    public function downloadPDF()
    {
        $keyWord = '%'.$this->keyWord .'%';

        $partidaEqus = PartidaEqu::with('equipo1')->with('equipo2')->with('equipo3')
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
        $pdf = PDF::loadView('livewire.partida-equs.partidaEquCatalogo', array('partidaEqus'=> $partidaEqus))->setPaper('a4','portrait');
        return $pdf->download('PartidoEquipos.pdf');
    }
}
