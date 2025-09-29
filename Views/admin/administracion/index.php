<?php include_once 'Views/template/header-admin.php'; ?>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-10 border-start border-0 border-4 border-warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Pedidos Pendientes</p>
                        <h4 class="my-1 text-warning"><?php echo $data['pendientes']['total']; ?></h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto">
                        <i class='fas fa-exclamation-circle'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 border-start border-0 border-4 border-info">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Pedidos en Proceso</p>
                        <h4 class="my-1 text-info"><?php echo $data['procesos']['total']; ?></h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto">
                        <i class='fas fa-spinner'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 border-start border-0 border-4 border-success">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Pedidos Finalizados</p>
                        <h4 class="my-1 text-success"><?php echo $data['finalizados']['total']; ?></h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                        <i class='fas fa-check-circle'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 border-start border-0 border-4 border-warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total Productos</p>
                        <h4 class="my-1 text-warning"><?php echo $data['productos']['total']; ?></h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto">
                        <i class='bx bxs-group'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->

<div class="row">
    <div class="col-12 col-lg-4 d-flex">
        <div class="card radius-10 w-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Estados general de los pedidos</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-container-2">
                    <canvas id="reportesPedidos"></canvas>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                    Pedidos Finalizados <span class="badge bg-success rounded-pill"><?php echo $data['finalizados']['total']; ?></span>
                </li>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                    Proceso <span class="badge bg-primary rounded-pill"><?php echo $data['procesos']['total']; ?></span>
                </li>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                    Pendientes <span class="badge bg-warning text-dark rounded-pill"><?php echo $data['pendientes']['total']; ?></span>
                </li>
            </ul>
        </div>
    </div>

    <div class="col d-flex">
        <div class="card radius-10 w-100">
            <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Productos con Stock Mínimo</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-container-1 mt-3">
                    <canvas id="stockMinimo"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col d-flex">
        <div class="card radius-10 w-100">
            <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Productos más vendidos</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-container-1 mt-3">
                    <canvas id="topProductos"></canvas>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->

<?php include_once 'Views/template/footer-admin.php'; ?>

<script>
window.onload = function() {
    productosMinimos();
    topProductos(); // Aseguramos llamar a la función para cargar el gráfico de top productos
};

// Gráfico de estados de pedidos
var ctx = document.getElementById("reportesPedidos").getContext('2d');

var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
gradientStroke1.addColorStop(0, '#fc4a1a');
gradientStroke1.addColorStop(1, '#f7b733');

var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
gradientStroke2.addColorStop(0, '#4776e6');
gradientStroke2.addColorStop(1, '#8e54e9');

var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
gradientStroke3.addColorStop(0, '#00b09b'); // Verde claro
gradientStroke3.addColorStop(1, '#96c93d'); // Verde oscuro

var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ["Pendientes", "Proceso", "Finalizado"],
        datasets: [{
            backgroundColor: [
                gradientStroke1,
                gradientStroke2,
                gradientStroke3
            ],
            hoverBackgroundColor: [
                gradientStroke1,
                gradientStroke2,
                gradientStroke3
            ],
            data: [<?php echo $data['pendientes']['total']; ?>, <?php echo $data['procesos']['total']; ?>, <?php echo $data['finalizados']['total']; ?>],
            borderWidth: [1, 1, 1]
        }]
    },
    options: {
        maintainAspectRatio: false,
        cutout: 82,
        plugins: {
            legend: {
                display: false,
            }
        }
    }
});

// Función para productos con stock mínimo
function productosMinimos() {
    const url = base_url + 'admin/productosMinimos';
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let nombre = [];
            let cantidad = [];
            for (let i = 0; i < res.length; i++) {
                nombre.push(res[i]['nombre']);
                cantidad.push(res[i]['cantidad']);
            }

            var ctx = document.getElementById("stockMinimo").getContext('2d');

            var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke1.addColorStop(0, '#ee0979');
            gradientStroke1.addColorStop(1, '#ff6a00');

            var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke2.addColorStop(0, '#283c86');
            gradientStroke2.addColorStop(1, '#39bd3c');

            var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke3.addColorStop(0, '#7f00ff');
            gradientStroke3.addColorStop(1, '#e100ff');

            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: nombre,
                    datasets: [{
                        backgroundColor: [
                            gradientStroke1,
                            gradientStroke2,
                            gradientStroke3
                        ],
                        hoverBackgroundColor: [
                            gradientStroke1,
                            gradientStroke2,
                            gradientStroke3
                        ],
                        data: cantidad,
                        borderWidth: [1, 1, 1]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    cutout: 95,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    }
                }
            });
        }
    }
}

// Función para top productos más vendidos
function topProductos() {
    const url = base_url + 'admin/topProductos';
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let producto = [];
            let total = [];
            for (let i = 0; i < res.length; i++) {
                producto.push(res[i]['producto']);
                total.push(res[i]['total']);
            }

            var ctx = document.getElementById("topProductos").getContext('2d');

            var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke1.addColorStop(0, '#ee0979');
            gradientStroke1.addColorStop(1, '#ff6a00');

            var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke2.addColorStop(0, '#283c86');
            gradientStroke2.addColorStop(1, '#39bd3c');

            var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
            gradientStroke3.addColorStop(0, '#7f00ff');
            gradientStroke3.addColorStop(1, '#e100ff');

            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: producto,
                    datasets: [{
                        backgroundColor: [
                            gradientStroke1,
                            gradientStroke2,
                            gradientStroke3
                        ],
                        hoverBackgroundColor: [
                            gradientStroke1,
                            gradientStroke2,
                            gradientStroke3
                        ],
                        data: total,
                        borderWidth: [1, 1, 1]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    cutout: 95,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    }
                }
            });
        }
    }
}
</script>

</body>
</html>
