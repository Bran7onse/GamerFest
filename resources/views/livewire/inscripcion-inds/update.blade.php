<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Inscripcion Ind</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                <label for="id_jug"></label>
                <select wire:model="id_jug" type="text" class="form-control" id="id_jug"
                            placeholder="Jugador">@error('id_jug') <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <option>Seleccione</option>
                            @foreach($jugadores as $jugador)
                            <option value="{{$jugador->id}}">{{$jugador->nombre_jug}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_jue"></label>
                        <select wire:model="id_jue" type="text" class="form-control" id="id_jue"
                            placeholder="Juego">@error('id_jue') <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <option>Seleccione</option>
                            @foreach($juegos as $juego)
                            <option value="{{$juego->id}}">{{$juego->nombre_jue}}</option>
                            @endforeach
                        </select>
                    </div>
            <div class="form-group">
                <label for="precio_ins"></label>
                <input wire:model="precio_ins" type="text" class="form-control" id="precio_ins" placeholder="Precio Ins">@error('precio_ins') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="pago_ins"></label>
                <input wire:model="pago_ins" type="text" class="form-control" id="pago_ins" placeholder="Pago Ins">@error('pago_ins') <span class="error text-danger">{{ $message }}</span> @enderror
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