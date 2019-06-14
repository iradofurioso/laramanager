            <div class="modal-header">
                <h5 class="modal-title" id="laramanager-modal-lLabel">Adicionar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="customer/save" id="laramanager-modal-form" method="post" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="alert" id="laramanager-modal-message" role="alert">
                        <span id=laramanager-modal-msg-body>
                            <!-- Message loads here -->
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" value="" name="nome" id="nome" placeholder="Nome...">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" value="" name="email" id="email" placeholder="Email...">
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" value="" name="telefone" id="telefone" placeholder="Telefone...">
                    </div>





                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control" size="35">
                    </div>




                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required="">
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    @csrf
                    <button type="submit" class="btn btn-success" id="laramanager-submit"><i class="fas fa-save"></i> Salvar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="far fa-window-close"></i> Cancelar</button>
                </div>
            </form>

            <script> 
                $(document).ready(function() { 
                    $('#laramanager-modal-form').ajaxForm(laramanagerAddCliente);
                }); 
            </script>