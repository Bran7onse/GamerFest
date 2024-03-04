@section('title', __('Jugadores-Inscritos'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div class="float-left .col-auto .me-auto">
                            <h4>
                                Jugadores Inscritos </h4>
                        </div>

                        <select wire:model="nombre_jue" type="text" class="form-control .col-auto .me-auto"
                            id="nombre_jue" placeholder="Equipo">@error('nombre_jue') <span
                                class="error text-danger">{{ $message }}</span>
                            @enderror
                            <option value="">Todos</option>
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
                                <a class="dropdown-item" href="{{route('viewJugadorIns-pdf')}}">
                                    <i class="fa fa-eye"></i> Ver PDF
                                </a>
                                <a class="dropdown-item" href="{{route('downloadJugadorIns-pdf')}}">
                                    <i class="fa fa-save"></i> Descargar PDF
                                </a>
                                <a class="dropdown-item" href="{{route('excelJugadorIns')}}">
                                    <i class="fa fa-save"></i> Excel
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <th colspan="8" class="text-center">Jugadores Inscritos</th>
                                </tr>
                                <tr>
                                    <td>#</td>
                                    <th>Nombre </th>
                                    <th>Cedula </th>
                                    <th>Telefono </th>
                                    <th>Correo </th>
                                    <th>Descripcion </th>
                                    <th>Juego </th>
                                    <th>Precio </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jugadorsIns as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->individuales->nombre_ind }}</td>
                                    <td>{{ $row->individuales->cedula_ind }}</td>
                                    <td>{{ $row->individuales->telefono_ind }}</td>
                                    <td>{{ $row->individuales->correo_ind }}</td>
                                    <td>{{ $row->individuales->descripcion_ind }}</td>
                                    <td>{{ $row->juegos->nombre_jue }}</td>
                                    <td>{{ $row->precio_ins }}</td>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>