@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop
<?php 
use App\Repositories\DashboardRepository;

$dashboard = new dashboardRepository();
$data = $dashboard->ObtenerData();

?>
@section('content')
<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$data['dashboardInfo']['cat_count']}}</h3>
                <p>Total de equipos</p>
            </div>
            <div class="icon">
                <i class="fas fa-fw fa-users"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$data['dashboardInfo']['hor_count']}}</h3>
                <p>Total de jugadores</p>
            </div>
            <div class="icon">
                <i class="fas fa-fw fa-user "></i>
            </div>
        </div>
    </div>


    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$data['dashboardInfo']['jue_count']}}</h3>
                <p>Total Juegos Registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-dragon"></i>
            </div>

        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$data['dashboardInfo']['aul_count']}}</h3>
                <p>Total Partidas a jugar</p>
            </div>
            <div class="icon">
                <i class="fas fa-gamepad"></i>
            </div>
        </div>
    </div> 

    



</div> 
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Inscripciones</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="inscripcionChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 478px;"
                            width="478" height="250" class="chartjs-render-monitor"></canvas>
                    </div>


                </div>


                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Categorias</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="categoriaChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 478px;"
                            width="478" height="250" class="chartjs-render-monitor"></canvas>
                    </div>

                </div>




            </div>

            <div class="col-md-6">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Partidas</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="partidasChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 478px;"
                            width="478" height="250" class="chartjs-render-monitor"></canvas>
                    </div>

                </div>

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title" id="titulo">Recaudación $</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="preciosChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 478px;"
                                width="478" height="250" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title" id="titulo">Precios Juegos</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="juegosChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 478px;"
                                width="478" height="250" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>

                </div>
                
            </div>
            <div class="col-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title" id="titulo">Participantes por juegos en equipo</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="inscripcionEquipoChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 478px;"
                                width="478" height="250" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>

                </div>
                
            </div>
            <div class="col-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title" id="titulo">Participantes por juegos individuales</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="inscripcionJuegoChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 478px;"
                                width="478" height="250" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>

                </div>
                
            </div>




        </div>

    </div>

    </div>

    </div>
</section>


@stop

@section('css')
    <style>
        .custom-background {
            background-image: url('https://i.ibb.co/5TcytjZ/172279346-afiche-de-videojuegos-joystick-de-control-dise-o-de-videojuegos-de-controlador.jpg');
            background-size: cover;
        }

        /* Mantén la definición original para otros estilos si es necesario */
        .chartjs-size-monitor-expand,
        .chartjs-size-monitor-shrink {
            background-size: cover;
        }
    </style>
@stop

@section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.chartjs-size-monitor-expand').classList.add('custom-background');
        document.querySelector('.chartjs-size-monitor-shrink').classList.add('custom-background');
    });

    var userCheckinChart = new Chart(document.getElementById('categoriaChart').getContext('2d'), @json($data['chartCategoria']));
    var userCheckinChart = new Chart(document.getElementById('inscripcionChart').getContext('2d'), @json($data['chartInscripcion']));
    var userCheckinChart = new Chart(document.getElementById('partidasChart').getContext('2d'), @json($data['chartPartida']));
    var userCheckinChart = new Chart(document.getElementById('preciosChart').getContext('2d'), @json($data['chartPrecios']));
    var userCheckinChart = new Chart(document.getElementById('juegosChart').getContext('2d'), @json($data['chartJuegos']));
    var userCheckinChart = new Chart(document.getElementById('inscripcionJuegoChart').getContext('2d'), @json($data['charInscipcionJuego']));
    var userCheckinChart = new Chart(document.getElementById('inscripcionEquipoChart').getContext('2d'), @json($data['charInscipcionEquipo']));
</script>
@stop
