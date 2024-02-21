@section('title', __('Jugadors'))
<div class="container-fluid">
	<div class="row justify-content-center"style="grid-template-columns: auto">
		<div class="col-md-12">
			<div class="card"style="grid-template-columns: auto">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left .col-auto .me-auto">
							<h4>
							Jugador</h4>
						</div>
						
						<div>
							<input wire:model='keyWord' type="text" class="form-control .col-auto .me-auto" name="search" id="search" placeholder="Jugador">
						</div>
						<div class="btn btn-sm btn-success .col-auto .me-auto" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i> Crear Jugador
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.jugadors.create')
						@include('livewire.jugadors.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Equipo</th>
								<th>Nombre </th>
								<th>Cedula </th>
								<th>Telefono </th>
								<th>Correo </th>
								<th>Descripcion </th>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($jugadors as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->equipos->nombre_equ ?? 'Ninguno' }}</td>
								<td>{{ $row->nombre_jug }}</td>
								<td>{{ $row->cedula_jug }}</td>
								<td>{{ $row->telefono_jug }}</td>
								<td>{{ $row->correo_jug }}</td>
								<td>{{ $row->descripcion_jug }}</td>
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
