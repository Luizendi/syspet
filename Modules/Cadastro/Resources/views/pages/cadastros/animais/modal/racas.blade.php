<div class="modal fade bd-racas-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Raças</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="toolbar">
                    <a href="#" class="btn btn-primary"><i class="material-icons">person</i> Nova raça</a>
                </div>
                <div class="material-datatables">
                    <table id="tablePacientes" class="table table-no-bordered table-hover" cellspacing="0" width="100%"
                        style="width:100%">
                        <thead class="text-primary">
                            <tr>
                                <th class="text-center">Código</th>
                                <th class="text-center">Raça</th>
                                <th class="text-center">Espécie</th>
                                <th class="disabled-sorting text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($racas as $item)
                                <tr>
                                    <td class="text-center">{{ $item->cd_raca }}</td>
                                    <td class="text-center">{{ $item->nome }}</td>
                                    <td class="text-center">{{ $item->especie }}</td>
                                    <td class="text-right"><a href="#"
                                            class="btn btn-link btn-success btn-just-icon confirm" data-toggle="tooltip"
                                            data-placement="bottom"
                                            onclick="selecionarRaca({{ $item->cd_raca }}, '{{ $item->nome }}')"
                                            title="Selecionar Paciente"><i class="material-icons">done</i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
