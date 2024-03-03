<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InscripcionInd;
use App\Models\Juego;
use App\Models\Individuale;

class InscripcionInds extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_ind, $id_jue, $precio_ins, $pago_ins;
    public $updateMode = false;
    public $new_pago_ins;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        $juegos = Juego::all();
        $individuales = Individuale::all();

        return view('livewire.inscripcion-inds.view', [
            'inscripcionInds' => InscripcionInd::with('juegos')->with('individuales')
                ->whereHas('individuales', fn ($query) => $query->where('nombre_ind', 'LIKE', $keyWord))
                ->whereHas('juegos', fn ($query) => $query->where('nombre_jue', 'LIKE', $keyWord))
                ->orWhere('precio_ins', 'LIKE', $keyWord)
                ->orWhere('pago_ins', 'LIKE', $keyWord)
                ->get(),
        ], compact('juegos', 'individuales'));
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
        $this->id_ind = null;
        $this->id_jue = null;
        $this->precio_ins = null;
        $this->pago_ins = null;
        $this->new_pago_ins = null;
    }

    public function store()
    {
        $this->validate([
            'id_ind' => 'required',
            'id_jue' => 'required',
            'precio_ins' => 'required',
            'pago_ins' => 'image|max:1024', // Ajusta el tamaño máximo según tus necesidades
        ]);

        // Maneja la carga del archivo
        if ($this->pago_ins) {
            $path = $this->pago_ins->store('public/pagos');
            $filename = basename($path); // Obtiene solo el nombre del archivo
        }

        InscripcionInd::create([
            'id_ind' => $this->id_ind,
            'id_jue' => $this->id_jue,
            'precio_ins' => $this->precio_ins,
            'pago_ins' => isset($filename) ? $filename : null, // Asigna el nombre del archivo solo si se cargó un archivo
        ]);

        $this->resetInput();
        $this->emit('closeModal');
        session()->flash('message', 'InscripcionInd Successfully created.');
    }



    public function edit($id)
    {
        $record = InscripcionInd::findOrFail($id);

        $this->selected_id = $id;
        $this->id_ind = $record->id_ind;
        $this->id_jue = $record->id_jue;
        $this->precio_ins = $record->precio_ins;
        $this->pago_ins = $record->pago_ins;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'id_ind' => 'required',
            'id_jue' => 'required',
            'precio_ins' => 'required',
        ]);

        if ($this->selected_id) {
            $record = InscripcionInd::find($this->selected_id);

            $record->update([
                'id_ind' => $this->id_jug,
                'id_jue' => $this->id_jue,
                'precio_ins' => $this->precio_ins,
            ]);

            // Maneja la nueva imagen
            if ($this->new_pago_ins) {
                $path = $this->new_pago_ins->store('public/pagos');
                $filename = basename($path); // Obtiene solo el nombre del archivo
                $record->pago_ins = $filename; // Asigna el nuevo nombre de archivo
                $record->save();
            }

            $this->resetInput();
            $this->updateMode = false;
            session()->flash('message', 'InscripcionInd Successfully updated.');
        }
    }
    

    public function destroy($id)
    {
        if ($id) {
            $record = InscripcionInd::where('id', $id);
            $record->delete();
        }
    }

    public $selectedInscripcion = null;

    public function show($id)
    {
        $this->selectedInscripcion = InscripcionInd::find($id);
        $this->dispatchBrowserEvent('show-modal', 'viewModal');
    }
    
}
