<?php include_once 'Views/template/header-admin.php'; ?>

<button class="btn btn-primary mb-2" type="button" id="nuevo_registro">Nuevo</button>

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>


<div class="card">
    <div class="body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover aling-middle" style="width: 100;" id="tblCategorias">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombres</th>
                        <th>Imagen</th>
                        <th></th>

                    </tr>
                </thead>

            </table>
        </div>
    </div>
</div>



<div id="nuevoModal" class="modal fade" tabindex="1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="titleModal"></h5>
                <button class="btn-close" data-bs-dismiss></button>

            </div>
            <form id="frmRegistro">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="imagen_actual" name="imagen_actual">
                    <div class="form-group mb-2">
                        <label for="categoria">Nombre</label>
                        <input id="categoria" class="form-control" type="text" name="categoria" placeholder="Categorias">
                    </div>

                    <div class="form-group">
                        <label for="imagen">Imagen (Opcional)</label>
                        <input type="file" class="form-control-file" name="imagen" id="imagen">
                    </div>

                   



                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>


                </div>
            </form>

        </div>

    </div>

</div>

</div>

<?php include_once 'Views/template/footer-admin.php'; ?>
<script src="<?php echo BASE_URL . 'assets/DataTables/datatables.min.js'; ?>"></script>
<script src="https://cdn.datatables.net/v/dt/dt-2.1.7/datatables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


<script src="<?php echo BASE_URL . 'assets/js/modulos/categorias.js'; ?>"></script>

</body>

</html>