<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Marca</title>
</head>

<body>
    <form action="{{ url('marcas/editar') }}" method="POST">
        @csrf
        <!-- campo oculto passando o ID como parâmetro no request -->
        <input type="hidden" name="id" value="{{ $marca['id'] }}">
        <label>Nome:</label><br> <!-- valor preenchido -->
        <input name="nome" type="text" value="{{ $marca['nome'] }}" /><br>
        <input type="submit" value="Salvar" />
    </form>
</body>

</html>