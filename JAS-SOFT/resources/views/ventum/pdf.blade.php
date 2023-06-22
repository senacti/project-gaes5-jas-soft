<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .cabecera {
            background-color: black;
            color: white;
        }
    </style>
</head>

<body>
    {{-- <img src="assets/iconlogo.png" alt="Imagen" width="50px" height="50px">
  <img src="" alt=""> --}}
    <h1 class="text-center">REPORTE DE VENTAS</h1>
    <table class="table table-striped" id="tablas">
        <thead class="thead">
            <tr>
                <th>Idventa</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Subtotal</th>
                <th>Descuento</th>
                <th>IVA</th>
                <th>Cliente</th>
                <th>Pagos</th>
                <th>Empleado</th>
                <th>Ordenpedido</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td>{{ $venta->IdVenta }}</td>
                    <td>{{ $venta->fecha }}</td>
                    <td>{{ $venta->totalVenta }}</td>
                    <td>{{ $venta->subTotal }}</td>
                    <td>{{ $venta->CantidadDescuento }}</td>
                    <td>{{ $venta->totalIva }}</td>
                    <td>{{ $venta->IdCliente }}</td>
                    <td>{{ $venta->IdPagos }}</td>
                    <td>{{ $venta->IdEmpleado }}</td>
                    <td>{{ $venta->IdOrdenPedido }}</td>
                    <td>
                        <form action="{{ route('ventum.edit') }}" method="post">
                            @csrf
                            <input type="hidden" id="idventa" name="idventa" value="{{ $venta->IdVenta }}">
                            <button type="submit" class="btn btn-success btn-sm">{{ __('Editar') }}</button>
                        </form>
                        <form action="{{ route('ventum.eliminar') }}" method="POST">
                            @csrf
                            <input type="hidden" id="idventa" name="idventa" value="{{ $venta->IdVenta }}">
                            <button type="submit" class="btn btn-danger btn-sm">{{ __('Eliminar') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
