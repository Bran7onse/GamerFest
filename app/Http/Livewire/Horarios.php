<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Horario;
use App\Models\Juego;
class Horarios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_jue, $hora_ini_hor, $hora_fin_hor, $observacion_hor;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $juegos = Juego::all();
        return view('livewire.horarios.view', [
            'horarios' => Horario::with('juegos')
                        ->whereHas('juegos', fn ($query) => 
                        $query->where('nombre_jue', 'LIKE', $keyWord)
                        )
						->orWhere('hora_ini_hor', 'LIKE', $keyWord)
						->orWhere('hora_fin_hor', 'LIKE', $keyWord)
						->orWhere('observacion_hor', 'LIKE', $keyWord)
						->get(),
        ], compact('juegos'));
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->id_jue = null;
		$this->hora_ini_hor = null;
		$this->hora_fin_hor = null;
		$this->observacion_hor = null;
    }

    public function store()
    {
        $this->validate([
		'id_jue' => 'required',
        ]);

        Horario::create([ 
			'id_jue' => $this-> id_jue,
			'hora_ini_hor' => $this-> hora_ini_hor,
			'hora_fin_hor' => $this-> hora_fin_hor,
			'observacion_hor' => $this-> observacion_hor
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Horario Successfully created.');
    }

    public function edit($id)
    {
        $record = Horario::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_jue = $record-> id_jue;
		$this->hora_ini_hor = $record-> hora_ini_hor;
		$this->hora_fin_hor = $record-> hora_fin_hor;
		$this->observacion_hor = $record-> observacion_hor;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_jue' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Horario::find($this->selected_id);
            $record->update([ 
			'id_jue' => $this-> id_jue,
			'hora_ini_hor' => $this-> hora_ini_hor,
			'hora_fin_hor' => $this-> hora_fin_hor,
			'observacion_hor' => $this-> observacion_hor
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Horario Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Horario::where('id', $id);
            $record->delete();
        }
    }
}
