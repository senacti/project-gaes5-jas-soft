<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('CSS/formulario.css') }}">  
  <title>Formulario Registro</title>
  <link  rel="shortcut icon" href="{{ asset('pictures/iconlogo.png') }}">
</head>
<body>
  
    <header>
        <a href="{{ url('index') }}"> <h1>PROMOPLAST SAS</h1></a>
        <h1>REGISTRO</h1>
    </header>
  <section class="form-register">
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <img class="imglogin" src="{{ asset('PICTURES/logo.png') }}" alt="Esta imagen no se puede visualizar">
      <h4>Formulario Registro</h4>
      
      <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

        <div class="col-md-6 controls">
            <input id="name" type="text" class="form-control controls @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control controls @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control controls @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control controls" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Registrearse') }}
            </button>
        </div>
    </div>
    <input type="checkbox" name="" id="">
      <p>Estoy de acuerdo con <a href="{{ url('term_cond.html') }}">Terminos y Condiciones</a></p>
      
      <p><a href="{{ url('login') }}">¿Ya tengo Cuenta?</a></p>
    </form>    
  </section>  
</body>
</html>
