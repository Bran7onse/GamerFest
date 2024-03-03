<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Inscripcion Individual</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                <label for="id_ind"></label>
                <select wire:model="id_ind" type="text" class="form-control" id="id_ind"
                            placeholder="Jugador">@error('id_ind') <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <option>Seleccione</option>
                            @foreach($individuales as $individual)
                            <option value="{{$individual->id}}">{{$individual->nombre_ind}}</option>
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
                        <label for="new_pago_ins">Nueva Imagen de Pago</label>
                        <input wire:model="new_pago_ins" type="file" class="form-control" id="new_pago_ins" accept=".png, .jpg, .jpeg">
                        @error('new_pago_ins') <span class="error text-danger">{{ $message }}</span> @enderror

                        <!-- Vista previa de la nueva imagen o la imagen actual -->
                        <div>
                            @if($new_pago_ins)
                                <img src="{{ $new_pago_ins->temporaryUrl() }}" alt="Preview" style="max-width: 100%; height: auto;">
                            @elseif($pago_ins)
                                <img src="{{ asset('storage/pagos/' . $pago_ins) }}" alt="Pago Ins" style="max-width: 100px; height: auto;">
                            @endif
                        </div>
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
