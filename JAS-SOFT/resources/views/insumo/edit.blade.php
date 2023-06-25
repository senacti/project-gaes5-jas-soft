<link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('css/Style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/Header.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/editar.css') }}">
<link rel="stylesheet" href="{{ asset('css/estilos-dash-admin.css') }}">

<form action="{{ route('insumo.actualizarinsumo') }}" method="post">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="form-floating mb-3 mt-3">
                <input type="hidden" class="form-control" id="idinsumo" placeholder="Nombre Insumo" name="idinsumo"
                    required value="{{ $insumos->IdInsumo }}">
            </div>
            <div class="form-floating mt-3 mb-3 col-4">
                <input type="text" required class="form-control" id="Cantidad" placeholder="Cantidad"
                    name="Cantidad" maxlength="9" value="{{ $insumos->Cantidad }}">
                <label for="Cantidad">Cantidad</label>
            </div>

            {{-- <div class="form-floating mt-3 mb-3 col-4">
          <select class="form-select" id="Unidadmedida" name="Unidadmedida" required value="{{$insumos->Unidadmedida}}">
            <option value="1">Kg</option>
            <option value="2">Gr</option>                              
          </select>
          <label for="sel1" class="form-label">Unidad</label>
        </div> --}}

            <div class="form-floating mt-3 mb-3 col-4">
                <select class="form-select" class="form-control" id="Color" placeholder="Color" name="Color"
                    required value="{{ $insumos->Color }}">
                    <option value="1">Rojo</option>
                    <option value="2">Verde</option>
                    <option value="3">Azul</option>
                    <option value="4">Amarillo</option>
                    <option value="4">Negro</option>
                </select>
                <label for="Color">Color</label>
            </div>

            {{-- <div class="form-floating mt-3 mb-3 col-6">
          <input type="text" class="form-control" id="Tamaño" placeholder="Tamaño" name="Tamaño" required value="{{$insumos->Tamaño}}">
          <label for="Tamaño">Tamaño</label>
        </div> --}}
        </div>
        <button type="submit">Guardar</button>
    </div>
</form>
