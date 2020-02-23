<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Enviando un array de datos con un formulario</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <style>
    .frame {
      position: relative;
      width: calc(100% - 60px);
      height: calc(100vh - 60px);
      margin: 30px;
      padding: 30px;
      border: 1px solid #800000;
      background-color: #fffff0;
    }

    .banner {
      position: absolute;
      left: 20px;
      bottom: 20px;
      padding: 12px 24px 6px 24px;
      border: 1px solid #c0ffc0;
      background-color: #e0ffe0;
      border-radius: 6px;
    }
  </style>

</head>
<body>
  <div class="frame">

    <div class="banner">
      <h4>Notificación al pie</h4>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Ingresa tu dirección
          </div>

          <div class="card-body">
            <form method="POST" action="{{ route('array.test') }}">
              @csrf

              <div class="form-group row">
                <label for="calle" class="col-md-4 col-form-label text-md-right">Calle</label>

                <div class="col-md-6">
                  <input id="calle" type="text" class="form-control @error('direccion.calle') is-invalid @enderror" name="direccion[calle]" value="{{ old('direccion[calle]') }}" autocomplete="calle" autofocus>

                  @error('direccion.calle')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="numero" class="col-md-4 col-form-label text-md-right">Número</label>

                <div class="col-md-6">
                  <input id="numero" type="text" class="form-control @error('direccion.numero') is-invalid @enderror" name="direccion[numero]" value="{{ old('direccion[numero]') }}" autocomplete="numero" autofocus>

                  @error('direccion.numero')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="piso" class="col-md-4 col-form-label text-md-right">Piso</label>

                <div class="col-md-6">
                  <input id="piso" type="text" class="form-control @error('direccion.piso') is-invalid @enderror" name="direccion[piso]" value="{{ old('direccion[piso]') }}" autocomplete="piso" autofocus>

                  @error('direccion.piso')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="departamento" class="col-md-4 col-form-label text-md-right">Departamento</label>

                <div class="col-md-6">
                  <input id="departamento" type="text" class="form-control @error('direccion.departamento') is-invalid @enderror" name="direccion[departamento]" value="{{ old('direccion[departamento]') }}" autocomplete="departamento" autofocus>

                  @error('direccion.departamento')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="codpost" class="col-md-4 col-form-label text-md-right">Código Postal</label>

                <div class="col-md-6">
                  <input id="codpost" type="text" class="form-control @error('direccion.codpost') is-invalid @enderror" name="direccion[codpost]" value="{{ old('direccion[codpost]') }}" autocomplete="codpost" autofocus>

                  @error('direccion.codpost')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <button class="btn btn-primary" type="submit">
                    Enviar
                  </button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>