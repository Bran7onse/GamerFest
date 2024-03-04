@section('title', __('Crear Partidas'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div class="float-left .col-auto .me-auto">
                            <h4>
                                Juegos </h4>
                        </div>

                        <select wire:model="nombre_jue" type="text" class="form-control .col-auto .me-auto"
                            id="nombre_jue" placeholder="Juego">@error('nombre_jue') <span
                                class="error text-danger">{{ $message }}</span>
                            @enderror
                            <option>Ninguno</option>
                            @foreach($juegos as $juego)
                            <option value="{{$juego->nombre_jue}}">{{$juego->nombre_jue}}</option>
                            @endforeach
                        </select>


                        <div wire:model="nombre_jue" class="dropdown show .col-auto .me-auto">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acciones
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item"
                                    href="{{route('viewCrearPartida-pdf',['nombre_jue' => $nombre_jue])}}">
                                    <i class="fa fa-eye"></i> Ver PDF
                                </a>
                                <a class="dropdown-item"
                                    href="{{route('downloadCrearPartida-pdf',['nombre_jue' => $nombre_jue])}}">
                                    <i class="fa fa-save"></i> Descargar PDF
                                </a>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="card-body">
                    @if($crearPartida)
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <th colspan="6" class="text-center">Partidos</th>
                                </tr>

                                <tr>
                                    <td>#</td>
                                    <th>Participantes </th>
                                    <th>Juego </th>
                                    <th>Categoria </th>
                                    <th>Num Max Equ/Jugadores </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($crearPartida as $row)
                                <tr>
                                    @if($row->participantes)
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->participantes }}</td>
                                    <td>{{ $row->nombre_jue }}</td>
                                    <td>{{ $row->tipo_cat }}</td>
                                    <td>{{ $row->num_jug }}</td>
                                    @endif
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>