@extends('cadastro::layouts.app', ['activePage' => 'tipoalta', 'titlePage' => 'Novo Tipo de Alta'])

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
                            <h4 class="card-title">Novo Tipo de Alta</h4>
                        </div>
                        <form id="formCadastro">
                            @csrf
                            @method("PUT")
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-floating">Nome</label>
                                            <input type="text" name="Nome" class="form-control" id="nome"
                                                value="{{ $tipoalta->nome }}" required />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" name="Obito"
                                                        {{ $tipoalta->obito == 'S' ? 'checked' : '' }}>
                                                    <span class="toggle"></span>
                                                    Óbito
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select name="Ativo" id="ativo" class="form-control selectpicker"
                                                data-style="btn-primary">
                                                <option value="S" {{ $tipoalta->ativo == 'S' ? 'selected' : '' }}>Ativo
                                                </option>
                                                <option value="N" {{ $tipoalta->ativo == 'N' ? 'selected' : '' }}>Inativo
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button id="btnSalvar" class="btn btn-fill btn-primary">Cadastrar<div
                                        class="ripple-container">
                                    </div>
                                </button>
                                <a href="{{ route('tiposaltas.index') }}" class="btn btn-fill btn-secondary">Cancelar</a>
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
            $("#formCadastro").submit(function(e) {
                e.preventDefault();

                var form = $(this);

                $.ajax({
                    url: "{{ route('tiposaltas.update', [$tipoalta->cd_alta]) }}",
                    type: "POST",
                    data: form.serialize(),
                    dataType: "JSON",
                    beforeSend: function() {
                        $("#btnSalvar").html("Salvando...");
                        $("#btnSalvar").prop("disabled", true);
                    },
                    success: function(data) {
                        if (data === "SUCCESS") {
                            swal("Registro alterado!", "Alteração realizada com sucesso.",
                                "success").then((value) => {
                                window.location.href =
                                    "{{ route('tiposaltas.index') }}";
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
