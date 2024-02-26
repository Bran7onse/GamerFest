<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Individuale</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="nombre_ind">NOMBRE</label>
                <input wire:model="nombre_ind" type="text" class="form-control" id="nombre_ind" placeholder="Nombre ">@error('nombre_ind') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="cedula_ind">CEDULA</label>
                <input wire:model="cedula_ind" type="text" class="form-control" id="cedula_ind" placeholder="Cedula ">@error('cedula_ind') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="telefono_ind">TELEFONO</label>
                <input wire:model="telefono_ind" type="text" class="form-control" id="telefono_ind" placeholder="Telefono ">@error('telefono_ind') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="correo_ind">CORREO</label>
                <input wire:model="correo_ind" type="text" class="form-control" id="correo_ind" placeholder="Correo ">@error('correo_ind') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="descripcion_ind">DESCRIPCION</label>
                <input wire:model="descripcion_ind" type="text" class="form-control" id="descripcion_ind" placeholder="Descripcion">@error('descripcion_ind') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Subir</button>
            </div>
        </div>
    </div>
</div>
