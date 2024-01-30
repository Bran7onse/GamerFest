<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Individuale;

class Individuales extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_ind, $cedula_ind, $telefono_ind, $correo_ind, $descripcion_ind;
    public $updateMode = false;

    protected $rules = [
        'nombre_ind' => 'required|string|min:3',
        'cedula_ind' => 'required|string|min:3',
        'telefono_ind' => 'required|string|min:3',
        'correo_ind' => 'required|email',
        'descripcion_ind' => 'nullable|string',
    ];

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.individuales.view', [
            'individuales' => Individuale::latest()
						->orWhere('nombre_ind', 'LIKE', $keyWord)
						->orWhere('cedula_ind', 'LIKE', $keyWord)
						->orWhere('telefono_ind', 'LIKE', $keyWord)
						->orWhere('correo_ind', 'LIKE', $keyWord)
						->orWhere('descripcion_ind', 'LIKE', $keyWord)
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
		$this->nombre_ind = null;
		$this->cedula_ind = null;
		$this->telefono_ind = null;
		$this->correo_ind = null;
		$this->descripcion_ind = null;
    }

    public function store()
    {
        Individuale::create([ 
			'nombre_ind' => $this-> nombre_ind,
			'cedula_ind' => $this-> cedula_ind,
			'telefono_ind' => $this-> telefono_ind,
			'correo_ind' => $this-> correo_ind,
			'descripcion_ind' => $this-> descripcion_ind
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Individuale Successfully created.');
    }

    public function edit($id)
    {
        $record = Individuale::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre_ind = $record-> nombre_ind;
		$this->cedula_ind = $record-> cedula_ind;
		$this->telefono_ind = $record-> telefono_ind;
		$this->correo_ind = $record-> correo_ind;
		$this->descripcion_ind = $record-> descripcion_ind;
		
        $this->updateMode = true;
    }

    public function update()
    {
        if ($this->selected_id) {
            $this->validate([
                'nombre_ind' => 'required|string|min:3',
                'cedula_ind' => 'required|string|min:3',
                'telefono_ind' => 'required|string|min:3',
                'correo_ind' => 'required|email',
                'descripcion_ind' => 'nullable|string',
            ]);
    
            $record = Individuale::find($this->selected_id);
            $record->update([ 
                'nombre_ind' => $this->nombre_ind,
                'cedula_ind' => $this->cedula_ind,
                'telefono_ind' => $this->telefono_ind,
                'correo_ind' => $this->correo_ind,
                'descripcion_ind' => $this->descripcion_ind
            ]);
    
            $this->resetInput();
            $this->updateMode = false;
            session()->flash('message', 'Individuale Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Individuale::where('id', $id);
            $record->delete();
        }
    }
}
