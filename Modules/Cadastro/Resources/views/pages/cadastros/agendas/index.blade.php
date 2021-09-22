@extends('cadastro::layouts.app', ['activePage' => 'agendas', 'titlePage' => 'Agendas'])

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header card-header-icon card-header-primary">
                <div class="card-icon">
                    <i class="material-icons">home</i>
                </div>
                <h4 class="card-title ">Lista de Agendas</h4>
            </div>
            <div class="card-body">
                <div class="toolbar">
                    <a href="{{ route('agendas.new') }}" class="btn btn-primary"><i class="material-icons">add</i>
                        Novo</a>
                </div>
                <div class="material-datatables">
                    <table id="table" class="table table-no-bordered table-hover" cellspacing="0" width="100%"
                        style="width:100%">
                        <thead class="text-primary">
                            <tr>
                                <th class="text-center">Código</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Situação</th>
                                <th class="disabled-sorting text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agendas as $item)
                                <tr>
                                    <td class="text-center">{{ $item->cd_agenda }}</td>
                                    <td class="text-center">{{ $item->nome }}</td>
                                    <td class="text-center"><span
                                            class="badge badge-{{ $item->ativo == 'S' ? 'primary' : 'danger' }}">{{ $item->ativo == 'S' ? 'Ativo' : 'Inativo' }}</span>
                                    </td>
                                    <td class="text-right">
                                        @if ($item->ativo == 'S')
                                            <a href="#" onclick="gerarHorarios({{ $item->cd_agenda }})"
                                                class="btn btn-link btn-primary btn-just-icon" data-toggle="tooltip"
                                                data-placement="bottom" title="Gerar Horários"><i
                                                    class="material-icons">today</i></a>
                                        @endif
                                        <a href="{{ route('agendas.edit', $item->cd_agenda) }}"
                                            class="btn btn-link btn-warning btn-just-icon" data-toggle="tooltip"
                                            data-placement="bottom" title="Editar"><i class="material-icons">edit</i></a>
                                        <a href="#" class="btn btn-link btn-danger btn-just-icon" data-toggle="tooltip"
                                            data-placement="bottom" title="Excluir"><i class="material-icons">delete</i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            gerarHorarios = function(id) {
                $.ajax({
                    url: "{{ route('horarios.insert') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        Agenda: id
                    },
                    dataType: "JSON",
                    beforeSend: function() {

                    },
                    success: function(data) {
                        if (data === "INACTIVE") {
                            swal.fire("Agenda inativo",
                                "A agenda está inativa, verifique o cadastro da mesma e tente novamente",
                                "error");
                        } else if (data === "DUPLICATE") {
                            swal.fire("Horários gerados",
                                "Os horários para esta agenda já foram criados",
                                "error");
                        } else {
                            swal.fire("Horários criados",
                                "Os horários foram gerados para a agenda selecionada.",
                                "success");
                        }
                    },
                    error: function() {

                    }
                })
            }
        });
    </script>
@endpush
