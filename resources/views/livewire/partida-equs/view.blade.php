@section('title', __('Partida Equs'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
					<div class="col-3 col-sm-3">
							{{-- <a href="{{route('viewPartidaEqu-pdf')}}"  >
								<div class="btn btn-sm btn-primary" >
								<i class="fa fa-eye"></i>  Ver PDF
								</div>
							</a>
							<a href="{{route('downloadPartidaEqu-pdf')}}"  >
								<div class="btn btn-sm btn-info" >
								<i class="fa fa-eye"></i>  Descargar PDF
								</div>
							</a> --}}
						</div>
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Partida de Equipo </h4>
						</div>
						
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Partida Equs">
						</div>
						<div class="btn btn-sm btn-success" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Crear Partida Equipo
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.partida-equs.create')
						@include('livewire.partida-equs.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Equ1</th>
								<th>Equ2</th>
								<th>Ganador </th>
								<th>Fecha </th>
								<th>Observacion </th>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($partidaEqus as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->equipo1->nombre_equ }}</td>
								<td>{{ $row->equipo2->nombre_equ }}</td>
								<td>{{ $row->equipo3->nombre_equ }}</td>
								<td>{{ $row->fecha_par_equ }}</td>
								<td>{{ $row->observacion_par_equ }}</td>
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
