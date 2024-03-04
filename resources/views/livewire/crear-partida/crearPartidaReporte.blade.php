<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container-md">
        <div class="row justify-content-center">
            <div class="col">
                @if($crearPartida)
                <center>
                    <H3>
                        <font color="black" face="Comic Sans MS,arial,verdana">Reporte Partidas</font>
                    </H3>
                </center>
                <div class="table-responsive">
                    <table class="table border border-dark">
                        <thead class="thead">





                            <tr class="border border-dark">
                                <td class="table-info border border-dark">#</td>
                                <th class="table-primary border border-dark">Participantes </th>
                                <th class="table-info border border-dark">Juego </th>
                                <th class="table-primary border border-dark">Categoria </th>
                                <th class="table-info border border-dark">Num Max Jugadores</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($crearPartida as $row)
                            <tr>
                                <td class="table-info border border-dark">{{ $loop->iteration }}</td>
                                <td class="table-primary border border-dark">{{ $row->participantes }}</td>
                                <td class="table-info border border-dark">{{ $row->nombre_jue }}</td>
                                <td class="table-primary border border-dark">{{ $row->tipo_cat }}</td>
                                <td class="table-info border border-dark">{{ $row->num_jug }}</td>

                                @endforeach
                            </tr>
                        </tbody>
                    </table>


                </div>
                @endif
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>