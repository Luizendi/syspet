@extends('cadastro::layouts.app', ['activePage' => 'agendas', 'titlePage' => 'Nova Agenda'])

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
                            <h4 class="card-title">Nova Agenda</h4>
                        </div>
                        <form id="formCadastro">
                            @csrf
                            @method("POST")
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-floating">Nome</label>
                                            <input type="text" name="Nome" class="form-control" id="nome" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="Responsavel" id="responsavel" class="form-control selectpicker"
                                                data-style="btn btn-primary">
                                                @forelse ($usuarios as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @empty
                                                    <option disabled>Nenhum registro encontrado</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <h4>Dias de atendimento <button type="button" class="btn btn-link btn-primary"
                                                data-container="body" data-toggle="popover" data-placement="right"
                                                data-original-title="Dias de Atendimento"
                                                data-content="Selecione os dias da semana que corresponde a agenda"><i
                                                    class="material-icons">help</i></button></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" name="Dom">
                                                    <span class="toggle"></span>
                                                    Dom
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" name="Seg">
                                                    <span class="toggle"></span>
                                                    Seg
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" name="Ter">
                                                    <span class="toggle"></span>
                                                    Ter
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" name="Qua">
                                                    <span class="toggle"></span>
                                                    Qua
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" name="Qui">
                                                    <span class="toggle"></span>
                                                    Qui
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" name="Sex">
                                                    <span class="toggle"></span>
                                                    Sex
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="togglebutton">
                                                <label>
                                                    <input type="checkbox" name="Sab">
                                                    <span class="toggle"></span>
                                                    S??b
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <h4>Hor??rios de atendimento <button type="button" class="btn btn-link btn-primary"
                                                data-container="body" data-toggle="popover" data-placement="right"
                                                data-original-title="Hor??rios de Atendimento"
                                                data-content="Selecione o hor??rio inicial e hor??rio final para cada dia que foi setado."><i
                                                    class="material-icons">help</i></button></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-static">Data de In??cio</label>
                                            <input type="date" class="form-control" name="DataInicio"
                                                id="dataInicio">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-static">Data Final</label>
                                            <input type="date" class="form-control" name="DataFinal"
                                                id="dataFinal">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-static">Hor??rio de In??cio</label>
                                            <input type="text" class="form-control timepicker" name="HorarioInicio"
                                                id="horarioInicio">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-static">Hor??rio Final</label>
                                            <input type="text" class="form-control timepicker" name="HorarioFinal"
                                                id="horarioFinal">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <h4>Tempo m??dio de consulta <button type="button" class="btn btn-link btn-primary"
                                                data-container="body" data-toggle="popover" data-placement="right"
                                                data-original-title="Tempo m??dio de consulta"
                                                data-content="Defina um tempo m??dio de consulta para que seja criado os hor??rios da agenda."><i
                                                    class="material-icons">help</i></button></h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-static">Tempo de Consulta</label>
                                            <input type="text" class="form-control timepickerHorarios" name="TempoConsulta"
                                                id="tempoConsulta">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select name="Ativo" id="ativo" class="form-control selectpicker"
                                                data-style="btn btn-primary">
                                                <option selected disabled>Situa????o da Agenda</option>
                                                <option value="S">Ativo</option>
                                                <option value="N">Inativo</option>
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
                                <a href="{{ route('agendas.index') }}" class="btn btn-fill btn-secondary">Cancelar</a>
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
                    url: "{{ route('agendas.insert') }}",
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
                                    "{{ route('agendas.index') }}";
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