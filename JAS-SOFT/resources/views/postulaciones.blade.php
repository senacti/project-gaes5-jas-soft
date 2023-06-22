<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('CSS/estilos-dash-admin.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">  
    <script src="{{ asset('JS/bootstrap.bundle.min.js') }}"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="shortcut icon" href="{{ asset('PICTURES/iconlogo.png') }}">
    <title>PromoPlast | Postulaciones</title>
</head>

<body>
  <header class="dash-menu">
    <img class="logo-dash-admin" src="{{ asset('pictures/logo.png') }}" alt="logo">
    <a class="nav-link" href="{{ url('/index') }}">INICIO</a>
    <ul class="list-menu-ul">
        <li class="list-menu-dash"> <img class="img-menu-dash" src="{{ asset('PICTURES/campana.png') }}" alt="Campana"> </li>
        <li class="list-menu-dash"> Administrador (Administrador) </li>
        <li class="list-menu-dash"> <img class="img-menu-dash rotate-img" src="{{ asset('PICTURES/flecha.png') }}" alt="flecha"> </li>
        <li class="list-menu-dash"> <img class="img-menu-dash-users" src="{{ asset('PICTURES/usuario.png') }}" alt=""> </li>
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
            <a class="nav-link" href="{{ url('/ordenpedidos') }}">PRODUCCION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/inventario') }}">INVENTARIO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/ventum') }}">VENTAS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/buzonsugerencias') }}">BUZON</a>
          </li>
        </ul>        
      </div>


    <div class="col-10" id="contentd">
        <div class="card" id="cardash">
          <nav class="descrip-menu">
            <a class="message-ubication" href="{{ url('/rrhh') }}">RRHH</a>               
            <a class="message-ubication" href="{{ url('/produccion') }}">PRUEBAS</a>            
          </nav>   
          <center>
          <form action="" class="flex-box needs-validation formpostu">
            <h2>Nueva postulacion</h2>
            <div class="row">
                <div class="form-floating mt-3 mb-3 col-4">
                    <input type="text" class="form-control" id="cargo" placeholder="Cargo" required>
                    <label for="cargo">Cargo</label>
                </div>
                <div class="form-floating mt-3 mb-3 col-4">
                    <input type="text" class="form-control" id="Cantidad" placeholder="Cantidad de puestos" required name="Cantidad" maxlength="#" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    <label for="Cantidad">Cantidad de puesto</label>
                </div>
                <div class="form-floating mt-3 mb-3 col-4">
                    <input type="text" class="form-control" id="Puesto" placeholder="puesto" required>
                    <label for="Puesto">puesto</label>
                </div>                
                <div class="form-floating mt-3 mb-3 col-8">
                    <textarea type="textarea" class="form-control" id="descargo" placeholder="desciprcion del cargo" required> </textarea>
                    <label for="descargo">Descicion del cargo</label>    
                </div>
                <div class="form-floating mt-3 mb-3 col-4">
                    <input type="date" class="form-control" id="fechaoferta" placeholder="fechaoferta" required>
                    <label for="fechaoferta">Fecha publicacion de oferta</label>
                </div>
                <div class="form-floating mt-3 mb-3 col-4">
                    <input type="date" class="form-control" id="fechaoferta" placeholder="fechaoferta" required>
                    <label for="fechaoferta">Fecha cierre de oferta</label>
                </div>
                <div class="form-floating mt-3 mb-3 col-2">
                    <input type="number" class="form-control" id="experiencia" placeholder="experiencia" required name="Cantidad" maxlength="#" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    <label for="Experiencia">Experiencia años</label>
                </div>
                <div class="form-floating mt-3 mb-3 col-3">
                    <select class="form-select" id="sel1" name="Estudios">
                      <option>Tecnico</option>
                      <option>Tecnologo</option>      
                      <option>Profesional</option>  
                      <option>Bachiller</option>                           
                    </select>
                    <label for="sel1" class="form-label">Estudios</label>
                </div> 
                <div class="form-floating mt-3 mb-3 col-3">
                    <select class="form-select" id="sel1" name="tipocontrato">
                      <option>Termino definido</option>
                      <option>Termino definido</option>      
                      <option>Contrato por prestación de servicios</option>  
                      <option>Contrato de aprendizaje</option>                           
                    </select>
                    <label for="sel1" class="form-label">Estudios</label>
                </div> 
                <button type="submit" class="btn btn-primary">
                    Crear
                </button>
                <div class="table">
                    <h2>POSTULADOS</h2>
                    <table class="table table-striped" id="tablaspostu">
                        <thead>
                          <tr>
                            <th>Codigo postulacion</th>
                            <th>Nombre</th>
                            <th>Apellido</th>                            
                            <th>Fecha postulacion</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>10019381</td>
                            <td>Juan</td>
                            <td>Sanchez</td>                           
                            <td>20/03/2023</td>
                            <td>
                              <img src="{{ asset('PICTURES/icons-editar.png') }}" alt="editar" width="20px">
                              <img src="{{ asset('PICTURES/icons-basura.png') }}" alt="eliminar" width="20px">
                            </td>
                          </tr>
                          <tr>
                            <td>10019382</td>
                            <td>Camilo</td>
                            <td>Perez</td>                           
                            <td>24/03/2023</td>
                            <td>
                              <img src="{{ asset('PICTURES/icons-editar.png') }}" alt="editar" width="20px">
                              <img src="{{ asset('PICTURES/icons-basura.png') }}" alt="eliminar" width="20px">
                            </td>
                          </tr>
                          <tr>
                            <td>10019383</td>
                            <td>Pedro</td>
                            <td>Ramirez</td>                           
                            <td>26/03/2023</td>
                            <td>
                              <img src="{{ asset('PICTURES/icons-editar.png') }}" alt="editar" width="20px">
                              <img src="{{ asset('PICTURES/icons-basura.png') }}" alt="eliminar" width="20px">
                            </td>
                          </tr>
                          <tr>
                            <td>10019384</td>
                            <td>Andrea</td>
                            <td>Torres</td>                           
                            <td>26/03/2023</td>
                            <td>
                              <img src="{{ asset('PICTURES/icons-editar.png') }}" alt="editar" width="20px">
                              <img src="{{ asset('PICTURES/icons-basura.png') }}" alt="eliminar" width="20px">
                            </td>
                          </tr>
                          <tr>
                            <td>10019385</td>
                            <td>Juan</td>
                            <td>Estrella</td>                           
                            <td>20/03/2023</td>
                            <td>
                              <img src="{{ asset('PICTURES/icons-editar.png') }}" alt="editar" width="20px">
                              <img src="{{ asset('PICTURES/icons-basura.png') }}" alt="eliminar" width="20px">
                            </td>
                          </tr>                          
                        </tbody>
                      </table>
                </div>
                
            </div>    
          </form>
         </center>
                                   
        </div>                
    </div> 
    <script src="{{ asset('jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('JS/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('JS/dataTables.bootstrap.min.js') }}"></script>
    <script>
      $(document).ready(function () {
          $('#tablaspostu').DataTable({
              "language": {
                  "lengthMenu": "Mostrar _MENU_ registros por pagina",
                  "zeroRecords": "No se encontraron resultados en su busqueda",
                  "searchPlaceholder": "Buscar registros",
                  "info": "Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
                  "infoEmpty": "No existen registros",
                  "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "search": "Buscar:",
                  "paginate": {
                      "first": "Primero",
                      "last": "Último",
                      "next": "Siguiente",
                      "previous": "Anterior"
                  },
              }
          });
      });
  </script>
  </div>   
  </div>   
  </div>
  <footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <p class="text-light">2023 &copy; PromoPlast</p>
            </div>
        </div>
    </div>
  </footer>  

</body>
</html>
