<div class="modal fade bd-clientes-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Clientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="toolbar">
                    <a href="#" class="btn btn-primary"><i class="material-icons">person</i> Novo cliente</a>
                </div>
                <div class="material-datatables">
                    <table id="table" class="table table-no-bordered table-hover" cellspacing="0" width="100%"
                        style="width:100%">
                        <thead class="text-primary">
                            <tr>
                                <th class="text-center">Código</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">CPF / CNPJ</th>
                                <th class="disabled-sorting text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $item)
                                <tr>
                                    <td class="text-center">{{ $item->cd_cliente }}</td>
                                    <td class="text-center">{{ $item->nome }}</td>
                                    <td class="text-center">{{ $item->cnpjcpf }}</td>
                                    <td class="text-right"><a href="#"
                                            class="btn btn-link btn-success btn-just-icon confirm" data-toggle="tooltip"
                                            data-placement="bottom"
                                            onclick="selecionarCliente({{ $item->cd_cliente }}, '{{ $item->nome }}')"
                                            title="Selecionar Cliente"><i class="material-icons">done</i></a></td>
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
