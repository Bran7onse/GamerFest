@section('title', __('Inscripcion Equs'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4><i class="fab fa-laravel text-info"></i> Crear Inscripcion de Equipo </h4>
                        </div>

                        @if (session()->has('message'))
                        <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
                        @endif
                        <div>
                            <input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Inscripcion Equs">
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
                                    <td class="text-center">
                                        @if($row->pago_ins_equ)
                                            <img src="{{ Storage::url($row->pago_ins_equ) }}" style="width: 100px; height: 100px;" />
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
                                                <a class="dropdown-item" style="color:white; background-color:green;" data-toggle="modal" data-target="#viewImageModal{{$row->id}}"><i class="fa fa-eye"></i> Visualizar </a>
                                                <a class="dropdown-item" style="color:white; background-color:red;" onclick="confirm('Confirm Delete Inscripcion Equ id {{$row->id}}? \nDeleted Inscripcion Equs cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>
                                            </div>
                                        </div>

                                        <!-- Modal para visualizar imagen -->
                                        <div class="modal fade" id="viewImageModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="viewImageModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="viewImageModalLabel">Imagen de Pago</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if($row->pago_ins_equ)
                                                            <img src="{{ Storage::url($row->pago_ins_equ) }}" class="img-fluid" />
                                                        @else
                                                            Sin imagen
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
