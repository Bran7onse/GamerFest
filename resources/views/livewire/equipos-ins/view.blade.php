@section('title', __('Equipos-Inscritos'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div class="float-left .col-auto .me-auto">
                            <h4>
                                Equipos Inscritos </h4>
                        </div>
                        
                            <select wire:model="nombre_equ" type="text" class="form-control .col-auto .me-auto" id="nombre_equ"
                                placeholder="Equipo">@error('nombre_equ') <span
                                    class="error text-danger">{{ $message }}</span>
                                @enderror
                                <option>Ninguno</option>
                                @foreach($equipos as $equipo)
                                <option value="{{$equipo->nombre_equ}}">{{$equipo->nombre_equ}}</option>
                                @endforeach
                            </select>

                        
                        <div wire:model="nombre_equ" class="dropdown show .col-auto .me-auto">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acciones
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item"
                                    href="{{route('viewEquiposIns-pdf',['nombre_equ' => $nombre_equ])}}">
                                    <i class="fa fa-eye"></i> Ver PDF
                                </a>
                                <a class="dropdown-item"
                                    href="{{route('downloadEquiposIns-pdf',['nombre_equ' => $nombre_equ])}}">
                                    <i class="fa fa-save"></i> Descargar PDF
                                </a>
                                <a class="dropdown-item"
                                    href="{{route('excelEquipos',['nombre_equ' => $nombre_equ])}}">
                                    <i class="fa fa-save"></i> Excel
                                </a>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="card-body">
                    @if($equiposIns)
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <th colspan="6" class="text-center">Equipos Inscritos</th>
                                </tr>
                                @for ($i = 0; $i < 1 ; $i++) <tr>
                                    <th colspan="6" class="text-center">{{ $equiposIns[$i]->nombre_equ }}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="6">
                                            Descripcion: {{ $equiposIns[$i]->descripcion_equ }}
                                            Precio de la incripcion: {{ $equiposIns[$i]->precio_ins_equ }}</th>

                                    </tr>
                                    @endfor
                                    <tr>
                                        <td>#</td>
                                        <th>Nombre </th>
                                        <th>Descripcion </th>
                                        <th>Juego </th>
                                        <th>Precio </th>
                                        <th>Precio </th>
                                    </tr>
                            </thead>
                            <tbody>
                                @foreach($equiposIns as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nombre_jug }}</td>
                                    <td>{{ $row->cedula_jug }}</td>
                                    <td>{{ $row->telefono_jug }}</td>
                                    <td>{{ $row->correo_jug }}</td>
                                    <td>{{ $row->descripcion_jug }}</td>
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