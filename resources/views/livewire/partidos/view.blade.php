@section('title', __('Partidos'))
<div class="container-fluid">
    <div class="row justify-content-center" style="grid-template-columns: auto">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div class="float-left .col-auto .me-auto">
                            <h4>
                                Partidos </h4>
                        </div>
                        <div wire:model="nombre_equ" class="dropdown show .col-auto .me-auto">
                            {{-- <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acciones
                            </a> --}}
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{route('viewPartidos-pdf')}}">
                                    <i class="fa fa-eye"></i> Ver PDF
                                </a>
                                <a class="dropdown-item" href="{{route('downloadPartidos-pdf')}}">
                                    <i class="fa fa-save"></i> Descargar PDF
                                </a>
                                <a class="dropdown-item" href="{{route('excelPartidos')}}">
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
                                    <th colspan="6" class="text-center"> Partidas Individuales</th>
                                </tr>
                                <tr>
                                    <td>#</td>
                                    <th>Jugador 1 </th>
                                    <th>Jugador 2 </th>
                                    <th>Ganador </th>
                                    <th>Fecha </th>
                                    <th>Observacion </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($partidosInd as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->jugadors1->nombre_jug }}</td>
                                    <td>{{ $row->jugadors2->nombre_jug }}</td>
                                    <td>{{ $row->jugadors3->nombre_jug }}</td>
                                    <td>{{ $row->fecha_par_ind }}</td>
                                    <td>{{ $row->observacion_par_ind }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <th colspan="6" class="text-center"> Partidas en Equipo</th>
                                </tr>
                                <tr>

                                    <td>#</td>
                                    <th>Equ1</th>
                                    <th>Equ2</th>
                                    <th>Ganador </th>
                                    <th>Fecha </th>
                                    <th>Observacion </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($partidosEqu as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->equipo1->nombre_equ }}</td>
                                    <td>{{ $row->equipo2->nombre_equ }}</td>
                                    <td>{{ $row->equipo3->nombre_equ }}</td>
                                    <td>{{ $row->fecha_par_equ }}</td>
                                    <td>{{ $row->observacion_par_equ }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>