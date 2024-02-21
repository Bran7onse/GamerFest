@section('title', __('Inscripcion Equs'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class=""></i>
							CREAR INCRIPCION DE EQUIPO </h4>
						</div>

						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Inscripcion Equipos">
						</div>
						<div class="btn btn-success " data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i> Crear Inscripcion de Equipo
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.inscripcion-equs.create')
						@include('livewire.inscripcion-equs.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Equipo</th>
								<th>Juego</th>
								<th>Precio</th>
								<th>Pago</th>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($inscripcionEqus as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->equipos->nombre_equ }}</td>
								<td>{{ $row->juegos->nombre_jue }}</td>
								<td>{{ $row->precio_ins_equ }}</td>
								<td>{{ $row->pago_ins_equ }}</td>
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
