@section('title', __('Individuales'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class=""></i>
							LISTA INDIVIDUAL </h4>
						</div>
						<div wire:poll.60s>
							
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Individuales">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Crear Individuales
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.individuales.create')
						@include('livewire.individuales.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nombre</th>
								<th>Cedula</th>
								<th>Telefono</th>
								<th>Correo</th>
								<th>Descripcion</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($individuales as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->nombre_ind }}</td>
								<td>{{ $row->cedula_ind }}</td>
								<td>{{ $row->telefono_ind }}</td>
								<td>{{ $row->correo_ind }}</td>
								<td>{{ $row->descripcion_ind }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Individuale id {{$row->id}}? \nDeleted Individuales cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $individuales->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
