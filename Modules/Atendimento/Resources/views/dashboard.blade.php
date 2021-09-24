@extends('atendimento::layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <h3>Módulo de Atendimentos</h3>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
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
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">schedule</i>
                            </div>
                            <p class="card-category">Horários Disponíveis</p>
                            <h3 class="card-title">{{ $horariosvagos }}</h3>
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
                                        <th class="text-center">Situação</th>
                                        <th class="disabled-sorting text-right">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($AgendamentosDia as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->cd_agendamento }}</td>
                                            <td class="text-center">{{ $item->cliente }}</td>
                                            <td class="text-center">{{ $item->animal }}</td>
                                            <td class="text-center">{{ $item->confirmado }}</td>
                                            <td class="text-right">{{ $item->cd_horario }}</td>
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
