<?php include_once 'Views/template/header-principal.php'; ?>

<!-- Start Content -->
<div class="container py-5">
    <?php if (isset($data['verificar']['verify']) && $data['verificar']['verify'] == 1) { ?>
      <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Pago</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pendientes-tab" data-bs-toggle="tab" data-bs-target="#pendientes-tab-pane" type="button" role="tab" aria-controls="pendientes-tab-pane" aria-selected="false">Pendientes</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="completados-tab" data-bs-toggle="tab" data-bs-target="#completados-tab-pane" type="button" role="tab" aria-controls="completados-tab-pane" aria-selected="false">Completados</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
              <div class="row">
              <div class="col-md-8">
        <div class="card shadow-lg">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover align-middle" id="tableListaProductos">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>SubTotal</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer text-end">
            <h3 id="totalProducto"></h3>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card shadow-lg">
        <div class="text-center">

</div>





          <div class="card-body text-center">
            <img class="img-thumbnail rounded-circle" src="<?php echo BASE_URL . 'assets_tmp/img/user.png'; ?>" alt="" width="150">
            <hr>
            <a href="<?php echo BASE_URL . 'clientes/salir'; ?>" class="btn btn-danger btn-sm d-inline-block">
    <i class="fas fa-times-circle"></i> Cerrar Sesión
  </a>
  <hr>
            <p><?php echo $_SESSION['nombreCliente']; ?></p>
            <p><i class="fas fa-envelope"></i> <?php echo $_SESSION['correoCliente']; ?></p>

            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    PayPal
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <div id="paypal-button-container"></div>
                    <p id="result-message"></p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Otros
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
              </div>
        </div>
        <div class="tab-pane fade" id="pendientes-tab-pane" role="tabpanel" aria-labelledby="pendientes-tab" tabindex="0">
              <div class="col-12">
                <div class="table-responsive">
                <table class="table-bordered table-striped table-hover" id="tblPendientes" style="width: 100%;">
            <thead class="bg-dark text-white">
              <tr>
                <th>#</th>
                <th>Monto</th>
                <th>Fecha</th>
                <th>Detalle Pedido</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
                </div>
              </div>
        </div>
        <div class="tab-pane fade" id="completados-tab-pane" role="tabpanel" aria-labelledby="completados-tab" tabindex="0">...</div>
      </div>

    <?php } else { ?>
      <div class="alert alert-danger text-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </svg>
        <div class="h3">Verifica tu correo electrónico</div>
      </div>
    <?php } ?>
</div>
<!-- End Content -->

<div id="modalPedido" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Estado del Pedido</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
            <div class="row">

<div class="col-md-6 col-lg-4 pb-5">
    <div class="h-100 py-5 services-icon-wap shadow">
        <div class="h1 text-success text-center"><i class="fa fa-truck fa-lg"></i></div>
        <h2 class="h5 mt-4 text-center">Enviado</h2>
    </div>
</div>

<div class="col-md-6 col-lg-4 pb-5">
    <div class="h-100 py-5 services-icon-wap shadow">
        <div class="h1 text-success text-center"><i class="fas fa-exchange-alt"></i></div>
        <h2 class="h5 mt-4 text-center">Proceso</h2>
    </div>
</div>

<div class="col-md-6 col-lg-4 pb-5">
    <div class="h-100 py-5 services-icon-wap shadow">
        <div class="h1 text-success text-center"><i class="fa fa-percent"></i></div>
        <h2 class="h5 mt-4 text-center">Completado</h2>
    </div>
</div>
      <div class="col-md-12">
        <div class="table-responsive">
        <div class="table-responsive">
    <table class="table table-bordered tablerr-hover aligh-middle" id="tablePedidos" style="width: 100%;">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>SubTotal</th>
        </tr>
      </thead>
        <tbody>
        </tbody>
    </table>
</div>

        </div>
      </div>
</div>
            </div>
        </div>
    </div>
</div>


<?php include_once 'Views/template/footer-principal.php'; ?>
<script src="<?php echo BASE_URL . 'assets/DataTables/datatables.min.js'; ?>"></script>
<script src="https://cdn.datatables.net/v/dt/dt-2.1.7/datatables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script src="<?php echo BASE_URL . 'assets/js/clientes.js'; ?>"></script>
</body>

</html>