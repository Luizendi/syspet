@extends('cadastro::layouts.app', ['activePage' => 'pessoa', 'titlePage' => __('')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4>
                    <div class="card-title"><strong>Cliente</Strong></div>
                </h4>
                <div class="card-category">Cadastro de Cliente</div>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Nome/Razão Social</label>
                            <input type="text" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">CPF/CNPJ</label>
                            <input type="text" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">RG/IE</label>
                            <input type="text" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Endereço</label>
                            <input type="text" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">CEP</label>
                            <input type="text" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Cidade</label>
                            <input type="text" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Estado</label>
                            <input type="text" class="form-control" id="inputEmail4">
                        </div>

                    </div>
                </form>
                <div class="card-footer">
                    <input class="btn btn-primary ml-auto mr-auto" type="button" value="Cancelar">
                    <input class="btn btn-primary ml-auto mr-auto" type="button" value="Salvar">
                </div>
            </div>

        </div>
    </div>
</div>
@endsection