<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InscripcionEqu;
use App\Models\Juego;
use App\Models\Equipo;

class InscripcionEqus extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_equ, $id_jue, $precio_ins_equ, $pago_ins_equ;
    public $updateMode = false;

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        $juegos = Juego::all();
        $equipos = Equipo::all();
        return view('livewire.inscripcion-equs.view', [
            'inscripcionEqus' => InscripcionEqu::with('juegos')->with('equipos')
                ->whereHas(
                    'equipos',
                    fn ($query) =>
                    $query->where('nombre_equ', 'LIKE', $keyWord)
                )
                ->whereHas(
                    'juegos',
                    fn ($query) =>
                    $query->where('nombre_jue', 'LIKE', $keyWord)
                )
                ->orWhere('precio_ins_equ', 'LIKE', $keyWord)
                ->orWhere('pago_ins_equ', 'LIKE', $keyWord)
                ->get(),
        ], compact('juegos', 'equipos'));
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
        $this->id_equ = null;
        $this->id_jue = null;
        $this->precio_ins_equ = null;
        $this->pago_ins_equ = null;
    }
    public function store()
    {
        $this->validate([
            'id_equ' => 'required',
            'id_jue' => 'required',
            'precio_ins_equ' => 'required|numeric',
          
        ]);

        InscripcionEqu::create([
            'id_equ' => $this->id_equ,
            'id_jue' => $this->id_jue,
            'precio_ins_equ' => $this->precio_ins_equ,
            
        ]);

        $this->resetInput();
        $this->emit('closeModal');
        session()->flash('message', 'InscripcionEqu Successfully created.');
    }

    public function edit($id)
    {
        $record = InscripcionEqu::findOrFail($id);

        $this->selected_id = $id;
        $this->id_equ = $record->id_equ;
        $this->id_jue = $record->id_jue;
        $this->precio_ins_equ = $record->precio_ins_equ;
        $this->pago_ins_equ = $record->pago_ins_equ;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'id_equ' => 'required',
            'id_jue' => 'required',
            'precio_ins_equ' => 'required|numeric',

        ]);

        if ($this->selected_id) {
            $record = InscripcionEqu::find($this->selected_id);
            $record->update([
                'id_equ' => $this->id_equ,
                'id_jue' => $this->id_jue,
                'precio_ins_equ' => $this->precio_ins_equ,
            ]);

            $this->resetInput();
            $this->updateMode = false;
            session()->flash('message', 'InscripcionEqu Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = InscripcionEqu::where('id', $id);
            $record->delete();
        }
    }
}
