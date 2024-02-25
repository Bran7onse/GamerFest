<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Inscripcion de Equipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
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
                    <div class="form-group">
                        <label for="pago_ins_equ">Pago Ins Equ</label>
                        <input wire:model="pago_ins_equ" type="file" class="form-control" id="pago_ins_equ" accept=".png, .jpg, .jpeg">
                        @error('pago_ins_equ') <span class="error text-danger">{{ $message }}</span> @enderror

                        <!-- Vista previa de la imagen -->
                        @if($pago_ins_equ instanceof \Livewire\TemporaryUploadedFile)
                            <img src="{{ $pago_ins_equ->temporaryUrl() }}" alt="Preview" style="max-width: 100%; height: auto;">
                        @endif
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