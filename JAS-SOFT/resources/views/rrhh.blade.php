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
    <title>PromoPlast | RRHH</title>
</head>

<body>
  <header class="dash-menu">
    <img class="logo-dash-admin" src="PICTURES/logo.png" alt="logo">
    <a href="index.html" class="btn" >HOME</a>
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
            <a class="message-ubication" href="postulaciones.html">POSTULACIONES</a>               
            <a class="message-ubication" href="produccion.html">PUEBAS</a>            
          </nav>   
          <div class="container mt-3">
            <h2>RRHH</h2>
            <table class="table table-striped" id="tablas">
              <thead>
                <tr>
                  <th>Codigo Empleado</th>
                  <th>Nombre</th>
                  <th>Contrato</th>
                  <th>Cargo</th>   
                  <th>Bitacora</th>   
                  <th>telefono</th>
                  <th>direccion</th>   
                  <th>ciudad</th>  
                  <th></th>     
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>23419381</td>
                  <td>Doe</td>
                  <td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#contratoModal"><img src="PICTURES/icons8-visible-30.png" alt="" srcset=""></button>
                  <td>operario</td>
                  <td></td>
                  <td>3102424124</td>
                  <td>Bogota</td>
                  <td>calle 1 n°50 3 22</td>
                  <td>
                    <img src="PICTURES/icons-editar.png" alt="editar" width="20px">
                    <img src="PICTURES/icons-basura.png" alt="eliminar" width="20px">
                  </td>
                </tr>
                <tr>
                  <td>23419383</td>
                  <td>luis</td>
                  <td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#contratoModal"><img src="PICTURES/icons8-visible-30.png" alt="" srcset=""></button>
                  <td>operario</td>
                  <td></td>
                  <td>3102424124</td>
                  <td>Mosquera</td>
                  <td>calle 60 n°32 22</td>
                  <td>
                    <img src="PICTURES/icons-editar.png" alt="editar" width="20px">
                    <img src="PICTURES/icons-basura.png" alt="eliminar" width="20px">
                  </td>
                </tr>
                <tr>
                  <td>23419384</td>
                  <td>juan</td>
                  <td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#contratoModal"><img src="PICTURES/icons8-visible-30.png" alt="" srcset=""></button>
                  <td>operario</td>
                  <td></td>
                  <td>3102424124</td>
                  <td>Soacha</td>
                  <td>carrera 94a calle 52</td>
                  <td>
                    <img src="PICTURES/icons-editar.png" alt="editar" width="20px">
                    <img src="PICTURES/icons-basura.png" alt="eliminar" width="20px">
                  </td>
                </tr>
                <tr>
                  <td>23419385</td>
                  <td>pedor</td>
                  <td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#contratoModal"><img src="PICTURES/icons8-visible-30.png" alt="" srcset=""></button>
                  <td>operario</td>
                  <td></td>
                  <td>3102424124</td>
                  <td>Soacha</td>
                  <td>carrera 94a calle 52</td>
                  <td>
                    <img src="PICTURES/icons-editar.png" alt="editar" width="20px">
                    <img src="PICTURES/icons-basura.png" alt="eliminar" width="20px">
                  </td>
                </tr>
                <tr>
                  <td>23419386</td>
                  <td>juan</td>
                  <td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#contratoModal"><img src="PICTURES/icons8-visible-30.png" alt="" srcset=""></button>
                  <td>operario</td>
                  <td></td>
                  <td>3102424124</td>
                  <td>Soacha</td>
                  <td>carrera 94a calle 52</td>
                  <td>
                    <img src="PICTURES/icons-editar.png" alt="editar" width="20px">
                    <img src="PICTURES/icons-basura.png" alt="eliminar" width="20px">
                  </td>
                </tr>
              </tbody>
            </table>     
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
              Agregar Empleado
            </button>
            
            <!-- The Modal -->
            <div class="modal" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">
            
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Nuevo empleado</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
            
                  <!-- Modal body -->
                  <div class="modal-body">
                      <form action="$" class="needs-validated">
                        <div class="row">
                          <div class="form-floating mb-3 mt-3 col-6">
                            <input type="text" class="form-control" id="Nombre Insumo" placeholder="Nombre Insumo" name="Nombre Insumo" required> 
                              <label for="Nombre Insumo">Nombre</label>
                              <div class="valid-feedback"></div>
                              <div class="invalid-feedback">Porfavor complete el campo</div>
                            </div> 
                            <div class="form-floating mb-3 mt-3 col-6">
                              <input type="text" class="form-control" id="Nombre Insumo" placeholder="Nombre Insumo" name="Nombre Insumo" required> 
                              <label for="Nombre Insumo">Apellido</label>
                              <div class="valid-feedback"></div>
                              <div class="invalid-feedback">Porfavor complete el campo</div>
                            </div>
                        
                          <div class="form-floating mt-3 mb-3 col-6">
                            <input type="text" required class="form-control" id="Cantidad" placeholder="Cantidad" name="Cantidad" maxlength="#" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">                            
                            <label for="Cantidad">Telefono</label>
                          </div>   
                          <div class="form-floating mt-3 mb-3 col-5">
                            <select class="form-select" id="sel1" name="Unidadmedida" required>
                              <option>Operario</option>
                              <option>Jefe</option>   
                              <option>Vendedor</option>                           
                            </select>
                            <label for="sel1" class="form-label">Cargo</label>
                          </div> 
                          
                          <div class="form-floating mt-3 mb-3 col-8">
                            <input type="text" class="form-control" id="Color" placeholder="Color" name="Color" required>
                            <label for="Color">Direccion</label>
                          </div> 
  
                          <div class="form-floating mt-3 mb-3 col-6">
                            <input type="text" class="form-control" id="Tamaño" placeholder="Tamaño" name="Tamaño" required>
                            <label for="Tamaño">Ciudad</label>
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


            <!--Contrato Modal-->
            <div class="modal" id="contratoModal">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
            
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Contrato</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
            
                  <!-- Modal body -->
                  <div class="modal-body">
                      <form action="" class="was-validated">
                        <div class="row">
                          <div class="mb-3 mt-3 col 4">                            
                            <label for="Nombre Insumo">N° De contrato:</label>                            
                          </div>
                          <div class="mt-3 mb-3 col-8">
                            <label>4214124</label>  
                          </div> 
  
                          <div class="mt-3 mb-3 col-4">                            
                            <label for="sel1" class="form-label">Tipo de contrato:</label>
                          </div> 
  
                          <div class="mt-3 mb-3 col-6">                            
                            <label for="Color">Prestacion de servicio</label>
                          </div> 
  
                          <div class="mt-3 mb-3 col-6">                            
                            <img src="PICTURES/1606818132-contrato.webp" alt="" srcset="">
                          </div>                          
                          <div class="mt-3 mb-3 col-8">
                            
                          </div> 
                        </div>                        
                      </form>
                  </div>
            
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>                    
                  </div>
                </div> 
              </div> 
            </div>  
          </div>                           
        </div>                
    </div> 

    <script src="jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="JS/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="JS/dataTables.bootstrap.min.js"></script>
    <script src="JS/slidebar.js"></script>
      
    <script>
      $(document).ready( function () {
      $('#tablas').DataTable();
      } );
    </script>   
    
    <script>
      let arrow = document.querySelectorAll(".arrow");
      for (var i=0; i<arrow.length; i++) {
          arrow[i].addEventListener("click", (e)=>{
          let arrowParent = e.target.parentElement.parentElement;
          arrowParent.classList.toggle("showMenu");
          });
      }
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".bx-menu");
      console.log(sidebarBtn);
      sidebarBtn.addEventListener("click", ()=>{
          sidebar.classList.toggle("close")
      });
  </script>
    
</body>
</html>