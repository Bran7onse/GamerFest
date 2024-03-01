<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Juego;
use App\Models\Aula;
use App\Models\Categoria;
use Livewire\WithFileUploads; 
use Illuminate\Http\Request; // Agrega esta línea aquí
use Illuminate\Support\Facades\Storage;


class Juegos extends Component
{
    use WithPagination;
    use WithFileUploads;


	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_aul, $id_cat, $nombre_jue, $compania_jue, $precio_jue, $descripcion_jue;
    public $updateMode = false;
    protected $fillable = ['id_aul', 'id_cat', 'nombre_jue', 'compania_jue', 'precio_jue', 'descripcion_jue', 'image_path'];
    public $image; // Propiedad para la imagen
    public $newImage; // Propiedad para almacenar la nueva imagen subida por el usuario


    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        $aulas = Aula::all();
        $categorias = Categoria::all();
        return view('livewire.juegos.view', [
            'juegos' => Juego::with('categorias', 'aulas')
                ->whereHas('aulas', fn($query) =>
                $query->where('codigo_aul', 'LIKE', $keyWord)
                )
                ->whereHas('categorias', fn($query) =>
                $query->where('tipo_cat', 'LIKE', $keyWord)
                )
                ->orWhere('nombre_jue', 'LIKE', $keyWord)
                ->orWhere('compania_jue', 'LIKE', $keyWord)
                ->orWhere('precio_jue', 'LIKE', $keyWord)
                ->orWhere('descripcion_jue', 'LIKE', $keyWord)
                ->get(),
        ], compact('aulas', 'categorias'));
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->id_aul = null;
		$this->id_cat = null;
		$this->nombre_jue = null;
		$this->compania_jue = null;
		$this->precio_jue = null;
		$this->descripcion_jue = null;
        $this->image = null;
    }

    public function store()
    {
        $this->validate([
            'id_aul' => 'required',
            'id_cat' => 'required',
            'nombre_jue' => 'required',
            'compania_jue' => 'required',
            'precio_jue' => 'required',
            'descripcion_jue' => 'required',
            'image' => 'image|max:1024', // Valida que sea una imagen y no exceda de 1MB
        ]);
    
        // Asegúrate de que $this->id_aul tenga un valor antes de intentar guardar.
        if (!isset($this->id_aul)) {
            // Maneja el error como prefieras, por ejemplo, estableciendo un mensaje de error.
            session()->flash('error', 'El campo Aula es obligatorio.');
            return;
        }

        $imageName = null;
        if ($this->image) {
            $imageName = $this->image->store('imagenes', 'public'); // Guarda la imagen en storage/app/public/imagenes
            $imageName = str_replace('public/', '', $imageName); 
        }
        
    
        //dd($this->image);
    
        Juego::create([
            'id_aul' => $this->id_aul,
            'id_cat' => $this->id_cat,
            'nombre_jue' => $this->nombre_jue,
            'compania_jue' => $this->compania_jue,
            'precio_jue' => $this->precio_jue,
            'descripcion_jue' => $this->descripcion_jue,
            'image_path' => $imageName,
        ]);
    
        $this->resetInput();
        $this->emit('juegoStored');
        session()->flash('message', 'Juego creado con éxito.');
    }    

    public function edit($id)
    {
        $record = Juego::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_aul = $record-> id_aul;
		$this->id_cat = $record-> id_cat;
		$this->nombre_jue = $record-> nombre_jue;
		$this->compania_jue = $record-> compania_jue;
		$this->precio_jue = $record-> precio_jue;
		$this->descripcion_jue = $record-> descripcion_jue;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'id_aul' => 'required',
            'id_cat' => 'required',
            'nombre_jue' => 'required',
            'compania_jue' => 'required',
            'precio_jue' => 'required',
            'descripcion_jue' => 'required',
            'newImage' => 'image|max:1024', // Solo validar newImage para la actualización de la imagen
        ]);
    
        if ($this->selected_id) {
            $record = Juego::find($this->selected_id);
            $imagePath = $record->image_path; // Ruta de la imagen actual
    
            if ($this->newImage) {
                // Opcional: Borrar la imagen antigua del almacenamiento
                if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                }
    
                // Almacenar la nueva imagen y actualizar la ruta
                $imageName = $this->newImage->store('juegos', 'public');
                $imagePath = $imageName; // Asegúrate de que este sea el campo correcto en tu base de datos
            }
    
            $record->update([
                'id_aul' => $this->id_aul,
                'id_cat' => $this->id_cat,
                'nombre_jue' => $this->nombre_jue,
                'compania_jue' => $this->compania_jue,
                'precio_jue' => $this->precio_jue,
                'descripcion_jue' => $this->descripcion_jue,
                'image_path' => $imagePath,
            ]);
    
            $this->resetInput();
            $this->updateMode = false;
            session()->flash('message', 'Juego actualizado con éxito.');
        }
    }    

    public function destroy($id)
    {
        if ($id) {
            $record = Juego::where('id', $id);
            $record->delete();
        }
    }
}
