@section('title', __('Aulas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left .col-auto .me-auto">
							<h4>
							AULA</h4>
						</div>
						
						<div>
							<input wire:model='keyWord' type="text" class="form-control .col-auto .me-auto" name="search" id="search" placeholder="Aulas">
						</div>
						<div class="btn btn-sm btn-success .col-auto .me-auto" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Crear Aula
						</div>
						
						
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.aulas.create')
						@include('livewire.aulas.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Codigo Aula</th>
								<th>Edificio Aula</th>
								<th>Observacion Aula</th>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($aulas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->codigo_aul }}</td>
								<td>{{ $row->edificio_aul }}</td>
								<td>{{ $row->observacion_aul }}</td>
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
					{{ $aulas->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
