@extends('cadastro::layouts.app', ['activePage' => 'pessoa', 'titlePage' => __('')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4>
                    <div class="card-title"><strong>Pessoa</Strong></div>
                </h4>
                <div class="card-category">Cadastro de Pessoa</div>
            </div>
            <div class="card-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Insira nome ou razão social" aria-label="Insira nome ou razão social" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Insira CPF ou CNPJ" aria-label="Insira CPF ou CNPJ" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="card-footer">
                <input class="btn btn-primary ml-auto mr-auto" type="button" value="Salvar">
            </div>
        </div>
    </div>
</div>
@endsection