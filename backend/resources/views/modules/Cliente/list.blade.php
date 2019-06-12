
    <!-- BEGIN: Modal -->
    <div class="modal fade" id="laramanager-modal" tabindex="-1" role="dialog" aria-labelledby="laramanager-modal-lLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!-- BEGIN: Content -->
        <div class="modal-content" id="laramanager-modal-content">
            <!-- Content here -->
        </div>
        <!-- END: Content -->
    </div>
    </div>
    <!-- END: Modal -->

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Clientes</h1>
    </div>

    <div class="form-group">
        <a href="#" class="btn btn-success" onclick="triggerModal('', 'clientes/add');" role="button" aria-pressed="true">
            <i class="fas fa-plus-circle"></i> Adicionar
        </a>
    </div>

    <table id="laramanager-grid" class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Código</th>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Telefone</th>
              <th>Funções</th>
            </tr>
          </thead>
          <tbody>
            <!-- INI: Data -->
            @forelse($clientes as $cli)
                <tr id="tr_{{ $cli->id_cliente }}">
                    <td><i class="fas fa-barcode"></i> {{ $cli->id_cliente }}</td>
                    <td><img src="assets/app/img/public/{{ $cli->foto }}" style="height:50px;width:50px;"> {{ $cli->nome }}</td>
                    <td>{{ $cli->email }}</td>
                    <td>{{ $cli->telefone }}</td>
                    <td>
                        <a href="#" class="btn btn-danger" onclick="triggerModal({{ $cli->id_cliente }}, 'clientes/delete');" role="button" aria-pressed="true">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <a href="#" class="btn btn-warning" onclick="triggerModal({{ $cli->id_cliente }}, 'clientes/edit');" role="button" aria-pressed="true">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <div class="alert alert-danger" role="alert">
                    Nenhum cliente cadastrado!
                </div>
            @endforelse
            <!-- END: Data -->
          </tbody>
          <tfoot>
            <tr>
                <td colspan="5">
                    @if (count($clientes) > 0)
                        <div id="total-found-data">
                            <strong>Total: <span id="total-found-data-qqty">{{ count($clientes) }}</span> cliente(s).</strong>
                        </div>
                    @endif
                </td>
            </tr>
          </tfoot>
        </table>
