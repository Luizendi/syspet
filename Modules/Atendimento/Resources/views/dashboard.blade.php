@extends('atendimento::layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <h3>Módulo de Atendimentos</h3>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">event</i>
                            </div>
                            <p class="card-category">Agendamentos</p>
                            <h3 class="card-title">{{ $agendamentos }}</h3>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">schedule</i>
                            </div>
                            <p class="card-category">Horários Disponíveis</p>
                            <h3 class="card-title">{{ $quantidadesAtendimentoDia }}</h3>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">date_range</i>
                            </div>
                            <p class="card-category">Agendamentos do dia</p>
                            <h3 class="card-title">{{ $quantidadesAtendimentoDia }}</h3>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">emoji_people</i>
                            </div>
                            <p class="card-category">Horários Confirmados</p>
                            <h3 class="card-title">{{ $agendamentosConfirmados }}</h3>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-header card-header-icon card-header-success">
                        <div class="card-icon">
                            <i class="material-icons">schedule</i>
                        </div>
                        <h4 class="card-title ">Agendamentos do dia</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">

                        </div>
                        <div class="material-datatables">
                            <table id="table" class="table table-no-bordered table-hover" cellspacing="0" width="100%"
                                style="width:100%">
                                <thead class="text-success">
                                    <tr>
                                        <th class="text-center">Código</th>
                                        <th class="text-center">Nome Tutor</th>
                                        <th class="text-center">Nome Animal</th>
                                        <th class="text-center">Horário</th>
                                        <th class="text-center">Situação</th>
                                        <th class="disabled-sorting text-right">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agendamentosDia as $item)
                                        @if ($item->confirmado == 'S')
                                            {{ $Classe = 'primary' }}
                                            {{ $Confirmacao = 'Confirmado' }}
                                        @endif
                                        @if ($item->confirmado == 'N')
                                            {{ $Classe = 'secondary' }}
                                            {{ $Confirmacao = 'Aguardando Confirmação' }}
                                        @endif
                                        @if ($item->confirmado == 'F')
                                            {{ $Classe = 'danger' }}
                                            {{ $Confirmacao = 'Não comparecerá' }}
                                        @endif
                                        <tr>
                                            <td class="text-center">{{ $item->cd_agendamento }}</td>
                                            <td class="text-center">{{ $item->cliente }}</td>
                                            <td class="text-center">{{ $item->animal }}</td>
                                            <td class="text-center">{{ date('H:i', strtotime($item->hora)) }}</td>
                                            <td class="text-center"><span
                                                    class="badge badge-{{ $Classe }}">{{ $Confirmacao }}</span>
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('agendas.edit', $item->cd_agendamento) }}"
                                                    class="btn btn-link btn-success btn-just-icon" data-toggle="tooltip"
                                                    data-placement="bottom" title="Atender"><i
                                                        class="material-icons">edit</i></a>
                                            </td>
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
@endsection
