<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carro</title>
</head>

<body>
    <form action="{{ url('carros/editar') }}" method="POST">
        @csrf
        <!-- campo oculto passando o ID como parâmetro no request -->
        <input type="hidden" name="id" value="{{ $carro['id'] }}">
        <label>Modelo:</label><br> <!-- valor preenchido -->
        <input name="modelo" type="text" value="{{ $carro['modelo'] }}" /><br>
        <label>Marca:</label><br> <!-- valor preenchido -->
        <input name="marca_id" type="text" value="{{ $carro['marca_id'] }}" /><br>
        <label>Placa:</label><br> <!-- valor preenchido -->
        <input name="placa" type="text" value="{{ $carro['placa'] }}" /><br>
        <label>Ano:</label><br> <!-- valor preenchido -->
        <input name="ano" type="text" value="{{ $carro['ano'] }}" /><br>
        <input type="submit" value="Salvar" />
    </form>
</body>

</html>