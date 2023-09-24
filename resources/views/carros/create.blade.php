@extends('crud_template')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Cadastro de carros</h2>
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

        <div class="row">
            <form action="{{ url('carros/novo') }}" method="POST">
                @csrf
                <div class="row">
                    <strong>Modelo:</strong>
                    <input placeholder="Digite o nome" class="form-control mb-3" name="modelo" type="text" />
                    <strong>Marca:</strong>
                    <select class="form-control mb-3" name="marca_id">
                        <option value="">Selecione a marca</option>
                        @foreach($marcas as $marca)
                        <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                        @endforeach
                    </select>

                    <strong>Placa:</strong>
                    <input placeholder="Digite a placa" class="form-control mb-3" name="placa" type="text" />
                    <strong>Ano:</strong>
                    <input placeholder="Digite o ano do carro" class="form-control mb-3" name="ano" type="text" />

                    <div class="col">
                        <a class="btn btn-secondary" href="{{ url('/carros') }}">Voltar</a>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary" type="submit">Salvar</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection