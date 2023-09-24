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
                    <li>{{ $error }}</li>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <form action="{{ url('/login') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input class="form-control mb-3" type="email" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input class="form-control mb-3" type="password" name="password" id="password">
            </div>
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Entrar</button>
            </div>
        </form>
    </div>
</div>
@endsection
