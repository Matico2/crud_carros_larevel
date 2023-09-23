@extends('crud_template')
@section('content')
<div class="card">
    <div class="card-header text-center">
        <h2>Login</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Problemas com seus dados:</strong>
                    <br>
                    @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <form action="{{ url('/login') }}" method="post">
            @csrf
            <strong>Email</strong>
            <input class="form-control mb-3" type="email" name="email" id="email">
            <strong>Senha</strong>
            <input class="form-control mb-3" type="password" name="password" id="password">
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Entrar</button>
            </div>
        </form>
    </div>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>