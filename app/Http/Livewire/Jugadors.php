<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Jugador;
use App\Models\Equipo;

class Jugadors extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_equ, $nombre_jug, $cedula_jug, $telefono_jug, $correo_jug, $descripcion_jug;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $equipos = Equipo::all();
        return view('livewire.jugadors.view', [
            'jugadors' => Jugador::with('equipos')
                        ->whereHas('equipos', fn ($query) => 
                        $query->where('nombre_equ', 'LIKE', $keyWord)
                        )
						->orWhere('nombre_jug', 'LIKE', $keyWord)
						->orWhere('cedula_jug', 'LIKE', $keyWord)
						->orWhere('telefono_jug', 'LIKE', $keyWord)
						->orWhere('correo_jug', 'LIKE', $keyWord)
						->orWhere('descripcion_jug', 'LIKE', $keyWord)
						->get(),
        ],compact('equipos'));
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->id_equ = null;
		$this->nombre_jug = null;
		$this->cedula_jug = null;
		$this->telefono_jug = null;
		$this->correo_jug = null;
		$this->descripcion_jug = null;
    }

    public function store()
    {
    
        $this->validate([
            'id_equ' => 'required',
            'nombre_jug' => 'required',
            'cedula_jug' => 'required',
            'telefono_jug' => 'required',
            'correo_jug' => 'required|email',
            'descripcion_jug' => 'required',
        ]);
    
        Jugador::create([ 
            'id_equ' => $this-> id_equ,
            'nombre_jug' => $this-> nombre_jug,
            'cedula_jug' => $this-> cedula_jug,
            'telefono_jug' => $this-> telefono_jug,
            'correo_jug' => $this-> correo_jug,
            'descripcion_jug' => $this-> descripcion_jug
        ]);
        
        $this->resetInput();
        $this->emit('closeModal');
        session()->flash('message', 'Jugador Successfully created.');
    }
    

    public function edit($id)
    {
        $record = Jugador::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_equ = $record-> id_equ;
		$this->nombre_jug = $record-> nombre_jug;
		$this->cedula_jug = $record-> cedula_jug;
		$this->telefono_jug = $record-> telefono_jug;
		$this->correo_jug = $record-> correo_jug;
		$this->descripcion_jug = $record-> descripcion_jug;
		
        $this->updateMode = true;
    }

    public function update()
{
    if ($this->selected_id) {
        $this->validate([
            'id_equ' => 'required',
            'nombre_jug' => 'required',
            'cedula_jug' => 'required',
            'telefono_jug' => 'required',
            'correo_jug' => 'required|email',
            'descripcion_jug' => 'required',
        ]);

        $record = Jugador::find($this->selected_id);
        $record->update([ 
            'id_equ' => $this-> id_equ,
            'nombre_jug' => $this-> nombre_jug,
            'cedula_jug' => $this-> cedula_jug,
            'telefono_jug' => $this-> telefono_jug,
            'correo_jug' => $this-> correo_jug,
            'descripcion_jug' => $this-> descripcion_jug
        ]);

        $this->resetInput();
        $this->updateMode = false;
        session()->flash('message', 'Jugador Successfully updated.');
    }
}

    public function destroy($id)
    {
        if ($id) {
            $record = Jugador::where('id', $id);
            $record->delete();
        }
    }
}
