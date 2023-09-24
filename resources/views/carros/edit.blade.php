<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carro</title>
    <!-- Inclua o link para o arquivo CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-3">Editar Carro</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Problemas com seus dados:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ url('carros/editar/' . $carro['id']) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="modelo">Modelo:</label>
                <input name="modelo" type="text" class="form-control" value="{{ $carro['modelo'] }}" />
            </div>

            <div class="form-group">
                <label for="marca_id">Marca:</label>
                <select name="marca_id" class="form-control">
                    @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}" @if($carro->marca_id == $marca->id) selected @endif>{{ $marca->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="placa">Placa:</label>
                <input name="placa" type="text" class="form-control" value="{{ $carro['placa'] }}" />
            </div>

            <div class="form-group">
                <label for="ano">Ano:</label>
                <input name="ano" type="text" class="form-control" value="{{ $carro['ano'] }}" />
            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
            <a class="btn btn-secondary" href="{{ url('/carros') }}">Voltar</a>
        </form>
    </div>
    
    <!-- Inclua o link para o arquivo JavaScript do Bootstrap, se necessário -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
