<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Partida Individual</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="id_jug1"></label>
                        <select wire:model="id_jug1" type="text" class="form-control" id="id_jug1"
                            placeholder="Jugador 1">@error('id_jug1') <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <option>Seleccione</option>
                            @foreach($inscritos as $inscrito)
                            <option value="{{$inscrito->jugadors->id}}">{{$inscrito->individuales->nombre_ind}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_jug2"></label>
                        <select wire:model="id_jug2" type="text" class="form-control" id="id_jug2"
                            placeholder="Jugador 2">@error('id_jug2') <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <option>Seleccione</option>
                            @foreach($inscritos as $inscrito)
                            <option value="{{$inscrito->jugadors->id}}">{{$inscrito->individuales->nombre_ind}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ganador_par_ind"></label>
                        <select wire:model="ganador_par_ind" type="text" class="form-control" id="ganador_par_ind"
                            placeholder="Ganador">@error('ganador_par_ind') <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <option>Seleccione</option>
                            @foreach($inscritos as $inscrito)
                            <option value="{{$inscrito->individuales->id}}">{{$inscrito->individuales->nombre_ind}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha_par_ind"></label>
                        <input wire:model="fecha_par_ind" type="datetime-local" class="form-control" id="fecha_par_ind"
                            placeholder="Fecha de la partida">@error('fecha_par_ind') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="observacion_par_ind"></label>
                        <input wire:model="observacion_par_ind" type="text" class="form-control"
                            id="observacion_par_ind"
                            placeholder="Observacion de la partida">@error('observacion_par_ind')
                        <span class="error text-danger">{{ $message }}</span> @enderror
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