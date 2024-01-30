<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Categoria;
use PDF;
class Categorias extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo_cat, $num_jug_cat, $descripcion_cat;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.categorias.view', [
            'categorias' => Categoria::latest()
						->orWhere('tipo_cat', 'LIKE', $keyWord)
						->orWhere('num_jug_cat', 'LIKE', $keyWord)
						->orWhere('descripcion_cat', 'LIKE', $keyWord)
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
		$this->tipo_cat = null;
		$this->num_jug_cat = null;
		$this->descripcion_cat = null;
    }

    public function store()
{
    $this->validate([
        'tipo_cat' => 'required',
        'num_jug_cat' => 'required|integer',
        'descripcion_cat' => 'required',
    ]);

    Categoria::create([ 
        'tipo_cat' => $this-> tipo_cat,
        'num_jug_cat' => $this-> num_jug_cat,
        'descripcion_cat' => $this-> descripcion_cat
    ]);
    
    $this->resetInput();
    $this->emit('closeModal');
    session()->flash('message', 'Categoria Successfully created.');
}

    public function edit($id)
    {
        $record = Categoria::findOrFail($id);

        $this->selected_id = $id; 
		$this->tipo_cat = $record-> tipo_cat;
		$this->num_jug_cat = $record-> num_jug_cat;
		$this->descripcion_cat = $record-> descripcion_cat;
		
        $this->updateMode = true;
    }

    public function update()
{
    $this->validate([
        'tipo_cat' => 'required',
        'num_jug_cat' => 'required|integer',
        'descripcion_cat' => 'required',
    ]);

    if ($this->selected_id) {
        $record = Categoria::find($this->selected_id);
        $record->update([ 
            'tipo_cat' => $this-> tipo_cat,
            'num_jug_cat' => $this-> num_jug_cat,
            'descripcion_cat' => $this-> descripcion_cat
        ]);

        $this->resetInput();
        $this->updateMode = false;
        session()->flash('message', 'Categoria Successfully updated.');
    }
}

    public function destroy($id)
    {
        if ($id) {
            $record = Categoria::where('id', $id);
            $record->delete();
        }
    }
    public function viewPDF()
    {
        $categorias = Categoria::all();
        $pdf = PDF::loadView('livewire.categorias.categoriasCatalogo', array('categorias'=> $categorias))->setPaper('a4','portrait');
        return $pdf->stream();
    }
    
    public function downloadPDF()
    {
        $categorias = Categoria::all();
        $pdf = PDF::loadView('livewire.categorias.categoriasCatalogo', array('categorias'=> $categorias))->setPaper('a4','portrait');
        return $pdf->download('Categorias.pdf');
    }
}
