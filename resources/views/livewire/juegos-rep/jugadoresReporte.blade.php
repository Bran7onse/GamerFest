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
<div class="text-center">
            <img src="https://srvcas.espe.edu.ec/authenticationendpoint/images/Espe-Angular-Logo.png" alt="" width="650" height="150">
            <br>
            <br>
            <img src="https://cdn.pixabay.com/photo/2018/09/05/06/19/gamer-zone-3655575_960_720.png" alt="" width="110" height="110">       
        </div>
    <div class="container-md">
        <div class="row justify-content-center">
            <div class="col">
            <center> <H3><font color="black" face="Comic Sans MS,arial,verdana">Reporte de Juegos</font></H3></center>
            <table class="table border border-dark">
						<thead class="thead">
							<tr class="border border-dark"> 	
								<td class="table-primary border border-dark">#</td> 
								<th class="table-info border border-dark">Aula</th>
								<th class="table-primary border border-dark">Categoria</th>
								<th class="table-info border border-dark">Nombre </th>
								<th class="table-primary border border-dark">Imagen </th>
								<th class="table-info border border-dark">Precio </th>
								<th class="table-primary border border-dark">Descripcion </th>
							</tr>
						</thead>
						<tbody>
							@foreach($juegos as $row)
							<tr>
								<td class="table-primary border border-dark">{{ $loop->iteration }}</td> 
								<td class="table-info border border-dark">{{ $row->aulas->codigo_aul }}</td>
								<td class="table-primary border border-dark">{{ $row->categorias->tipo_cat }}</td>
								<td  class="table-info border border-dark">{{ $row->nombre_jue }}</td>
								<td class="table-primary border border-dark">{{ $row->imagen }}</td>
								<td  class="table-info border border-dark">{{ $row->precio_jue }}</td>
								<td class="table-primary border border-dark">{{ $row->descripcion_jue }}</td>
								
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