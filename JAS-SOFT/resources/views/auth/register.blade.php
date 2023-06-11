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
        <a href="{{ url('index') }}"> <h2>PROMOPLAST SAS</h2></a>
        <h2>REGISTRO</h2>
    </header>
  <section class="form-register">
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <img class="imglogin" src="{{ asset('PICTURES/logo.png') }}" alt="Esta imagen no se puede visualizar">
      <h4>Formulario Registro</h4>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

        <div class="col-md-6">
            <input id="name" type="name" class="form-control controls @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

            @error('name')
            <div class="error-message">
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            </div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control controls @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <div class="error-message">
                <span class="invalid-feedback" role="alert">
                    <strong>El email ya esta registrado</strong>
                </span>
            </div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control controls @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
            <div class="error-message">
                <span class="invalid-feedback" role="alert">
                    <strong>La contraseña debe contener al menos 8 caracteres</strong>
                </span>
            </div>
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
                {{ __('Registrarse') }}
            </button>
        </div>
    </div>
    <div class="row mb-3">
    <div class="col-md-6 offset-md-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="" id="">
            <label class="form-check-label" for="">Estoy de acuerdo con <a href="{{ url('term_cond.html') }}">Términos y Condiciones</a></label>
        </div>
    </div>
</div>
      <p><a href="{{ url('login') }}">¿Ya tengo Cuenta?</a></p>
    </form>    
  </section>  
</body>
</html>
