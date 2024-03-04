<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Inscripcion Individual</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
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
                        <label for="precio_ins"></label>
                        <input wire:model="precio_ins" type="text" class="form-control" id="precio_ins"
                            placeholder="Precio Ins">@error('precio_ins') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="pago_ins">Pago Ins</label>
                        <input wire:model="pago_ins" type="file" class="form-control" id="pago_ins" accept=".png, .jpg, .jpeg" onchange="previewImage(this)">
                        @error('pago_ins') <span class="error text-danger">{{ $message }}</span> @enderror

                        <!-- Vista previa de la imagen -->
                        <div>
                            @if($pago_ins instanceof \Livewire\TemporaryUploadedFile)
                                <img src="{{ $pago_ins->temporaryUrl() }}" alt="Preview" style="max-width: 100%; height: auto;">
                            @endif
                        </div>
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
