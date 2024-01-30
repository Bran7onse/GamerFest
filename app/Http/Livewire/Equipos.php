<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Equipo;
use PDF;
class Equipos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre_equ, $descripcion_equ;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.equipos.view', [
            'equipos' => Equipo::latest()
						->orWhere('nombre_equ', 'LIKE', $keyWord)
						->orWhere('descripcion_equ', 'LIKE', $keyWord)
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
		$this->nombre_equ = null;
		$this->descripcion_equ = null;
    }

    public function store()
{
    $this->validate([
        'nombre_equ' => 'required',
        'descripcion_equ' => 'required',
    ]);

    Equipo::create([ 
        'nombre_equ' => $this-> nombre_equ,
        'descripcion_equ' => $this-> descripcion_equ
    ]);
        
    $this->resetInput();
    $this->emit('closeModal');
    session()->flash('message', 'Equipo Successfully created.');
}

    public function edit($id)
    {
        $record = Equipo::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre_equ = $record-> nombre_equ;
		$this->descripcion_equ = $record-> descripcion_equ;
		
        $this->updateMode = true;
    }

    public function update()
{
    $this->validate([
        'nombre_equ' => 'required',
        'descripcion_equ' => 'required',
    ]);

    if ($this->selected_id) {
        $record = Equipo::find($this->selected_id);
        $record->update([ 
            'nombre_equ' => $this-> nombre_equ,
            'descripcion_equ' => $this-> descripcion_equ
        ]);

        $this->resetInput();
        $this->updateMode = false;
        session()->flash('message', 'Equipo Successfully updated.');
    }
}

    public function destroy($id)
    {
        if ($id) {
            $record = Equipo::where('id', $id);
            $record->delete();
        }
    }
    public function viewPDF()
    {
        $equipos = Equipo::all();
        $pdf = PDF::loadView('livewire.equipos.equiposCatalogo', array('equipos'=> $equipos))->setPaper('a4','portrait');
        return $pdf->stream();
    }
    
    public function downloadPDF()
    {
        $equipos = Equipo::all();
        $pdf = PDF::loadView('livewire.equipos.equiposCatalogo', array('equipos'=> $equipos))->setPaper('a4','portrait');
        return $pdf->download('Equipos.pdf');
    }
}
?>