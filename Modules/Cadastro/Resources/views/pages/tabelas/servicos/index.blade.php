@extends('cadastro::layouts.app', ['activePage' => 'servicos', 'titlePage' => 'servicos'])

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header card-header-icon card-header-primary">
                <div class="card-icon">
                    <i class="material-icons">home</i>
                </div>
                <h4 class="card-title ">Lista de Serviços</h4>
            </div>
            <div class="card-body">
                <div class="toolbar">
                    <a href="{{ route('servicos.new') }}" class="btn btn-primary"><i class="material-icons">add</i>
                        Novo</a>
                </div>
                <div class="material-datatables">
                    <table id="table" class="table table-no-bordered table-hover" cellspacing="0" width="100%"
                        style="width:100%">
                        <thead class="text-primary">
                            <tr>
                                <th class="text-center">Código</th>
                                <th class="text-center">Serviço</th>
                                <th class="text-center">Sexo</th>
                                <th class="text-center">Porte</th>
                                <th class="text-center">Situação</th>
                                <th class="disabled-sorting text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($servicos as $item)
                                <tr>
                                    <td class="text-center">{{ $item->cd_servico }}</td>
                                    <td class="text-center">{{ $item->nome }}</td>
                                    <td class="text-center">{{ $item->sexo == 'F' ? 'FÊMEA' : 'MACHO' }}</td>
                                    <td class="text-center">{{ $item->porte }}</td>
                                    <td class="text-center"><span
                                            class="badge badge-{{ $item->ativo == 'S' ? 'primary' : 'danger' }}">{{ $item->ativo == 'S' ? 'Ativo' : 'Inativo' }}</span>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('servicos.edit', $item->cd_servico) }}"
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
