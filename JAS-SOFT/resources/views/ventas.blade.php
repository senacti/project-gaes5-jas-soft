<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   

    <link rel="stylesheet" type="text/css" href="{{ asset ('css/Style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/Header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset ('css/footer.css') }}">
   
    <link href="{{ asset ('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css') }}" rel="stylesheet">    
    <link rel="stylesheet" href="{{ asset ('css/estilos-dash-admin.css') }}"> 
    <link rel="stylesheet" href="{{ asset ('css/jquery.dataTables.min.css') }}">  
    <script src="{{ asset ('js/bootstrap.bundle.min.js') }}"></script>
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link  rel="shortcut icon" href="PICTURES/iconlogo.png">
    <title>PromoPlast | Produccion</title>
</head>

<body>
  <header class="dash-menu">
    <img class="logo-dash-admin" src="PICTURES/logo.png" alt="logo">
    <a class="nav-link" href="{{ url('/index') }}">INICIO</a>
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
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/buzon') }}">BUZON</a>
          </li>
        </ul>        
      </div>

      <div class="col-10" id="contentd">
        <div class="card" id="cardash">
          <div class="container mt-3">
            <h2>VENTAS</h2>          
            <p></p>      
            <div class="tarjetas">
              <div class="row">
                <div class="col">
                  <img src="PICTURES/grafico1.png" alt="grafico1" id="grafico">
                </div>
                <div class="col">
                  <img src="PICTURES/grafico2.png" alt="grafico2" id="grafico">
                </div>
              </div>  
            </div>          
            <table class="table table-striped" id="tablas">
              <thead>
                <tr>
                  <th>Ordene de pedido</th>
                  <th>Cliente</th>
                  <th>tipo de pago</th>
                  <th>metodo de pago</th>   
                  <th>cantidad</th>   
                  <th>producto</th>
                  <th>estado</th>
                  <th>total</th>
                  <th>subtotal</th>
                  <th>Fecha</th>          
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>001</td>
                  <td>Juan Sanchez</td>
                  <td>abono</td>
                  <td>efectivo</td>   
                  <td>200</td>   
                  <td>Ganchos</td>
                  <td>Entregado</td>
                  <td>360.000</td>
                  <td>130.000</td>                
                  <td>21/02/2023</td>
                </tr>
                <tr>
                  <td>002</td>
                  <td>Juan Sanchez</td>
                  <td>abono</td>
                  <td>Debito</td>   
                  <td>700</td>   
                  <td>Jarras</td>
                  <td>Produccion</td>
                  <td>9.100.000</td>
                  <td>4.555.900</td>                
                  <td>01/02/2023</td>
                </tr>
                <tr>
                  <td>003</td>
                  <td>Juan Sanchez</td>
                  <td>abono</td>
                  <td>efectivo</td>   
                  <td>700</td>   
                  <td>Tapper</td>
                  <td>Produccion</td>
                  <td>1.260.000</td>
                  <td>680.000</td>                
                  <td>24/03/2023</td>
                </tr>
              </tbody>
            </table>     
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
              Nueva venta
            </button>
            
            <!-- The Modal -->
            <div class="modal" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">
            
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Crear venta</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
            
                  <!-- Modal body -->
                  <div class="modal-body">
                      <form action="#" class="was-validated">
                        <div class="row">
                          <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control" id="Nombre Cliente" placeholder="Nombre Cliente" name="Nombre Cliente" required> 
                            <label for="Nombre Cliente">Nombre Cliente</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Porfavor complete el campo</div>
                          </div>
                          <div class="form-floating mt-3 mb-3 col-6">
                            <input type="text" required class="form-control" id="Cantidad" placeholder="Cantidad" name="Cantidad" maxlength="#" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                            
                            <label for="Cantidad">Cantidad</label>
                          </div> 

                          <div class="form-floating mt-3 mb-3 col-6">
                            <select class="form-select" id="sel1" name="Tipopago">
                              <option>Abono</option>
                              <option>Total</option>                              
                            </select>
                            <label for="sel1" class="form-label">Tipo de pago</label>
                          </div> 

                          <div class="form-floating mt-3 mb-3 col-6">
                            <select class="form-select" id="sel1" name="Metodopago">
                              <option>Efectivo</option>
                              <option>Debito</option>   
                              <option>Credito</option> 
                              <option>PSE</option>                          
                            </select>
                            <label for="sel1" class="form-label">Metodo de pago</label>
                          </div> 

                          <div class="form-floating mt-3 mb-3 col-6">
                            <select class="form-select" id="sel1" name="Produto">
                              <option>Jarras</option>
                              <option>Ganchos</option>   
                              <option>Tapper</option> 
                              <option>Papelera</option>                          
                            </select>
                            <label for="sel1" class="form-label">Metodo de pago</label>
                          </div> 

                          <div class="form-floating mt-3 mb-3 col-6">
                            <input type="text" class="form-control" id="Color" placeholder="Color" name="Color" required>
                            <label for="Color">Total</label>
                          </div> 

                          <div class="form-floating mt-3 mb-3 col-6">
                            <input type="text" class="form-control" id="Tamaño" placeholder="Tamaño" name="Tamaño" required>
                            <label for="Tamaño">Subtotal</label>
                          </div>
                          <div class="form-floating mt-3 mb-3 col-7">
                            <td><input type="datetime-local"></td>
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
</body>
<script src="jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="JS/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="JS/dataTables.bootstrap.min.js"></script>
    <script>
      $(document).ready( function () {
      $('#tablas').DataTable();
      } );
    </script>   
</html>