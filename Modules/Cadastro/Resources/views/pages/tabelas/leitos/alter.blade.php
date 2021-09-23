@extends('cadastro::layouts.app', ['activePage' => 'leitos', 'titlePage' => "Novo Leito"])

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
                            <h4 class="card-title">Novo Leito</h4>
                        </div>
                        <form id="formCadastro">
                            @csrf
                            @method("PUT")
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-floating">Nome</label>
                                            <input type="text" name="Nome" class="form-control" id="nome"
                                                value="{{ $leito->nome }}" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="Porte" id="porte" class="form-control selectpicker"
                                                data-style="btn-primary">
                                                <option disabled selected>Porte</option>
                                                @forelse ($portes as $item)
                                                    <option value="{{ $item->cd_porte }}"
                                                        {{ $leito->fk_porte == $item->cd_porte ? 'selected' : '' }}>
                                                        {{ $item->nome }}</option>
                                                @empty
                                                    <option disabled>Não existe nenhuma espécie cadastrada</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select name="Isolamento" id="isolamento" class="form-control selectpicker"
                                                data-style="btn-primary">
                                                <option disabled selected>Isolamento</option>
                                                <option value="S" {{ $leito->isolamento == 'S' ? 'selected' : '' }}>SIM</option>
                                                <option value="N" {{ $leito->isolamento == 'N' ? 'selected' : '' }}>NÃO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select name="Ativo" id="ativo" class="form-control selectpicker"
                                                data-style="btn-primary">
                                                <option disabled selected>Situação</option>
                                                <option value="S" {{ $leito->ativo == 'S' ? 'selected' : '' }}>Ativo</option>
                                                <option value="N" {{ $leito->ativo == 'N' ? 'selected' : '' }}>Inativo</option>
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
                                <a href="{{ route('leitos.index') }}" class="btn btn-fill btn-secondary">Cancelar</a>
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
                    url: "{{ route('leitos.update', [$leito->cd_leito]) }}",
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
                                    "{{ route('leitos.index') }}";
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
