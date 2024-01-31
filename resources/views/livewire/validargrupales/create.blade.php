<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Validargrupale</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
                <div class="form-group">
                    <label for="id_inscripcion__equs">Inscripcion Equipo</label>
                    <select wire:model="id_inscripcion__equs" class="form-control" id="id_inscripcion__equs">
                        <option value="">Seleccione</option>
                        @foreach($equiposInscritos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre_equ }}</option>
                        @endforeach
                    </select>
                    @error('id_inscripcion__equs')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                



            <div class="form-group">
                <label for="validarpago">VALIDAR PAGO</label>
                <input wire:model="validarpago" type="text" class="form-control" id="validarpago" placeholder="Validarpago">@error('validarpago') <span class="error text-danger">{{ $message }}</span> @enderror
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
