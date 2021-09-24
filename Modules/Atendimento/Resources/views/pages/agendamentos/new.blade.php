@extends('atendimento::layouts.app', ['activePage' => 'agendamentos', 'titlePage' => 'Novo agendamento'])

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
                            <h4 class="card-title">Novo agendamento</h4>
                        </div>
                        <form id="formCadastro">
                            @csrf
                            @method("POST")
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <h4>Agendamento para o dia
                                                <strong>{{ date('d/m/Y', strtotime($horario->data)) }}
                                                    {{ date('H:i', strtotime($horario->hora)) }}</strong>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-static">Código Animal</label>
                                            <input type="text" name="CodigoAnimal" id="idAnimal"
                                                class="form-control animal-cliente" />
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label class="bmd-label-static" for="">Animal</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control animal-cliente" name="NomeAnimal"
                                                    id="nomeAnimal" />
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-fab btn-round btn-primary"
                                                        data-toggle="modal" data-target=".bd-animais-modal-lg">
                                                        <i class="material-icons">pets</i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-static">Código Tutor</label>
                                            <input type="text" id="idCliente" class="form-control animal-cliente" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-static">Nome Tutor</label>
                                            <input type="text" id="nomeCliente" class="form-control animal-cliente"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-static">Telefone Tutor</label>
                                            <input type="text" id="telefoneCliente" class="form-control animal-cliente"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-static">CPF Tutor</label>
                                            <input type="text" id="cpfCliente" class="form-control animal-cliente" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Serviço</label>
                                            <select name="Servico" id="servico" class="form-control selectpicker"
                                                data-style="btn-primary">
                                                @forelse ($servicos as $item)
                                                    <option value="{{ $item->cd_servico }}">{{ $item->nome }}</option>
                                                @empty
                                                    <option disabled>Nenhum item cadastrado</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-floating">Descrição</label>
                                            <textarea name="Descricao" class="form-control" id="descricao" cols="30"
                                                rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button id="btnSalvar" class="btn btn-fill btn-primary">Cadastrar<div
                                        class="ripple-container">
                                    </div>
                                </button>
                                <a href="{{ route('agendamentos.index') }}"
                                    class="btn btn-fill btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('atendimento::pages.agendamentos.modal.animais')
@endsection

@push('js')
    <script>
        $(document).ready(function() {

            $("#idAnimal").blur(function() {
                var idAnimal = $("#idAnimal").val();
                retornaAnimal(idAnimal);
            });

            $("#formCadastro").submit(function(e) {
                e.preventDefault();

                var form = $(this);
                var data = form.serializeArray();
                data.push({
                    name: "Horario",
                    value: "{{ $horario->cd_horario }}"
                });

                $.ajax({
                    url: "{{ route('agendamentos.insert') }}",
                    type: "POST",
                    data: $.param(data),
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
                                    "{{ route('agendamentos.index') }}";
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
        var retornaAnimal = function(idAnimal) {
            var url = "{{ route('api.animais.unico', ':id') }}"
            url = url.replace(':id', idAnimal);

            $.ajax({
                url: url,
                type: "GET",
                dataType: "JSON",
                beforeSend: function() {
                    $(".animal-cliente").val("BUSCANDO...");
                },
                success: function(data) {
                    if (data === "INACTIVE") {
                        swal.fire("Animal inativo no sistema",
                            "O cadastro do animal e/ou cliente estão inativo no sistema, verifique o cadastro e tente novamente",
                            "error");
                        $(".animal-cliente").val("");
                    } else if (data === "ERROR") {
                        swal.fire("Animal não encontrado",
                            "Verifique o código informado e tente novamente", "error");
                        $(".animal-cliente").val("");
                    } else if (data === "OBITO") {
                        swal.fire("Óbito",
                            "Animal sinalizado com óbito no sitema, verifique o cadastro do mesmo",
                            "error");
                        $(".animal-cliente").val("");
                    } else {
                        $("#idAnimal").val(data.cd_animal);
                        $("#nomeAnimal").val(data.nome);

                        $("#idCliente").val(data.cd_cliente);
                        $("#nomeCliente").val(data.cliente);
                        $("#telefoneCliente").val(data.celular);
                        $("#cpfCliente").val(data.cnpjcpf);
                    }
                },
                error: function() {
                    swal.fire("Animal não encontrado",
                        "Verifique o código informado e tente novamente", "error");
                    $(".animal-cliente").val("");
                }
            });
        }
    </script>
@endpush
