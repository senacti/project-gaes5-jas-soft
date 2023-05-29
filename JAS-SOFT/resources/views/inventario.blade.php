<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   

    <link rel="stylesheet" type="text/css" href="{{ asset ('css/Style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/Header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/estilos-dash-admin.css') }}"> 
    
    <link href="{{ asset ('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css') }}" rel="stylesheet"> 
    
    <link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css')}}">
    
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link  rel="shortcut icon" href="PICTURES/iconlogo.png">
    <title>PromoPlast | Inventario</title>
</head>

<body>
  <header class="dash-menu">
    <img class="logo-dash-admin" src="PICTURES/logo.png" alt="logo">
    <a href="index" class="btn" >HOME</a>
    <ul class="list-menu-ul">
        <li class="list-menu-dash"> <img class="img-menu-dash" src="PICTURES/campana.png" alt="Campana"> </li>
        <li class="list-menu-dash"> Administrador (Administrador) </li>
        <li class="list-menu-dash"> <img class="img-menu-dash rotate-img" src="PICTURES/flecha.png" alt="flecha"> </li>
        <li class="list-menu-dash"> <img class="img-menu-dash-users" src="PICTURES/usuario.png" alt=""> </li>
    </ul>
  </header>
 
  <div class="container-fluid">
    <div class="row">
      <div class="col-2 barmenu">
        <h3 class="mt-4">PROMOPLAST</h3>
        <p></p>
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/dashboard') }}">MENU</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="{{ url('/rrhh') }}">RRHH</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/produccion') }}">PRODUCCION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/inventario') }}">INVENTARIO</a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/ventas') }}">VENTAS</a>
          </li>
        </ul>        
      </div>
      <div class="col-10" id="contentd">
        <div class="card" id="cardash">
          <nav class="descrip-menu">
            <a class="message-ubication" href="#"></a>          
          </nav>  
          <div class="container mt-3">
            <h2>INVENTARIO</h2>
            <p></p>            
            <table class="table table-striped" id="tablas">
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Existencias</th>
                  <th>Precio U</th>
                  <th>Tamaño</th>
                  <th>Unidad Medida</th>
                  <th>Ubicación</th>
                  <th>Fecha fabricacion</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>10019381</td>
                  <td>Tapper</td>
                  <td>200</td>
                  <td>$6.000</td>
                  <td>Pequeño</td>
                  <td></td>
                  <td>bodega</td>
                  <td>20/03/2023</td>
                  <td>
                    <img src="PICTURES/icons-editar.png" alt="editar" width="20px">
                    <img src="PICTURES/icons-basura.png" alt="eliminar" width="20px">
                  </td>
                </tr>
                <tr>
                  <td>10019382</td>
                  <td>jarra 1.5L plastico</td>
                  <td>100</td>
                  <td>$13.000</td>
                  <td>1.5</td>
                  <td>L</td>
                  <td>bodega</td>
                  <td>25/03/2023</td>
                  <td>
                    <img src="PICTURES/icons-editar.png" alt="editar" width="20px">
                    <img src="PICTURES/icons-basura.png" alt="eliminar" width="20px">
                  </td>
                </tr>
                <tr>
                  <td>10019383</td>
                  <td>Baby bowl</td>
                  <td>200</td>
                  <td>$1.800</td>
                  <td>Pequeño</td>
                  <td></td>
                  <td>Almacen</td>
                  <td>12/12/2022</td>
                  <td>
                    <img src="PICTURES/icons-editar.png" alt="editar" width="20px">
                    <img src="PICTURES/icons-basura.png" alt="eliminar" width="20px">
                  </td>
                </tr>
                <tr>
                  <td>10019384</td>
                  <td>Atomizador</td>
                  <td>60</td>
                  <td>$1.300</td>
                  <td>Pequeño</td>
                  <td></td>
                  <td>bodega</td>
                  <td>20/01/2023</td>
                  <td>
                    <img src="PICTURES/icons-editar.png" alt="editar" width="20px">
                    <img src="PICTURES/icons-basura.png" alt="eliminar" width="20px">
                  </td>
                </tr>
                <tr>
                  <td>10019385</td>
                  <td>Estante</td>
                  <td>7</td>
                  <td>$40.000</td>
                  <td>1.80</td>
                  <td>M</td>
                  <td>bodega</td>
                  <td>02/01/2023</td>
                  <td>
                    <img src="PICTURES/icons-editar.png" alt="editar" width="20px">
                    <img src="PICTURES/icons-basura.png" alt="eliminar" width="20px">
                  </td>
                </tr>
                <tr>
                  <td>10019386</td>
                  <td>Ganchos autoadesivos</td>
                  <td>2</td>
                  <td>$1.800</td>
                  <td>jumbo</td>
                  <td></td>
                  <td>Almacen</td>
                  <td>15/03/2023</td>
                  <td>
                    <img src="PICTURES/icons-editar.png" alt="editar" width="20px">
                    <img src="PICTURES/icons-basura.png" alt="eliminar" width="20px">
                  </td>
                </tr>
                <tr>
                  <td>10019387</td>
                  <td>Papelera</td>
                  <td>40</td>
                  <td>$12.000</td>
                  <td>Mediana</td>
                  <td></td>
                  <td>bodega</td>
                  <td>10/02/2023</td>
                  <td>
                    <img src="PICTURES/icons-editar.png" alt="editar" width="20px">
                    <img src="PICTURES/icons-basura.png" alt="eliminar" width="20px">
                  </td>
                </tr>
              </tbody>
            </table>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
              Agregar Productos
            </button>
            
            <!-- The Modal -->
            <div class="modal" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">
            
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Agregar producto</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
            
                  <!-- Modal body -->
                  <div class="modal-body">
                      <form action="" class="was-validated">
                        <div class="row">
                          <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control" id="Nombre Producto" placeholder="Nombre Insumo" name="Nombre Insumo" required> 
                            <label for="Nombre Insumo">Nombre Producto</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Porfavor complete el campo</div>
                          </div>
                          <div class="form-floating mt-3 mb-3 col-8">
                            <input type="text" required class="form-control" id="Cantidad" placeholder="Cantidad" name="Cantidad" maxlength="#" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                            
                            <label for="Cantidad">Cantidad</label>
                          </div> 

                          <div class="form-floating mt-3 mb-3 col-4">
                            <select class="form-select" id="sel1" name="Unidadmedida">
                              <option>Kg</option>
                              <option>Gr</option>      
                              <option>L</option>  
                              <option>Ms</option>        
                              <option>Cm</option>              
                            </select>
                            <label for="sel1" class="form-label">Unidad</label>
                          </div> 

                          <div class="form-floating mt-3 mb-3 col-6">
                            <input type="text" class="form-control" id="Color" placeholder="Color" name="Color">
                            <label for="Color">Ubicación</label>
                          </div> 

                          <div class="form-floating mt-3 mb-3 col-6">
                            <input type="text" class="form-control" id="Tamaño" placeholder="Tamaño" name="Tamaño">
                            <label for="Tamaño">Tamaño</label>
                          </div>
                          <div class="form-floating mt-3 mb-3 col-9">
                            <input type="datetime-local">Fecha de fabricacion                            
                          </div>
                        </div>
                      </form>
                  </div>
            
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
                  </div>
          </div>
        </div>      
      </div>
    </div>
  </div> 
    <script src="jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="JS/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="JS/dataTables.bootstrap.min.js"></script>
    <script>
      $(document).ready( function () {
      $('#tablas').DataTable();
      } );
    </script>
</body>
<footer>

</footer>
</html>