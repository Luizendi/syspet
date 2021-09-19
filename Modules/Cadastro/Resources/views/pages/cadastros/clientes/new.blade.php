@extends('cadastro::layouts.app', ['activePage' => 'clientes', 'titlePage' => __('Novo Cliente')])

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
                        <h4 class="card-title">Novo Cliente</h4>
                    </div>
                    <form id="formCadastroCliente">
                        @csrf
                        @method("POST")
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="bmd-label-floating">Nome</label>
                                        <input type="text" name="Nome" class="form-control" id="nome" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="bmd-label-floating">CPF/CNPJ</label>
                                        <input type="text" name="CnpjCpf" class="form-control" id="cnpjcpf" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="bmd-label-floating">RG/IE</label>
                                        <input type="text" name="IeRg" class="form-control" id="ierg" required />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="bmd-label-floating">Endereço</label>
                                        <input type="text" name="Endereco" class="form-control" id="endereco" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="bmd-label-floating">CEP</label>
                                        <input type="text" name="CEP" class="form-control" id="cep" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="bmd-label-floating">Cidade</label>
                                        <input type="text" name="Cidade" class="form-control" id="Cidade" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="bmd-label-floating">Estado</label>
                                        <input type="text" name="Estado" class="form-control" id="estado" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <button id="btnSalvar" class="btn btn-fill btn-primary">Cadastrar<div class="ripple-container">
                                </div>
                            </button>
                            <a href="{{ route('clientes.index') }}" class="btn btn-fill btn-secondary">Cancelar</a>
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
        $(".form-control").keyup(function() {
            $(this).val($(this).val().toUpperCase());
        });

        $("#formCadastroCliente").submit(function(e) {
            e.preventDefault();

            var form = $(this);

            $.ajax({
                url: "{{ route('clientes.insert') }}",
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
                                "{{ route('clientes.index') }}";
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