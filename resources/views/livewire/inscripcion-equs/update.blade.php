<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Inscripcion de Equipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="id_equ"></label>
                        <select wire:model="id_equ" type="text" class="form-control" id="id_equ"
                            placeholder="Equipo">@error('id_equ') <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <option>Seleccione</option>
                            @foreach($equipos as $equipo)
                            <option value="{{$equipo->id}}">{{$equipo->nombre_equ}}</option>
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
                        <label for="precio_ins_equ"></label>
                        <input wire:model="precio_ins_equ" type="text" class="form-control" id="precio_ins_equ"
                            placeholder="Precio Ins Equ">@error('precio_ins_equ') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    
                    <!-- Vista previa de la imagen cargada -->
                    <div class="form-group">
                        <label for="newPagoInsEqu">Nueva Imagen de Pago</label>
                        <input wire:model="newPagoInsEqu" type="file" class="form-control" id="newPagoInsEqu" accept=".png, .jpg, .jpeg">
                        @error('newPagoInsEqu') <span class="error text-danger">{{ $message }}</span> @enderror

                        <!-- Vista previa de la imagen temporal o almacenada -->
                        @if($this->newPagoInsEqu instanceof \Livewire\TemporaryUploadedFile)
                            <!-- Mostrar la imagen temporal -->
                            <img src="{{ $this->newPagoInsEqu->temporaryUrl() }}" style="max-width: 100px; height: auto;">
                        @elseif($this->getStoredImageUrl())
                            <!-- Mostrar la imagen almacenada -->
                            <img src="{{ $this->getStoredImageUrl() }}" style="max-width: 100px; height: auto;">
                        @endif
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