@section('title', __('Inscripcion Inds'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Inscripcion Individual </h4>
						</div>
						
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Inscripcion Inds">
						</div>
						<div class="btn btn-sm btn-success" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Crear Inscripcion Individual
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.inscripcion-inds.create')
						@include('livewire.inscripcion-inds.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Jugador</th>
								<th>Juego</th>
								<th>Precio Ins</th>
								<th>Pago Ins</th>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
						@foreach($inscripcionInds as $row)
						<tr>
							<td>{{ $loop->iteration }}</td> 
							<td>{{ $row->individuales->nombre_ind }}</td>
							<td>{{ $row->juegos->nombre_jue }}</td>
							<td>{{ $row->precio_ins }}</td>
							<!-- Muestra la imagen -->
							<td class="center-image">
								@if($row->pago_ins)
									<img src="{{ asset('storage/pagos/' . $row->pago_ins) }}" alt="Pago Ins" style="max-width: 100px; height: auto;">
								@else
									Sin imagen
								@endif
							</td>
							<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" style="color:white; background-color:blue;" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>                             
										<a class="dropdown-item" style="color:white; background-color:green;" wire:click="show({{$row->id}})"><i class="fa fa-eye"></i> Visualizar </a>
										<a class="dropdown-item " style="color:white; background-color:red;" onclick="confirm('Confirm Delete Inscripcion Equ id {{$row->id}}? \nDeleted Inscripcion Equs cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>
									</div>

																		<!-- Modal para visualizar detalles -->
									<div wire:ignore.self class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="viewModalLabel">Detalles de la Inscripción</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													@if($selectedInscripcion)
														<!-- Mostrar la imagen -->
														@if($selectedInscripcion->pago_ins)
															<img src="{{ asset('storage/pagos/' . $selectedInscripcion->pago_ins) }}" alt="Pago Ins" style="max-width: 100%; height: auto;">
														@else
															<p>No hay imagen disponible.</p>
														@endif
														<!-- Aquí puedes añadir más detalles si lo deseas -->
													@else
														<p>Información no disponible.</p>
													@endif
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
												</div>
											</div>
										</div>
									</div>

								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
					</table>						
					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
    .center-image img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<script>
    window.addEventListener('show-modal', event => {
        $('#' + event.detail).modal('show');
    });
</script>

