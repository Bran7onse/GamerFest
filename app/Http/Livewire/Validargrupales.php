<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Validargrupale;
use App\Models\InscripcionEqu;

class Validargrupales extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_inscripcion__equs, $validarpago;
    public $updateMode = false;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
    $equiposInscritos = InscripcionEqu::with('equipos')->get();

    return view('livewire.validargrupales.view', [
        'validargrupales' => Validargrupale::latest()
            ->orWhereHas('inscripcionequ', function ($query) use ($keyWord) {
                $query->whereHas('equipos', function ($query) use ($keyWord) {
                    $query->where('nombre_equ', 'LIKE', $keyWord);
                });
            })
            ->orWhere('validarpago', 'LIKE', $keyWord)
            ->paginate(10),
        'equiposInscritos' => $equiposInscritos,
    ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->id_inscripcion__equs = null;
		$this->validarpago = null;
    }

    public function store()
    {
        $this->validate([
		'id_inscripcion__equs' => 'required',
		'validarpago' => 'required',
        ]);

        Validargrupale::create([ 
			'id_inscripcion__equs' => $this-> id_inscripcion__equs,
			'validarpago' => $this-> validarpago
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Validargrupale Successfully created.');
    }

    public function edit($id)
    {
        $record = Validargrupale::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_inscripcion__equs = $record-> id_inscripcion__equs;
		$this->validarpago = $record-> validarpago;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_inscripcion__equs' => 'required',
		'validarpago' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Validargrupale::find($this->selected_id);
            $record->update([ 
			'id_inscripcion__equs' => $this-> id_inscripcion__equs,
			'validarpago' => $this-> validarpago
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Validargrupale Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Validargrupale::where('id', $id);
            $record->delete();
        }
    }
}
