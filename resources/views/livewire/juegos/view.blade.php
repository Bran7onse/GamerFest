@section('title', __('Juegos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Juego </h4>
						</div>
						
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Juegos">
						</div>
						<div class="btn btn-sm btn-success" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Crear Juego
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.juegos.create')
						@include('livewire.juegos.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Aula</th>
								<th>Categoria</th>
								<th>Nombre </th>
								<th>Imagen </th>
								<th>Precio </th>
								<th>Descripcion </th>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($juegos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->aulas->codigo_aul }}</td>
								<td>{{ $row->categorias->tipo_cat }}</td>
								<td>{{ $row->nombre_jue }}</td>

								<td class="align-middle text-center">
                                        @if ($row->imagen && file_exists('storage/' .
                                        str_replace('public/', '', $row->imagen)))
                                        <img class="img-thumbnail img-fluid"
                                            src="{{ asset('storage/' . str_replace('public/', '', $row->imagen)) }}"
                                            alt="Foto principal" width="100">
                                        @else
                                        <span class="text-muted">Sin foto</span>
                                        @endif
                                    </td>


								<td>{{ $row->precio_jue }}</td>
								<td>{{ $row->descripcion_jue }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" style="color:white; background-color:blue;" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
									<a class="dropdown-item " style="color:white; background-color:red;" onclick="confirm('Confirm Delete Inscripcion Equ id {{$row->id}}? \nDeleted Inscripcion Equs cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
