<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Juego</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    <div class="form-group">


                        <label for="id_aul"></label>


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
                        <label for="id_cat"></label>
                        <select wire:model="id_cat" type="text" class="form-control" id="id_cat"
                            placeholder="Id Cat">@error('id_cat') <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <option>Seleccione</option>
                            @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->tipo_cat}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nombre_jue"></label>
                        <input wire:model="nombre_jue" type="text" class="form-control" id="nombre_jue"
                            placeholder="Nombre Jue">@error('nombre_jue') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input wire:model="imagen" type="file" class="form-control"
                                    id="imagen">
                                @error('imagen')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                                <div class="w-100 m-2 text-center" wire:loading wire:target="imagen">
                                    <button class="btn btn-outline-dark" disabled>
                                        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                        <span role="status">Cargando...</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="precio_jue"></label>
                        <input wire:model="precio_jue" type="text" class="form-control" id="precio_jue"
                            placeholder="Precio Jue">@error('precio_jue') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion_jue"></label>
                        <input wire:model="descripcion_jue" type="text" class="form-control" id="descripcion_jue"
                            placeholder="Descripcion Jue">@error('descripcion_jue') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary"
                    data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>
