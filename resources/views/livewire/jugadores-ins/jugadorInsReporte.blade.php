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
                <table class="table table-dark " style="position:relative;">
                    <thead class="thead">
                        <tr>
                            <th colspan="5" class="text-center">Jugadores Inscritos</th>
                        </tr>
                        <tr>
                            <td>#</td>
                            <th>Nombre </th>
                            <th>Cedula </th>
                            <th>Telefono </th>
                            <th>Correo </th>
                            <th>Descripcion </th>
                            <th>Juego </th>
                            <th>Precio </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jugadorIns as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->jugadors->nombre_jug }}</td>
                            <td>{{ $row->jugadors->cedula_jug }}</td>
                            <td>{{ $row->jugadors->telefono_jug }}</td>
                            <td>{{ $row->jugadors->correo_jug }}</td>
                            <td>{{ $row->jugadors->descripcion_jug }}</td>
                            <td>{{ $row->juegos->nombre_jue }}</td>
                            <td>{{ $row->precio_ins }}</td>
                            @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>