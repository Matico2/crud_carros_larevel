<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Marca</title>
    <!-- Inclua o link para o arquivo CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-3">Editar Marca</h2>
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

        <form action="{{ url('marcas/editar/' . $marca['id']) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input name="nome" type="text" class="form-control" value="{{ $marca['nome'] }}" />
            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
            <a class="btn btn-secondary" href="{{ url('/marcas') }}">Voltar</a>
        </form>
    </div>
    
    <!-- Inclua o link para o arquivo JavaScript do Bootstrap, se necessário -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min
