<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Juego</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="store" enctype="multipart/form-data">
                    <div class="form-group">


                        <label for="id_aul">SELECCIONE EL AULA</label>


                        <select wire:model="id_aul" type="text" class="form-control" id="id_aul"
                            placeholder="Id Aul">@error('id_aul') <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <option>Seleccione</option>
                            @foreach($aulas as $aula)
                            <option value="{{$aula->id}}">{{$aula->codigo_aul}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_cat">SELEECIONE ID CATEGORIA</label>
                        <select wire:model="id_cat" type="text" class="form-control" id="id_cat"
                            placeholder="Id Categoria">@error('id_cat') <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <option>Seleccione</option>
                            @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->tipo_cat}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nombre_jue">NOMBRE DEL JUEGO</label>
                        <input wire:model="nombre_jue" type="text" class="form-control" id="nombre_jue"
                            placeholder="Nombre Juego">@error('nombre_jue') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="compania_jue">COMPANIA DEL JUEGO</label>
                        <input wire:model="compania_jue" type="text" class="form-control" id="compania_jue"
                            placeholder="Compania Juego">@error('compania_jue') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="precio_jue">PRECIO DEL JUEGO</label>
                        <input wire:model="precio_jue" type="text" class="form-control" id="precio_jue"
                            placeholder="Precio Juego">@error('precio_jue') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion_jue">DESCRIPCION</label>
                        <input wire:model="descripcion_jue" type="text" class="form-control" id="descripcion_jue"
                            placeholder="Descripcion Juego">@error('descripcion_jue') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Imagen del Juego</label>
                        <input wire:model="image" type="file" class="form-control" id="image" placeholder="Cargar imagen">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
