@section('title', __('Categorias'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
					
						<div class="float-left .col-auto .me-auto">
							<h4>
							CATEGORIA </h4>
						</div>
						
						<div>
							<input wire:model='keyWord' type="text" class="form-control .col-auto .me-auto" name="search" id="search" placeholder="Search Categorias">
						</div>
						<div class="btn btn-sm btn-success .col-auto .me-auto" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Crear Categoria
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.categorias.create')
						@include('livewire.categorias.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Tipo Categoria</th>
								<th>Numero Jugadores Categoria</th>
								<th>Descripcion Categoria</th>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($categorias as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->tipo_cat }}</td>
								<td>{{ $row->num_jug_cat }}</td>
								<td>{{ $row->descripcion_cat }}</td>
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
					{{ $categorias->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
