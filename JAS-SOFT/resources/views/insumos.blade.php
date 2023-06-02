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
    <title>PromoPlast | Insumo</title>
  </head>

  <body>
  <header class="dash-menu">
    <img class="logo-dash-admin" src="pictures/logo.png" alt="logo">
    <a class="nav-link" href="{{ url('/index') }}">INICIO</a>
    <ul class="list-menu-ul">      
        <li class="list-menu-dash"> <img class="img-menu-dash" src="pictures/campana.png" alt="Campana"> </li>
        <li class="list-menu-dash"> Administrador (Administrador) </li>
        <li class="list-menu-dash"> <img class="img-menu-dash rotate-img" src="pictures/flecha.png" alt="flecha"> </li>
        <li class="list-menu-dash"> <img class="img-menu-dash-users" src="pictures/usuario.png" alt=""> </li>
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
              <a class="message-ubication" href="{{ url('produccion') }}">PRODUCCION</a>      
              </nav>  
              <div class="container mt-3">
                <h2>INSUMOS</h2>
                <p></p>                      
                <table class="table table-striped" id="tablas">
                  <thead>
                    <tr>
                      <th>Codigo Insumo</th>
                      <th>Nombre</th>
                      <th>Cantidad</th>
                      <th>Unidad de medida</th>   
                      <th>Color</th>
                      <th>tamaño</th> 
                      <th></th>            
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>20019381</td>
                      <td>Poliester</td>
                      <td>200</td>
                      <td>gr</td>
                      <td></td>
                      <td></td>
                      <td>
                        <img src="pictures/icons-editar.png" alt="editar" width="20px">
                        <img src="pictures/icons-basura.png" alt="eliminar" width="20px">
                      </td>
                    </tr>
                    <tr>
                      <td>20019382</td>
                      <td>Pigmento</td>
                      <td>600</td>
                      <td>gr</td>
                      <td>verde</td>
                      <td></td>
                      <td>
                        <img src="pictures/icons-editar.png" alt="editar" width="20px">
                        <img src="pictures/icons-basura.png" alt="eliminar" width="20px">
                      </td>
                    </tr>
                    <tr>
                      <td>20019384</td>
                      <td>Pigmento</td>
                      <td>1000</td>
                      <td>gr</td>
                      <td>azul</td>
                      <td></td>
                      <td>
                        <img src="pictures/icons-editar.png" alt="editar" width="20px">
                        <img src="pictures/icons-basura.png" alt="eliminar" width="20px">
                      </td>
                    </tr>
                    <tr>
                      <td>20019385</td>
                      <td>Pigmento</td>
                      <td>1000</td>
                      <td>gr</td>
                      <td>azul</td>
                      <td></td>
                      <td>
                        <img src="pictures/icons-editar.png" alt="editar" width="20px">
                        <img src="pictures/icons-basura.png" alt="eliminar" width="20px">
                      </td>
                    </tr>
                    <tr>
                      <td>20019386</td>
                      <td>Pigmento</td>
                      <td>1000</td>
                      <td>gr</td>
                      <td>azul</td>
                      <td></td>
                      <td>
                        <img src="pictures/icons-editar.png" alt="editar" width="20px">
                        <img src="pictures/icons-basura.png" alt="eliminar" width="20px">
                      </td>
                    </tr>
                    <tr>
                      <td>20019387</td>
                      <td>Pigmento</td>
                      <td>1000</td>
                      <td>gr</td>
                      <td>azul</td>
                      <td></td>
                      <td>
                        <img src="pictures/icons-editar.png" alt="editar" width="20px">
                        <img src="pictures/icons-basura.png" alt="eliminar" width="20px">
                      </td>
                    </tr>
                    <tr>
                      <td>20019388</td>
                      <td>Pigmento</td>
                      <td>1000</td>
                      <td>gr</td>
                      <td>azul</td>
                      <td></td>
                      <td>
                        <img src="pictures/icons-editar.png" alt="editar" width="20px">
                        <img src="pictures/icons-basura.png" alt="eliminar" width="20px">
                      </td>
                    </tr>
                    <tr>
                      <td>20019389</td>
                      <td>Pigmento</td>
                      <td>1000</td>
                      <td>gr</td>
                      <td>azul</td>
                      <td></td>
                      <td>
                        <img src="PICTURES/icons-editar.png" alt="editar" width="20px">
                        <img src="PICTURES/icons-basura.png" alt="eliminar" width="20px">
                      </td>
                    </tr>
                  </tbody>
                </table>  
                <div class="d-flex justify-content-around bg mb-3">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Nuevo Insumo
                  </button>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ordenModal">
                    Crear orden de compra
                  </button>
                </div>
               
                
                <!-- The Modal -->
                <div class="modal" id="myModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Agregar Insumo</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                
                      <!-- Modal body -->
                      <div class="modal-body">
                          <form action="" class="was-validated">
                            <div class="row">
                              <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="Nombre Insumo" placeholder="Nombre Insumo" name="Nombre Insumo" required> 
                                <label for="Nombre Insumo">Nombre Insumo</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Porfavor complete el campo</div>
                              </div>
                              <div class="form-floating mt-3 mb-3 col-8">
                                <input type="text" required class="form-control" id="Cantidad" placeholder="Cantidad" name="Cantidad" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                                
                                <label for="Cantidad">Cantidad</label>
                              </div> 

                              <div class="form-floating mt-3 mb-3 col-4">
                                <select class="form-select" id="sel1" name="Unidadmedida" required>
                                  <option>Kg</option>
                                  <option>Gr</option>                              
                                </select>
                                <label for="sel1" class="form-label">Unidad</label>
                              </div> 

                              <div class="form-floating mt-3 mb-3 col-6">
                                <input type="text" class="form-control" id="Color" placeholder="Color" name="Color" required>
                                <label for="Color">Color</label>
                              </div> 

                              <div class="form-floating mt-3 mb-3 col-6">
                                <input type="text" class="form-control" id="Tamaño" placeholder="Tamaño" name="Tamaño" required>
                                <label for="Tamaño">Tamaño</label>
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

                <!-- The Modal -->
                <div class="modal" id="ordenModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Orden de compra</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                
                      <!-- Modal body -->
                      <div class="modal-body">
                          <form action="" class="was-validated">
                            <div class="row">
                              <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="Nombre Insumo" placeholder="Nombre Insumo" name="Nombre Insumo" required> 
                                <label for="Nombre Insumo">Nombre Insumo</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Porfavor complete el campo</div>
                              </div>
                              <div class="form-floating mt-3 mb-3 col-8">
                                <input type="text" required class="form-control" id="Cantidad" placeholder="Cantidad" name="Cantidad" maxlength="9" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">                                
                                <label for="Cantidad">Cantidad</label>
                              </div> 

                              <div class="form-floating mt-3 mb-3 col-4">
                                <select class="form-select" id="sel1" name="Unidadmedida" required>
                                  <option>Kg</option>
                                  <option>Gr</option>                              
                                </select>
                                <label for="sel1" class="form-label">Unidad</label>
                              </div> 

                              <div class="form-floating mt-3 mb-3 col-6">
                                <input type="text" class="form-control" id="Color" placeholder="Color" name="Color" required>
                                <label for="Color">Color</label>
                              </div> 

                              <div class="form-floating mt-3 mb-3 col-6">
                                <input type="text" class="form-control" id="Tamaño" placeholder="Tamaño" name="Tamaño" required>
                                <label for="Tamaño">Tamaño</label>
                              </div>
                              <div class="form-floating mt-3 mb-3 col-6">
                                <select class="form-select" id="sel1" name="Unidadmedida" required>
                                  <option>Proveedor a</option>
                                  <option>Proveedor b</option>                              
                                </select>
                                <label for="sel1" class="form-label">Proveedor</label>
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
          </div>
        </div>
      </div> 
    <script src="jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="{{ asset ('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset ('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset ('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js') }}"></script>
    <script>
      $(document).ready( function () {
      $('#tablas').DataTable();
      } );
    </script>
    </body>
</html>