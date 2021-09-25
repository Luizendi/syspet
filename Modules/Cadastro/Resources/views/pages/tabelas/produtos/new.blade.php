@extends('cadastro::layouts.app', ['activePage' => 'produtos', 'titlePage' => __('Novo Produto')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card ">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h4 class="card-title">Novo Produto</h4>
                    </div>
                    <form id="formCadastroProduto">
                        @csrf
                        @method("POST")
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="bmd-label-floating">Produto</label>
                                        <input type="text" name="Nome" class="form-control" id="nome" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <button id="btnSalvar" class="btn btn-fill btn-primary">Cadastrar<div class="ripple-container">
                                </div>
                            </button>
                            <a href="{{ route('produtos.index') }}" class="btn btn-fill btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card ">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h4 class="card-title">Embalagens</h4>
                    </div>
                    <form id="formCadastroProduto">
                        @csrf
                        @method("POST")
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="bmd-label-floating">Embalagem</label>
                                        <input type="text" name="Nome" class="form-control" id="nome" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <button id="btnSalvar" class="btn btn-fill btn-primary">Cadastrar<div class="ripple-container">
                                </div>
                            </button>
                            <a href="{{ route('produtos.index') }}" class="btn btn-fill btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $("#formCadastroProduto").submit(function(e) {
            e.preventDefault();

            var form = $(this);

            $.ajax({
                url: "{{ route('produtos.insert') }}",
                type: "POST",
                data: form.serialize(),
                dataType: "JSON",
                beforeSend: function() {
                    $("#btnSalvar").html("Salvando...");
                    $("#btnSalvar").prop("disabled", true);
                },
                success: function(data) {
                    if (data === "SUCCESS") {
                        swal("Cadastro realizado!", "Novo registro inserido com sucesso",
                            "success").then((value) => {
                            window.location.href =
                                "{{ route('produtos.index') }}";
                            $("#btnSalvar").html("Salvar");
                            $("#btnSalvar").prop("disabled", false);
                        });
                    } else {
                        swal("Erro", "Ocorreu um erro, tente novamente mais tarde",
                            "error").then((value) => {
                            $("#btnSalvar").html("Salvar");
                            $("#btnSalvar").prop("disabled", false);
                        });
                    }
                },
                error: function() {
                    swal("Erro", "Ocorreu um erro, tente novamente mais tarde",
                        "error").then((value) => {
                        $("#btnSalvar").html("Salvar");
                        $("#btnSalvar").prop("disabled", false);
                    });
                }
            });
        });
    });
</script>
@endpush