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

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel='stylesheet'>

    <link  rel="shortcut icon" href="{{ asset('pictures/iconlogo.png') }}">
    <title>PromoPlast | Inicio</title>s
</head>

<body>
  <header class="dash-menu">
    <img class="logo-dash-admin" src="{{ asset('pictures/logo.png') }}" alt="logo">
    <li class="d-flex justify-content-center"><button type="button" class="btn" data-bs-toggle="popover" title="Mision" data-bs-content="Some content inside the popover">Mision</button></li>
    <li class="d-flex justify-content-center"><a class="nav-link" href="{{ url('/sales') }}">Catalogo</a>
    <li class="d-flex justify-content-center"><button type="button" class="btn" data-bs-toggle="popover" title="Vision" data-bs-content="Some content inside the popover">Vision</button></li>
    <ul class="list-menu-ul">
        <li class="list-menu-dash"> <img class="img-menu-dash" src="pictures/campana.png" alt="Campana"> </li>
        <li class="list-menu-dash"> <img class="img-menu-dash rotate-img" src="pictures/flecha.png" alt="flecha"> </li>            
        <li><a href="{{ url('/login')}}" class="btn-ingresar" ><img class="img-login" src="pictures/login.png" alt="ingresar"></a></li>
    </ul>
  </header>
    <center>
      <div class="body1">
        <div class="content">
          <div id="demo" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-indicators" id="itemCarrousel">
                      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    </div>
                  <div class="carousel-inner">
                      <div class="carousel-item active" id="conteCarrousel">
                      <img src="pictures/producto1.jpg" alt="" class="d-block w-100">
                      </div>
                      <div class="carousel-item" id="conteCarrousel">
                      <img src="pictures/producto2.jpg" alt="" class="d-block w-100">
                      </div>       
                      <div class="carousel-item" id="conteCarrousel">
                        <img src="pictures/banner.jpg" alt="" class="d-block w-100">
                        </div>               
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" id="itemCarrouselArrows"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                      <span class="carousel-control-next-icon" id="itemCarrouselArrows"></span>
                  </button>
            </div>   

            <div class="categorias">
                <section class="informativo">
                  <p class="titulo-principal"> CATEGORIAS DE PRODUCTOS </p> 
          
                  <div class="producto">
                      <img class="img-productos" src="pictures/Producto1.PNG" alt="producto1">
                      <p class="texto-categorias"> ENVASES PLASTICOS </p>
                  </div>
                  
                  <div class="producto">
                      <img class="img-productos" src="pictures/Producto2.PNG" alt="producto2">
                      <p class="texto-categorias"> POTES PLASTICOS </p>
                  </div>
          
                  <div class="producto">
                      <img class="img-productos" src="pictures/Producto3.PNG" alt="producto3">
                      <p class="texto-categorias"> DISPENSADORES Y VALVULAS </p>
                  </div>
          
                  <div class="producto">
                      <img class="img-productos" src="pictures/Producto4.PNG" alt="producto4">
                      <p class="texto-categorias"> GANCHOS </p>
                  </div>        
                </section>
            </div>           
        </div>               
      </div> 
    </center>

    <footer>
        <div class="pie_pagina">
            <div class="group1">
                <div class="box box ">
                    <h2>SIGUENOS</h2>
                    <div class="redsocical">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-instagram"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-gmail"></a>
                    </div>
                </div>
                <div class="box box1">
                    <h2>SOBRE NOSOSTROS</h2>    
                    <p>Promoplast es una compañía especializada en plasticos como:tapper, atomizadores, jarras, mugs, productos promocionales, entre otros. Tenemos más de 500 referencias. SOLICITA NUESTROS CATALOGOS!</p>                                 
                </div>               
                <div class="box">
                    <h2>JAS-SOFT</h2>                    
                </div>                
            </div>          
            <div class="group2">
                <small>&copy;2023 <b>JAS-SOFT</b> - Todos los derechos reservados</small>
            </div>
        </div>
    </footer> 
    <script src="{{ asset ('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>
      var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
      var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
      })
      </script>  
</body>
</html>