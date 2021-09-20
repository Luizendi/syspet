@extends('cadastro::layouts.app', ['activePage' => 'animais', 'titlePage' => 'Novo Animal'])

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
                            <h4 class="card-title">Novo animal</h4>
                        </div>
                        <form id="formCadastro">
                            @csrf
                            @method("POST")
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-static">Código Cliente</label>
                                            <input type="text" name="CodigoCliente" id="idCliente" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label class="bmd-label-static" for="">Cliente</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="NomeCliente"
                                                    id="nomeCliente" />
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-fab btn-round btn-primary"
                                                        data-toggle="modal" data-target=".bd-clientes-modal-lg">
                                                        <i class="material-icons">person</i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-static">Código Raça</label>
                                            <input type="text" name="CodigoRaca" id="idRaca" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-static" for="">Raça</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="NomeRaca"
                                                    id="nomeRaca" />
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-fab btn-round btn-primary"
                                                        data-toggle="modal" data-target=".bd-racas-modal-lg">
                                                        <i class="material-icons">person</i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-static">Espécie</label>
                                            <input type="text" name="Especie" id="especie" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-floating">Nome</label>
                                            <input type="text" name="Nome" class="form-control" id="nome" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="Porte" id="porte" class="form-control selectpicker"
                                                data-style="btn-primary">
                                                <option disabled selected>Porte</option>
                                                @forelse ($portes as $item)
                                                    <option value="{{ $item->cd_porte }}">{{ $item->nome }}</option>
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
                                <a href="{{ route('animais.index') }}" class="btn btn-fill btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('cadastro::pages.cadastros.animais.modal.clientes')
    @include('cadastro::pages.cadastros.animais.modal.racas')
@endsection

@push('js')
    <script>
        function selecionarCliente(id, nome) {
            $("#idCliente").val(id);
            $("#nomeCliente").val(nome);
            $('.bd-clientes-modal-lg').modal('hide');
        }

        $(document).ready(function() {
            $(".form-control").keyup(function() {
                $(this).val($(this).val().toUpperCase());
            });

            $("#idCliente").blur(function() {
                var idCliente = $(this).val();


                var url = '{{ route('api.clientes.unico', ':id') }}'
                url = url.replace(':id', idCliente)

                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "JSON",
                    beforeSend: function() {
                        $("#nomeCliente").val("Buscando...");
                    },
                    success: function(data) {
                        if (data === "ERROR") {
                            swal.fire("Cliente não encontrado",
                                "Verifique o código informado e tente novamente", "error");
                            $("#nomeCliente").val("");
                        } else if (data === "INACTIVE") {
                            swal.fire("Cliente inativo",
                                "O cliente selecionado está inativo, verifique o cadastro do mesmo e tente novamente",
                                "error");
                            $("#nomeCliente").val("");
                        } else {
                            $("#idCliente").val(data.cd_cliente);
                            $("#nomeCliente").val(data.nome);
                        }
                    },
                    error: function() {
                        swal.fire("Erro interno",
                            "Ocorreu um erro. Tente novamente ou comunique o suporte",
                            "error");
                        $("#nomeCliente").val("");
                    }
                });
            });

            $("#formCadastro").submit(function(e) {
                e.preventDefault();

                var form = $(this);

                $.ajax({
                    url: "{{ route('racas.insert') }}",
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
