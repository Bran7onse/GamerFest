@section('title', __('Recaudacion'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <div class="float-left .col-auto .me-auto">
                            <h4>
                                Recaudacion </h4>
                        </div>
                        <div class="dropdown show .col-auto .me-auto">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acciones
                            </a> 
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{route('viewRecaudacion-pdf')}}">
                                    <i class="fa fa-eye"></i> Ver PDF
                                </a>
                                <a class="dropdown-item" href="{{route('downloadRecaudacion-pdf')}}">
                                    <i class="fa fa-save"></i> Descargar PDF
                                </a>
                                <a class="dropdown-item" href="{{route('excelRecaudacion')}}">
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
                                    <th colspan="4" class="text-center"> Recaudacion Inscripciones Individuales</th>
                                </tr>
                                <tr>

                                    <td>#</td>
                                    <th>Juego</th>
                                    <th>Cantidad </th>
                                    <th>SubTotal Inscripcion</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0.0; ?>
                                @foreach($recaudaciones as $row)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nombre_jue }}</td>
                                    <td>{{ $row->total }}</td>
                                    <td>{{ $row->precioIns }}</td>
                                    <?php $total=$total+$row->precioIns;?>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                    <td>{{ $total }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <th colspan="4" class="text-center"> Recaudacion Inscripciones en Equipo</th>
                                </tr>
                                <tr>

                                    <td>#</td>
                                    <th>Juego</th>
                                    <th>Cantidad </th>
                                    <th>SubTotal Inscripcion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0.0; ?>
                                @foreach($recaudacionesEqu as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nombre_jue }}</td>
                                    <td>{{ $row->total }}</td>
                                    <td>{{ $row->precioIns }}</td>
                                    <?php $total=$total+$row->precioIns;?>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                    <td>{{ $total }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>