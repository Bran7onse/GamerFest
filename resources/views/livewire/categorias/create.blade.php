<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="tipo_cat">TIPO CATEGORIA</label>
                <input wire:model="tipo_cat" type="text" class="form-control" id="tipo_cat" placeholder="Tipo Categoria">@error('tipo_cat') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="num_jug_cat">NUMERO DE JUGADORES</label>
                <input wire:model="num_jug_cat" type="text" class="form-control" id="num_jug_cat" placeholder="Numero Jugador Categoria">@error('num_jug_cat') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="descripcion_cat">DESCRIPCION</label>
                <input wire:model="descripcion_cat" type="text" class="form-control" id="descripcion_cat" placeholder="Descripcion Categoria">@error('descripcion_cat') <span class="error text-danger">{{ $message }}</span> @enderror
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
