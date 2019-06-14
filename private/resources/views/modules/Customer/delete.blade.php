            <div class="modal-header">
                <h5 class="modal-title" id="laramanager-modal-lLabel">Apagar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="alert" id="laramanager-modal-message" role="alert">
                    <span id="laramanager-modal-msg-body">
                        <!-- Message loads here -->
                    </span>
                </div>

                Você tem certeza que deseja apagar este cliente? 
                <br>
                <br>
                <strong>{{ $cliente->name }}</strong>.
            </div>

            <form action="customer/delete/{{ $id }}" id="laramodel-modal-form" method="post">
                <div class="modal-footer">
                    @csrf
                    <button type="submit" class="btn btn-danger" id="laramanager-submit"><i class="fas fa-trash-alt"></i> Apagar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="far fa-window-close"></i> Cancelar</button>
                </div>
            </form>


            <script> 
                $(document).ready(function() { 
                    $('#laramodel-modal-form').ajaxForm(laraManagerDeleteCliente);
                }); 
            </script>