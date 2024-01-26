<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\InscripcionEqu;
use App\Models\Juego;
use App\Models\Equipo;
use Illuminate\Support\Facades\Storage;

class InscripcionEqus extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_equ, $id_jue, $precio_ins_equ, $pago_ins_equ;
    public $updateMode = false;
    public $newPagoInsEqu; // Variable para la nueva imagen

    public function render()
    {
        $keyWord = '%'.$this->keyWord .'%';
        $juegos = Juego::all();
        $equipos = Equipo::all();
        return view('livewire.inscripcion-equs.view', [
            'inscripcionEqus' => InscripcionEqu::with('juegos', 'equipos')
                ->whereHas('equipos', fn ($query) => 
                    $query->where('nombre_equ', 'LIKE', $keyWord))
                ->whereHas('juegos', fn ($query) => 
                    $query->where('nombre_jue', 'LIKE', $keyWord))
                ->orWhere('precio_ins_equ', 'LIKE', $keyWord)
                ->orWhere('pago_ins_equ', 'LIKE', $keyWord)
                ->paginate(10),
        ],compact('juegos','equipos'));
    }

    private function resetInput()
    {       
        $this->id_equ = null;
        $this->id_jue = null;
        $this->precio_ins_equ = null;
        $this->pago_ins_equ = null;
        $this->newPagoInsEqu = null;
    }

    public function store()
    {
        $this->validate([
            'id_equ' => 'required',
            'id_jue' => 'required',
            'precio_ins_equ' => 'required',
            'pago_ins_equ' => 'image|max:1024', // Validación de la imagen
        ]);

        $path = $this->pago_ins_equ->store('public/pagos'); // Almacena la imagen

        InscripcionEqu::create([ 
            'id_equ' => $this->id_equ,
            'id_jue' => $this->id_jue,
            'precio_ins_equ' => $this->precio_ins_equ,
            'pago_ins_equ' => $path, // Guarda la ruta de la imagen
        ]);

        $this->resetInput();
        $this->emit('closeModal');
        session()->flash('message', 'Inscripción creada correctamente.');
    }

    public function edit($id)
    {
        $record = InscripcionEqu::findOrFail($id);
    
        $this->selected_id = $id; 
        $this->id_equ = $record->id_equ;
        $this->id_jue = $record->id_jue;
        $this->precio_ins_equ = $record->precio_ins_equ;
        $this->pago_ins_equ = $record->pago_ins_equ; // Ruta de la imagen almacenada
        $this->newPagoInsEqu = null; // Resetear nueva imagen
    
        $this->updateMode = true;
    }       
    
    public function getStoredImageUrl()
    {
        if ($this->pago_ins_equ && Storage::disk('public')->exists($this->pago_ins_equ)) {
            return Storage::url($this->pago_ins_equ);
        }
    
        return null;
    }
    
    public function update()
    {
        $this->validate([
            'id_equ' => 'required',
            'id_jue' => 'required',
            'precio_ins_equ' => 'required',
            'newPagoInsEqu' => 'nullable|image|max:1024', // Validación para la nueva imagen
        ]);
    
        if ($this->selected_id) {
            $record = InscripcionEqu::find($this->selected_id);
    
            $data = [
                'id_equ' => $this->id_equ,
                'id_jue' => $this->id_jue,
                'precio_ins_equ' => $this->precio_ins_equ,
            ];
    
            if ($this->newPagoInsEqu) {
                // Eliminar la imagen antigua si existe
                if ($record->pago_ins_equ && Storage::disk('public')->exists($record->pago_ins_equ)) {
                    Storage::disk('public')->delete($record->pago_ins_equ);
                }
    
                $path = $this->newPagoInsEqu->store('public/pagos');
                $data['pago_ins_equ'] = $path;
            } else {
                // Mantener la imagen actual si no hay una nueva
                $data['pago_ins_equ'] = $record->pago_ins_equ;
            }
    
            $record->update($data);
    
            $this->resetInput();
            $this->updateMode = false;
            session()->flash('message', 'Inscripción actualizada correctamente.');
        }
    }
    
    public function destroy($id)
    {
        if ($id) {
            $record = InscripcionEqu::findOrFail($id);
            if ($record->pago_ins_equ && Storage::disk('public')->exists($record->pago_ins_equ)) {
                Storage::disk('public')->delete($record->pago_ins_equ);
            }
            $record->delete();

            session()->flash('message', 'Inscripción eliminada correctamente.');
        }
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    public function updatedNewPagoInsEqu()
    {
        $this->validate([
            'newPagoInsEqu' => 'image|max:1024', // Validación para la imagen
        ]);
    }

    public function getTemporaryImageUrl()
    {
        if ($this->newPagoInsEqu instanceof \Livewire\TemporaryUploadedFile) {
            return $this->newPagoInsEqu->temporaryUrl();
        }
    
        return null;
    }

    public $selectedInscripcionEquipo;

    public function showEquipo($id)
    {
        $this->selectedInscripcionEquipo = InscripcionEqu::find($id);
        $this->dispatchBrowserEvent('show-modal', ['id' => 'viewModalEquipo']);
    }

}
