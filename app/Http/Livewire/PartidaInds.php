<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PartidaInd;
use App\Models\InscripcionInd;

class PartidaInds extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_jug1, $id_jug2, $ganador_par_ind, $fecha_par_ind, $observacion_par_ind;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $inscritos = InscripcionInd::with('individuales')->get();
        return view('livewire.partida-inds.view', [
            'partidaInds' => PartidaInd::with('jugadors1')->with('jugadors2')->with('jugadors3')
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
        ], compact('inscritos'));
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->id_jug1 = null;
		$this->id_jug2 = null;
		$this->ganador_par_ind = null;
		$this->fecha_par_ind = null;
		$this->observacion_par_ind = null;
    }

    public function store()
    {
        $this->validate([
		'id_jug1' => 'required',
		'id_jug2' => 'required',
		'ganador_par_ind' => 'required',
        ]);

        PartidaInd::create([ 
			'id_jug1' => $this-> id_jug1,
			'id_jug2' => $this-> id_jug2,
			'ganador_par_ind' => $this-> ganador_par_ind,
			'fecha_par_ind' => $this-> fecha_par_ind,
			'observacion_par_ind' => $this-> observacion_par_ind
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'PartidaInd Successfully created.');
    }

    public function edit($id)
    {
        $record = PartidaInd::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_jug1 = $record-> id_jug1;
		$this->id_jug2 = $record-> id_jug2;
		$this->ganador_par_ind = $record-> ganador_par_ind;
		$this->fecha_par_ind = $record-> fecha_par_ind;
		$this->observacion_par_ind = $record-> observacion_par_ind;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_jug1' => 'required',
		'id_jug2' => 'required',
		'ganador_par_ind' => 'required',
        ]);

        if ($this->selected_id) {
			$record = PartidaInd::find($this->selected_id);
            $record->update([ 
			'id_jug1' => $this-> id_jug1,
			'id_jug2' => $this-> id_jug2,
			'ganador_par_ind' => $this-> ganador_par_ind,
			'fecha_par_ind' => $this-> fecha_par_ind,
			'observacion_par_ind' => $this-> observacion_par_ind
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'PartidaInd Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = PartidaInd::where('id', $id);
            $record->delete();
        }
    }
}
