<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Controle de Carros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <header class="p-4 bg-primary text-white text-center">
        <h1>Sistema de Controle de Carros</h1>
    </header>

    <div class="container mt-4">
        <div class="row">
            <div class="col-3">
                <div class="offcanvas offcanvas-start" tabindex="-1" id="menu">
                    <div class="offcanvas-header">
                        <h5>Cadastros</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>
                    <div class="offcanvas-body">
                        <a class="btn btn-primary btn-lg btn-block mb-2" href="{{ url('/carros') }}">
                            <i class="bi bi-box"></i> Cadastro de Carros
                        </a>
                        <a class="btn btn-primary btn-lg btn-block" href="{{ url('/marcas') }}">
                            <i class="bi bi-tag"></i> Cadastro de Marcas
                        </a>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <h3>Bem-vindo</h3>
                <a role="button" data-bs-toggle="offcanvas" class="btn btn-primary" href="#menu">
                    Começar
                </a>
                <a class="btn btn-secondary" href="{{ url('/logout') }}">Logout</a>
            </div>

            <div class="text-center mt-4">
                <p>Número de entradas de Carros: <span id="carCount">0</span></p>
                <button class="btn btn-success" onclick="entradaCarro()">Carro Entrando</button>
                <button class="btn btn-danger" onclick="saidaCarro()">Carro Saindo</button>
            </div>
        </div>
    </div>

    <script>
        let carros = 0;

        function entradaCarro() {
            carros++;
            atualizarContador();
        }

        function saidaCarro() {
            if (carros > 0) {
                carros--;
                atualizarContador();
            }
        }

        function atualizarContador() {
            document.getElementById('carCount').textContent = carros;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>
