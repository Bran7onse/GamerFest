<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Partida en Equipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <label for="id_equ1"></label>
                        <select wire:model="id_equ1" type="text" class="form-control" id="id_equ1"
                            placeholder="Equipo 1">@error('id_equ1') <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <option>Seleccione</option>
                            @foreach($inscritos as $inscrito)
                            <option value="{{$inscrito->equipos->id}}">{{$inscrito->equipos->nombre_equ}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_equ2"></label>
                        <select wire:model="id_equ2" type="text" class="form-control" id="id_equ2"
                            placeholder="Equipo 2">@error('id_equ2') <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <option>Seleccione</option>
                            @foreach($inscritos as $inscrito)
                            <option value="{{$inscrito->equipos->id}}">{{$inscrito->equipos->nombre_equ}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ganador_par_equ"></label>
                        <select wire:model="ganador_par_equ" type="text" class="form-control" id="ganador_par_equ"
                            placeholder="Ganador">@error('ganador_par_equ') <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <option>Seleccione</option>
                            @foreach($inscritos as $inscrito)
                            <option value="{{$inscrito->equipos->id}}">{{$inscrito->equipos->nombre_equ}}</option>
                            @endforeach
                        </select>
                    </div>
            <div class="form-group">
                <label for="fecha_par_equ"></label>
                <input wire:model="fecha_par_equ" type="text" class="form-control" id="fecha_par_equ" placeholder="Fecha Par Equ">@error('fecha_par_equ') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="observacion_par_equ"></label>
                <input wire:model="observacion_par_equ" type="text" class="form-control" id="observacion_par_equ" placeholder="Observacion Par Equ">@error('observacion_par_equ') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>

                </form>
            </div>
            
       </div>
    </div>
</div>
