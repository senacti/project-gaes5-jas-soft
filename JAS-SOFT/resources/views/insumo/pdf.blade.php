<!doctype html>
<html lang="en">

<head>
  <title>Reporte de insumos</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <style>
    .cabecera {
      background-color: black;
      color: white;
    }

    .image-right {
      float: right;
      margin-left: 10px;
    }
  </style>
</head>

<body>
  <img src="pictures/Logo_Proyecto.png" alt="" width="50px" height="50px">
  <img src="pictures/logo-compania-sin-fondo.png" alt="" width="65px" height="50px" class="image-right">
  <p></p>
  <p></p>
  <h1 class="text-center">REPORTE DE INSUMOS</h1>
  <p></p>
  <table class="table" style="text-aling:center; font-size: 20px">
    <thead class="cabecera">
      <tr>
        <th>Codigo Insumo</th>
        <th>Cantidad</th>
        <th>Unidad de medida</th>
        <th>Color</th>
        {{--<th>tamaño</th> --}}
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($insumos as $insumo)
      <tr>
        <td scope="row" class="align-middle">{{$insumo->IdInsumo}}</td>
        <td>{{$insumo->Cantidad}}</td>
        <td>{{$insumo->IdUnidadMedida}}</td>
        <td>{{$insumo->Color}}</td>
        {{-- <td>$insumo->Tamaño</td>--}}
      </tr>
      @endforeach
    </tbody>
  </table>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>