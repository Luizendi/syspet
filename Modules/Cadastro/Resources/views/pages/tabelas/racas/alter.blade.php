@extends('cadastro::layouts.app', ['activePage' => 'racas', 'titlePage' => 'Editar Raça'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card ">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">alt_route</i>
                            </div>
                            <h4 class="card-title">Editar Raça</h4>
                        </div>
                        <form id="formCadastro">
                            @csrf
                            @method("POST")
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-floating">Nome</label>
                                            <input type="text" name="Nome" class="form-control" id="nome"
                                                value="{{ $raca->nome }}" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="Especie" id="especie" class="form-control selectpicker"
                                                data-style="btn-primary" data-live-search="true">
                                                @forelse ($especies as $item)
                                                    <option value="{{ $item->cd_especie }}"
                                                        {{ $raca->fk_especie == $item->cd_especie ? 'selected' : '' }}>
                                                        {{ $item->nome }}</option>
                                                @empty
                                                    <option disabled>Não existe nenhuma espécie cadastrada</option>
                                                @endforelse
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
                                <a href="{{ route('racas.index') }}" class="btn btn-fill btn-secondary">Cancelar</a>
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
                    url: "#",
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
                                    "{{ route('racas.index') }}";
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
