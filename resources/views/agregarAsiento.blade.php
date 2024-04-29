<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vuelos</title>
</head>
<body>
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Agregar asiento a vuelo</h2>
                <br>
                <form action="{{ route('asientos.guardar') }}" method="post">
                    @method('post')
                    @csrf
                    <div class="form-group">
                        <label for="metros">N&uacute;mero Vuelo</label>
                        <input name="numeroVuelo" type="text"class="form-control" value = "{{ $vuelo->numeroVuelo }}" readonly/>
                    </div>

                    <div class="form-group">
                        <label for="metros">Fecha Vuelo</label>
                        <input name='fecha' type="text"class="form-control" value="{{ $vuelo->fechasalida }}" readonly/>
                    </div>


                    <div class="form-group">
                        <label for="color">Numero Asiento:</label>
                        <input name="numeroAsiento" type="text" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="color">Id Tipo Asiento:</label>
                        <input name="idAsiento" type="text" class="form-control" />
                    </div>
                    
                    <br>
                    <div class="form-group">
                        <a class="btn btn-warning" href="{{ route('vuelos') }}">Volver</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>