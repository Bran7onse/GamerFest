<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
h1 {
    font-family: 'Algerian';
    color: green;
}

tr {
    line-height: 10px;
}
</style>
<body>
<div class="text-center">
            <img src="https://srvcas.espe.edu.ec/authenticationendpoint/images/Espe-Angular-Logo.png" alt="" width="650" height="150">
            <br>
            <br>
            <img src="https://cdn.pixabay.com/photo/2018/09/05/06/19/gamer-zone-3655575_960_720.png" alt="" width="110" height="110">       
        </div>
    <div class="container-md">
        <div class="row justify-content-center">
            <div class="col">
            <center> <H3><font color="black" face="Comic Sans MS,arial,verdana">Reporte de Partidas Individuales</font></H3></center>
                <table class="table border border-dark" style="font-family: 'arial';
    font-size:15px; ">
                    <thead class="thead">
                        <tr class="border border-dark">
                            <td class="table-info border border-dark">#</td>
                            <th class="table-primary border border-dark">Jugador 1 </th>
                            <th class="table-info border border-dark">Jugador 2 </th>
                            <th class="table-primary border border-dark">Ganador </th>
                            <th class="table-info border border-dark">Fecha </th>
                            <th class="table-primary border border-dark">Observacion </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($partidosInd as $row)
                        <tr>
                            <td class="table-info border border-dark">{{ $loop->iteration }}</td>
                            <td class="table-primary border border-dark">{{ $row->jugadors1->nombre_jug }}</td>
                            <td class="table-info border border-dark">{{ $row->jugadors2->nombre_jug }}</td>
                            <td class="table-primary border border-dark">{{ $row->jugadors3->nombre_jug }}</td>
                            <td class="table-info border border-dark">{{ $row->fecha_par_ind }}</td>
                            <td class="table-primary border border-dark">{{ $row->observacion_par_ind }}</td>
                            @endforeach
                    </tbody>
                </table>

            </div>
            <div class="col">
                <div class="table-responsive">
                <center> <H3><font color="black" face="Comic Sans MS,arial,verdana">Reporte de Partidas en Equipo</font></H3></center>
                    <table class="table border border-dark" style="font-family: 'arial';
    font-size:15px; ">
                        <thead class="thead">
                            <tr class="border border-dark">
                                <td class="table-info border border-dark">#</td>
                                <th class="table-primary border border-dark">Equipo 1</th>
                                <th class="table-info border border-dark">Equipo 2</th>
                                <th class="table-primary border border-dark">Ganador </th>
                                <th class="table-info border border-dark">Fecha </th>
                                <th class="table-primary border border-dark">Observacion </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($partidosEqu as $row)
                            <tr>
                                <td class="table-info border border-dark">{{ $loop->iteration }}</td>
                                <td class="table-primary border border-dark">{{ $row->equipo1->nombre_equ }}</td>
                                <td class="table-info border border-dark">{{ $row->equipo2->nombre_equ }}</td>
                                <td class="table-primary border border-dark">{{ $row->equipo3->nombre_equ }}</td>
                                <td class="table-info border border-dark">{{ $row->fecha_par_equ }}</td>
                                <td class="table-primary border border-dark">{{ $row->observacion_par_equ }}</td>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>