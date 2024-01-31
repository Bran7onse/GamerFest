<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Aula;
use PDF;

class Aulas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $codigo_aul, $edificio_aul, $observacion_aul;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.aulas.view', [
            'aulas' => Aula::latest()
						->orWhere('codigo_aul', 'LIKE', $keyWord)
						->orWhere('edificio_aul', 'LIKE', $keyWord)
						->orWhere('observacion_aul', 'LIKE', $keyWord)
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
		$this->codigo_aul = null;
		$this->edificio_aul = null;
		$this->observacion_aul = null;
    }

    public function store()
{
    $this->validate([
        'codigo_aul' => 'required',
        'edificio_aul' => 'required',
        'observacion_aul' => 'required',
    ]);

    Aula::create([ 
        'codigo_aul' => $this-> codigo_aul,
        'edificio_aul' => $this-> edificio_aul,
        'observacion_aul' => $this-> observacion_aul
    ]);
    
    $this->resetInput();
    $this->emit('closeModal');
    session()->flash('message', 'Aula Successfully created.');
}

    public function edit($id)
    {
        $record = Aula::findOrFail($id);

        $this->selected_id = $id; 
		$this->codigo_aul = $record-> codigo_aul;
		$this->edificio_aul = $record-> edificio_aul;
		$this->observacion_aul = $record-> observacion_aul;
		
        $this->updateMode = true;
    }

    public function update()
    {
        if ($this->selected_id) {
            $this->validate([
                'codigo_aul' => 'required',
                'edificio_aul' => 'required',
                'observacion_aul' => 'required',
            ]);
    
            $record = Aula::find($this->selected_id);
            $record->update([ 
            'codigo_aul' => $this-> codigo_aul,
            'edificio_aul' => $this-> edificio_aul,
            'observacion_aul' => $this-> observacion_aul
            ]);
    
            $this->resetInput();
            $this->updateMode = false;
            session()->flash('message', 'Aula Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Aula::where('id', $id);
            $record->delete();
        }
    }

    public function viewPDF()
    {
        $aulas = Aula::all();
        $pdf = PDF::loadView('livewire.aulas.aulasCatalogo', array('aulas'=> $aulas))->setPaper('a4','portrait');
        return $pdf->stream();
    }
    
    public function downloadPDF()
    {
        $aulas = Aula::all();
        $pdf = PDF::loadView('livewire.aulas.aulasCatalogo', array('aulas'=> $aulas))->setPaper('a4','portrait');
        return $pdf->download('Aulas.pdf');
    }
    

}
