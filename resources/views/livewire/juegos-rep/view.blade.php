@section('title', __('Jugadores-Inscritos'))
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
                        <div wire:model="nombre_equ" class="dropdown show .col-auto .me-auto">
                             <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acciones
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item"
                                    href="{{route('viewJuegosRep-pdf')}}">
                                    <i class="fa fa-eye"></i> Ver PDF
                                </a>
                                <a class="dropdown-item"
                                    href="{{route('downloadJuegosRep-pdf')}}">
                                    <i class="fa fa-save"></i> Descargar PDF
                                </a>
                                <a class="dropdown-item"
                                    href="{{route('excelJuegos')}}">
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
								<td>#</td> 
								<th>Aula</th>
								<th>Categoria</th>
								<th>Nombre </th>
								<th>Juegos </th>
								<th>Precio </th>
								<th>Descripcion </th>
							</tr>
						</thead>
						<tbody>
							@foreach($juegos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->aulas->codigo_aul }}</td>
								<td>{{ $row->categorias->tipo_cat }}</td>
								<td>{{ $row->nombre_jue }}</td>
								<td>{{ $row->imagen }}</td>
								<td>{{ $row->precio_jue }}</td>
								<td>{{ $row->descripcion_jue }}</td>
								
							@endforeach
						</tbody>
					</table>						
					
					</div>
				</div>
                </div>
            </div>
        </div>
    </div>
</div>