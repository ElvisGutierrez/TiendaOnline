const tableLista = document.querySelector('#tableListaProductos tbody');
const tblPendiente = document.querySelector ('#tblPendientes');
let productosjson = [];



document.addEventListener('DOMContentLoaded', function () {
    if (tableLista) {  
        getListaProductos();
    }
    //cargar datos pendientes con Data Table
    $('#tblPendientes').DataTable({
        ajax: {
            url: base_url + 'clientes/listarPendientes',
            dataSrc: ''
        },
        columns: [
            { data: 'id_transaccion' },
            { data: 'monto' },
            { data: 'fecha' },
            {data:'accion'}
        ]
    });
    
});

function getListaProductos(){
    let html = '';
    const url = base_url + 'principal/listaProductos';
    const http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(JSON.stringify(listaCarrito));
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            if (res.totalPaypal > 0) {
                res.productos.forEach(producto => {
                    html += `
                        <tr>
                            <td>
                            <img class="img-thumbnail rounded-circle" src="${producto.imagen}" alt="" width="100">
                            </td>
                            <td>${producto.nombre}</td>
                            <td>
                            <span class="badge bg-warning">${res.moneda + ' ' + producto.precio}</span>
                            </td>
                            <td>
                            <span class="badge bg-primary">${producto.cantidad}</span>
                            </td>
                            <td>${producto.subTotal}</td>                   
                        </tr>`;
                    
                    // Agregar productos para PayPal con moneda correcta
                    let json = {
                        "name": producto.nombre,
                        "unit_amount": { 
                            "currency_code": res.moneda, // Asegúrate que "moneda" sea correcta
                            "value": producto.precio // Verificar que precio sea un número
                        },
                        "quantity": producto.cantidad // Verificar que cantidad sea un número
                    }
                    productosjson.push(json); // Agregar al arreglo
                });
    
                console.log('Total Paypal:', res.totalPaypal);  // Para depuración
                tableLista.innerHTML = html;
                document.querySelector('#totalProducto').textContent = 'Total a Pagar: ' + res.moneda + ' ' + res.total;
                botonPaypal(res.totalPaypal, res.moneda);
            }else{
                tableLista.innerHTML = `
                <tr>
                      <td colspan="5" class="text-center">CARRITO VACIO</td>
                </tr>
                `;
            }

            productosjson = [];  // Reinicia el arreglo para evitar duplicados
            

        }
    }
}

function botonPaypal(total, moneda) {
    window.paypal
    .Buttons({
        style: {
            shape: "rect",
            layout: "vertical",
            color: "gold",
            label: "paypal",
        },

        createOrder: (data, actions) => {
            // Asegúrate de que `productosjson` esté correctamente poblado y que la moneda se pase correctamente
            console.log("Productos JSON:", productosjson);  // Para depurar que los productos son correctos

            return actions.order.create({
                purchase_units: [{
                    amount: {
                        "currency_code": moneda,  // Moneda válida como "USD"
                        "value": total,  // Total de la compra
                        breakdown: {
                            "item_total": { 
                                "currency_code": moneda,  // Moneda correcta
                                "value": total  // Total calculado
                            }
                        }
                    },
                    // Aquí pasamos los productos al checkout de PayPal
                    "items": productosjson  // Asegúrate de que esta variable esté correctamente estructurada
                }]
            });
        },

        async onApprove(data, actions) {
            try {
                const orderData = await actions.order.capture();
                console.log('Orden capturada:', orderData);  // Mostrar los datos de la orden
                    registrarPedido(orderData)
                // Mostrar mensaje de éxito o hacer redirección a página de confirmación
                resultMessage(`Transacción completada con éxito: ${orderData.id}`);
            } catch (error) {
                console.error('Error en la transacción:', error);
                resultMessage(`Lo sentimos, ocurrió un error: ${error.message}`);
            }
        }
    })
    .render("#paypal-button-container");  // Renderiza el botón de PayPal en el contenedor con este ID
}
function registrarPedido(datos){
    const url = base_url + 'clientes/registrarPedido';
    const http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(JSON.stringify({
        pedidos: datos,
        productos: listaCarrito
    }));
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            Swal.fire({
                title: "Aviso",
                text: "Pedido Registrado",
                icon: "res.icono"
            });
            if (res.icono == 'success') {
                localStorage.removeItem('listaCarrito');
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            } 
            
            
        }
    }
}



function verPedido(idPedido){
    const mPedido = new bootstrap.Modal(document.getElementById('modalPedido'));
    const url = base_url + 'clientes/verPedido/' + idPedido;
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
            mPedido.show();
        }
    }

}

// Revisa que productosjson tenga los datos correctos
console.log("Productos JSON inicial:", productosjson);  // Para depuración inicial