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
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card ">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">list</i>
                            </div>
                            <h4 class="card-title">Embalagens do Produto</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop" disabled><i class="material-icons">add</i>
                                    Novo
                                </button>
                                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Embalagem do Produto</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary">Salvar</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="material-datatables col-sm-12">
                                <table id="table" class="table table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <thead class="text-primary">
                                        <tr>
                                            <th class="text-center">Embalagem</th>
                                            <th class="text-center">Quantidade</th>
                                            <th class="text-center">Menor Controle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($embalagens as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->nome }}</td>
                                            <td class="text-center">{{ $item->sigla }}</td>
                                            <td class="text-center"><span class="badge badge-{{ $item->ativo == 'S' ? 'primary' : 'danger' }}">{{ $item->ativo == 'S' ? 'Sim' : 'Não' }}</span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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