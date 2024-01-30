<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Individuale</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="nombre_ind"></label>
                <input wire:model="nombre_ind" type="text" class="form-control" id="nombre_ind" placeholder="Nombre Ind">@error('nombre_ind') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="cedula_ind"></label>
                <input wire:model="cedula_ind" type="text" class="form-control" id="cedula_ind" placeholder="Cedula Ind">@error('cedula_ind') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="telefono_ind"></label>
                <input wire:model="telefono_ind" type="text" class="form-control" id="telefono_ind" placeholder="Telefono Ind">@error('telefono_ind') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="correo_ind"></label>
                <input wire:model="correo_ind" type="text" class="form-control" id="correo_ind" placeholder="Correo Ind">@error('correo_ind') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="descripcion_ind"></label>
                <input wire:model="descripcion_ind" type="text" class="form-control" id="descripcion_ind" placeholder="Descripcion Ind">@error('descripcion_ind') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>
