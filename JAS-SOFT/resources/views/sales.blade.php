<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('CSS/sales.css') }}">
    <title>Productos</title>
    <link rel="stylesheet" href="{{ asset('CSS/Prod.css') }}">
    <link rel="shortcut icon" href="{{ asset('PICTURES/iconlogo.png') }}">
</head>
<body>
    <header>
        <img class="logo-compania" src="{{ asset('PICTURES/logo.png') }}" alt="logo">
        <h1>CATALOGO DE PRODUCTOS</h1>       
        <a href="{{ url('index') }}" class="btn-ingresar"><img class="img-login" src="{{ asset('PICTURES/Home.png') }}" alt="ingresar" width="40px"></a>
    </header>

    <section class="contenido">
        <div class="mostrador" id="mostrador">
            <div class="fila">
                <div class="item" onclick="cargar(this)">
                    <div class="contenedor-foto">
                        <img src="{{ asset('PICTURES/Atomizador.jpeg') }}" alt="">
                    </div>
                    <p class="descripcion">ATOMIZADOR</p>
                    <span class="precio">$ 1.300</span>
                </div>
                <div class="item" onclick="cargar(this)">
                    <div class="contenedor-foto">
                        <img src="{{ asset('PICTURES/Baby Bowl.jpg') }}" alt="">
                    </div>
                    <p class="descripcion" id>BABY BOWL</p>
                    <span class="precio">$ 1.800</span>
                </div>
                <div class="item" onclick="cargar(this)">
                    <div class="contenedor-foto">
                        <img src="{{ asset('PICTURES/Estante.jpg') }}" alt="">
                    </div>
                    <p class="descripcion">ESTANTE</p>
                    <span class="precio">$ 40.000</span>
                </div>
                <div class="item" onclick="cargar(this)">
                    <div class="contenedor-foto">
                        <img src="{{ asset('PICTURES/Ganchos bolsa.jpeg') }}" alt="">
                    </div>
                    <p class="descripcion">GANCHOS BOLSA JUMBO</p>
                    <span class="precio">$ 1.800</span>
                </div>
            </div>
            <div class="fila">
                <div class="item" onclick="cargar(this)">
                    <div class="contenedor-foto">
                        <img src="{{ asset('PICTURES/JARRA.jpg') }}" alt="">
                    </div>
                    <p class="descripcion">JARRA 1.5 Lts</p>
                    <span class="precio">$ 13.000</span>
                </div>
                <div class="item" onclick="cargar(this)">
                    <div class="contenedor-foto">
                        <img src="{{ asset('PICTURES/Papelera.jpg') }}" alt="">
                    </div>
                    <p class="descripcion">PAPELERA</p>
                    <span class="precio">$ 12.000</span>
                </div>
                <div class="item" onclick="cargar(this)">
                    <div class="contenedor-foto">
                        <img src="{{ asset('PICTURES/Refractaria.avif') }}" alt="">
                    </div>
                    <p class="descripcion">REFRACTARIA</p>
                    <span class="precio">$ 8.500</span>
                </div>
                <div class="item" onclick="cargar(this)">
                    <div class="contenedor-foto">
                        <img src="{{ asset('PICTURES/TAPPER.jpg') }}" alt="">
                    </div>
                    <p class="descripcion">TAPPER</p>
                    <span class="precio">$ 1.800</span>
                </div>
            </div> 
        </div>
        <div class="seleccion" id="seleccion">
            <div class="cerrar" onclick="cerrar()">
                &#x2715
            </div>
            <div class="info">
                <img src="{{ asset('img/1.png') }}" alt="" id="img">
                <h2 id="modelo">NIKE MODEL 1</h2>
                <p id="descripcion">Descripción Modelo 1</p>

                <span class="precio" id="precio">$ 130</span>

                <div class="fila">
                    <div class="size">
                        <label for="">Cantidad</label>
                        <select name="" id="">
                            <option value="">1</option>
                            <option value="">5</option>
                            <option value="">10</option>
                            <option value="">50</option>
                        </select>
                    </div>
                    <button>AGREGAR AL CARRITO</button>
                </div>
            </div>
        </div>
    </section>

    <script>
        let mostrador = document.getElementById("mostrador");
        let seleccion = document.getElementById("seleccion");
        let imgSeleccionada = document.getElementById("img");
        let modeloSeleccionado = document.getElementById("modelo");
        let descripSeleccionada = document.getElementById("descripcion");
        let precioSeleccionado = document.getElementById("precio");

        function cargar(item){
            quitarBordes();
            mostrador.style.width = "60%";
            seleccion.style.width = "40%";
            seleccion.style.opacity = "1";
            item.style.border = "2px solid blue";

            imgSeleccionada.src = item.getElementsByTagName("img")[0].src;

            modeloSeleccionado.innerHTML =  item.getElementsByTagName("p")[0].innerHTML;

            descripSeleccionada.innerHTML = "Descripción del modelo ";

            precioSeleccionado.innerHTML =  item.getElementsByTagName("span")[0].innerHTML;
        }

        function cerrar(){
            mostrador.style.width = "100%";
            seleccion.style.width = "0%";
            seleccion.style.opacity = "0";
            quitarBordes();
        }

        function quitarBordes(){
            var items = document.getElementsByClassName("item");
            for(i=0;i <items.length; i++){
                items[i].style.border = "none";
            }
        }
    </script>
</body>
</html>
