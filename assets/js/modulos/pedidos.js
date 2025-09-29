
let tblPendientes, tblFinalizados, tblProceso;

var myModal = new bootstrap.Modal(document.getElementById('modalPedidos'));
var firstTabEl = document.querySelector('#myTab li:last-child button')
var firstTab = new bootstrap.Tab(firstTabEl)

document.addEventListener('DOMContentLoaded', function () {
    tblPendientes = $ ('#tblPendientes').DataTable({
    ajax: {
        url: base_url + 'pedidos/listarPedidos',
        dataSrc: ''
    },
    columns: [
        { data: 'id_transaccion' },
        { data: 'monto' },
        { data: 'estado' },
        { data: 'fecha' },
        { data: 'email' },
        { data: 'nombre' },
        { data: 'apellido' },
        { data: 'direccion' },
        {data:'accion'}

    ],
   
});


    tblPendientes = $ ('#tblProceso').DataTable({
    ajax: {
        url: base_url + 'pedidos/listarProceso',
        dataSrc: ''
    },
    columns: [
        { data: 'id_transaccion' },
        { data: 'monto' },
        { data: 'estado' },
        { data: 'fecha' },
        { data: 'email' },
        { data: 'nombre' },
        { data: 'apellido' },
        { data: 'direccion' },
        {data:'accion'}

    ],
   
});

tblFinalizados = $ ('#tblFinalizados').DataTable({
    ajax: {
        url: base_url + 'pedidos/listarFinalizados',
        dataSrc: ''
    },
    columns: [
        { data: 'id_transaccion' },
        { data: 'monto' },
        { data: 'estado' },
        { data: 'fecha' },
        { data: 'email' },
        { data: 'nombre' },
        { data: 'apellido' },
        { data: 'direccion' },
        {data:'accion'}

    ],
   
});



});

function cambiarProceso(idPedido, proceso) {
    Swal.fire({
        title: "Aviso?",
        text: "¿Estás seguro de cambiar el estado?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, cambiar!"
    }).then((result) => {
        if (result.isConfirmed) {
           
            const url = base_url + "pedidos/update/" + idPedido + "/" + proceso; 
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send(); 
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res.icono == 'success') {
                        tblPendientes.ajax.reload(); 
                        tblProceso.ajax.reload();
                        tblFinalizados.ajax.reload();
                    }
                    Swal.fire('Aviso?', res.msg.toUpperCase(), res.icono);
                }
            };
        }
    });


    
}


function verPedido(idPedido) {
    const url = base_url + "clientes/verPedido/" + idPedido;
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {

            const res = JSON.parse(this.responseText);
            let html = '';
            res.productos.forEach(row => {
                let subTotal = parseFloat(row.precio) * parseInt(row.cantidad)
                html += `
                    <tr>
                        <td>${row.producto}</td>
                        <td>
                        <span class="badge bg-warning">${res.moneda + ' ' + row.precio}</span>
                        </td>
                        <td>
                        <span class="badge bg-primary">${row.cantidad}</span>
                        </td>
                        <td>${subTotal.toFixed(2)}</td>                    
                    </tr>`;
            });
            document.querySelector('#tablePedidos tbody').innerHTML = html;
            myModal.show();
        }
    }
}



