<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Validarindividuale;

class Validarindividuales extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_inscripcion__inds, $validarpago;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.validarindividuales.view', [
            'validarindividuales' => Validarindividuale::latest()
						->orWhere('id_inscripcion__inds', 'LIKE', $keyWord)
						->orWhere('validarpago', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->id_inscripcion__inds = null;
		$this->validarpago = null;
    }

    public function store()
    {
        $this->validate([
            'id_inscripcion__inds' => 'required',
            'validarpago' => 'required',
        ]);
    
        Validarindividuale::create([ 
            'id_inscripcion__inds' => $this-> id_inscripcion__inds,
            'validarpago' => $this-> validarpago
        ]);
            
        $this->resetInput();
        $this->emit('closeModal');
        session()->flash('message', 'Validarindividuale Successfully created.');
    }

    public function edit($id)
    {
        $record = Validarindividuale::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_inscripcion__inds = $record-> id_inscripcion__inds;
		$this->validarpago = $record-> validarpago;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'id_inscripcion__inds' => 'required',
            'validarpago' => 'required',
        ]);
    
        if ($this->selected_id) {
            $record = Validarindividuale::find($this->selected_id);
            $record->update([ 
            'id_inscripcion__inds' => $this-> id_inscripcion__inds,
            'validarpago' => $this-> validarpago
            ]);
    
            $this->resetInput();
            $this->updateMode = false;
            session()->flash('message', 'Validarindividuale Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Validarindividuale::where('id', $id);
            $record->delete();
        }
    }
}
