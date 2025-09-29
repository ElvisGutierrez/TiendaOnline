const btnAddDeseo = document.querySelectorAll(".btnAddDeseo");
const btnAddCarrito = document.querySelectorAll(".btnAddCarrito");
const btnDeseo = document.querySelector("#btnCantidadDeseo");
const btnCantidadCarrito = document.querySelector("#btnCantidadCarrito");
const verCarrito = document.querySelector("#verCarrito");
const tableListaCarrito = document.querySelector("#tableListaCarrito tbody");
let listaDeseo, listaCarrito;

const myModal = new bootstrap.Modal(document.getElementById("myModal"));
document.addEventListener("DOMContentLoaded", function () {
  if (localStorage.getItem("listaDeseo") != null) {
    listaDeseo = JSON.parse(localStorage.getItem("listaDeseo"));
  }
  if (localStorage.getItem("listaCarrito") != null) {
    listaCarrito = JSON.parse(localStorage.getItem("listaCarrito"));
  }
  for (let i = 0; i < btnAddDeseo.length; i++) {
    btnAddDeseo[i].addEventListener("click", function () {
      let idProducto = btnAddDeseo[i].getAttribute("prod");
      agregarDeseo(idProducto);
    });
  }
  for (let i = 0; i < btnAddCarrito.length; i++) {
    btnAddCarrito[i].addEventListener("click", function () {
      let idProducto = btnAddCarrito[i].getAttribute("prod");
      agregarCarrito(idProducto, 1);
    });
  }
  cantidadDeseo();
  cantidadCarrito();

  //ver carrito

  verCarrito.addEventListener("click", function () {
    getListaCarrito();
    myModal.show();
  });
});

// Agregar productos a la lista de deseos
function agregarDeseo(idProducto) {
  if (localStorage.getItem("listaDeseo") == null) {
    listaDeseo = [];
  } else {
    let listaExiste = JSON.parse(localStorage.getItem("listaDeseo"));
    for (let i = 0; i < listaExiste.length; i++) {
      if (listaExiste[i]["idProducto"] == idProducto) {
        Swal.fire({
          title: "Aviso",
          text: "El producto ya está en tu lista de deseos",
          icon: "warning",
        });
        return;
      }
    }
    listaDeseo = listaExiste; // Reasignar correctamente
  }
  listaDeseo.push({
    idProducto: idProducto,
    cantidad: 1,
  });
  localStorage.setItem("listaDeseo", JSON.stringify(listaDeseo));
  Swal.fire({
    title: "Aviso",
    text: "Producto agregado a la lista de deseos",
    icon: "success",
  });
  cantidadDeseo();
}

function cantidadDeseo() {
  let listas = JSON.parse(localStorage.getItem("listaDeseo"));
  if (listas != null) {
    btnDeseo.textContent = listas.length;
  } else {
    btnDeseo.textContent = 0;
  }
}

function getListaDeseo() {
  const url = base_url + "principal/listaProductos";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(JSON.stringify(listaDeseo));
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);

      // Si no hay productos válidos -> limpiar lista de deseos
      if (!res.productos || res.productos.length === 0) {
        localStorage.removeItem("listaDeseo");
        listaDeseo = [];
        document.querySelector("#tableListaDeseo tbody").innerHTML = "";
        cantidadDeseo();
        Swal.fire({
          title: "Aviso",
          text: "Algunos productos ya no existen y se limpiará tu lista de deseos",
          icon: "info",
        });
        return;
      }

      // Renderizar tabla normalmente
      let html = "";
      res.productos.forEach((producto, index) => {
        html += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${producto.nombre}</td>
                        <td>
                            <span class="badge bg-warning">${
                              res.moneda + " " + producto.precio
                            }</span>
                        </td>
                        <td>
                            <span class="badge bg-primary">${
                              producto.cantidad
                            }</span>
                        </td>
                        <td>
                            <button class="btn btn-danger btnDeleteDeseo" prod="${
                              producto.id
                            }">
                                <i class="fas fa-times-circle"></i>
                            </button>
                        </td>
                    </tr>`;
      });

      document.querySelector("#tableListaDeseo tbody").innerHTML = html;
      btnEliminarDeseo();
    }
  };
}

function btnEliminarDeseo() {
  let listaEliminar = document.querySelectorAll(".btnDeleteDeseo");
  for (let i = 0; i < listaEliminar.length; i++) {
    listaEliminar[i].addEventListener("click", function () {
      let idProducto = listaEliminar[i].getAttribute("prod");
      eliminarListaDeseo(idProducto);
    });
  }
}

function eliminarListaDeseo(idProducto) {
  for (let i = 0; i < listaDeseo.length; i++) {
    if (listaDeseo[i]["idProducto"] == idProducto) {
      listaDeseo.splice(i, 1);
    }
  }
  localStorage.setItem("listaDeseo", JSON.stringify(listaDeseo));
  getListaDeseo();
  cantidadDeseo();
  Swal.fire({
    title: "Aviso",
    text: "Producto eliminado de la lista de deseos",
    icon: "success",
  });
}

// Agregar productos al carrito
function agregarCarrito(idProducto, cantidad, accion = false) {
  if (localStorage.getItem("listaCarrito") == null) {
    listaCarrito = [];
  } else {
    let listaExiste = JSON.parse(localStorage.getItem("listaCarrito"));
    for (let i = 0; i < listaExiste.length; i++) {
      if (accion) {
        eliminarListaDeseo(idProducto);
      }
      if (listaExiste[i]["idProducto"] == idProducto) {
        Swal.fire({
          title: "Aviso",
          text: "El producto ya está agregado",
          icon: "warning",
        });
        return;
      }
    }
    listaCarrito = listaExiste; // Reasignar correctamente
  }
  listaCarrito.push({
    idProducto: idProducto,
    cantidad: cantidad,
  });
  localStorage.setItem("listaCarrito", JSON.stringify(listaCarrito));
  Swal.fire({
    title: "Aviso",
    text: "Producto agregado al carrito",
    icon: "success",
  });
  cantidadCarrito();
}

function cantidadCarrito() {
  let listas = JSON.parse(localStorage.getItem("listaCarrito"));
  if (listas != null) {
    btnCantidadCarrito.textContent = listas.length;
  } else {
    btnCantidadCarrito.textContent = 0;
  }
}

/* function getListaCarrito(){

    const url = base_url + 'principal/listaProductos';
    const http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(JSON.stringify(listaCarrito));
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let html = '';
            res.productos.forEach(producto => {
                html += `
                    <tr>
                        <td>
                        <img class="img-thumbnail rounded-circle" src=" ${producto.imagen}" alt="" width="100">
                        </td>
                        <td>${producto.nombre}</td>
                        <td>
                        <span class="badge bg-warning">${res.moneda + ' ' + producto.precio}</span>
                        </td>
                        <td>
                        <span class="badge bg-primary">${producto.cantidad}</span>
                        </td>
                        <td>${producto.subTotal}</td>       
                        <td>
                            <div class="btn btn-danger btnDeletecart" type="button" prod="${producto.id}"><i class="fas fa-times-circle"></i></div>

                        </td>              
                    </tr>`;
            });
            tableListaCarrito.innerHTML = html;
            document.querySelector('#totalGeneral').textContent = res.total;
            btnEliminarCarrito();
        }
    }
} */

function getListaCarrito() {
  const url = base_url + "principal/listaProductos";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(JSON.stringify(listaCarrito));
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);

      // Validar si no hay productos válidos
      if (!res.productos || res.productos.length === 0) {
        localStorage.removeItem("listaCarrito");
        listaCarrito = [];
        tableListaCarrito.innerHTML = "";
        document.querySelector("#totalGeneral").textContent = "0.00";
        cantidadCarrito();
        Swal.fire({
          title: "Aviso",
          text: "Algunos productos ya no existen y se limpiará tu carrito",
          icon: "info",
        });
        return;
      }

      // Construir tabla normal si hay productos
      let html = "";
      res.productos.forEach((producto) => {
        html += `
                    <tr>
                        <td>
                            <img class="img-thumbnail rounded-circle" src="${
                              producto.imagen
                            }" alt="" width="100">
                        </td>
                        <td>${producto.nombre}</td>
                        <td>
                            <span class="badge bg-warning">${
                              res.moneda + " " + producto.precio
                            }</span>
                        </td>
                        <td>
                            <span class="badge bg-primary">${
                              producto.cantidad
                            }</span>
                        </td>
                        <td>${producto.subTotal}</td>       
                        <td>
                            <div class="btn btn-danger btnDeletecart" type="button" prod="${
                              producto.id
                            }">
                                <i class="fas fa-times-circle"></i>
                            </div>
                        </td>              
                    </tr>`;
      });
      tableListaCarrito.innerHTML = html;
      document.querySelector("#totalGeneral").textContent = res.total;
      btnEliminarCarrito();
    }
  };
}

function btnEliminarCarrito(params) {
  let listaEliminar = document.querySelectorAll(".btnDeletecart");
  for (let i = 0; i < listaEliminar.length; i++) {
    listaEliminar[i].addEventListener("click", function () {
      let idProducto = listaEliminar[i].getAttribute("prod");
      eliminarListaCarrito(idProducto);
    });
  }
}

function eliminarListaCarrito(idProducto) {
  for (let i = 0; i < listaCarrito.length; i++) {
    if (listaCarrito[i]["idProducto"] == idProducto) {
      listaCarrito.splice(i, 1);
    }
  }
  localStorage.setItem("listaCarrito", JSON.stringify(listaCarrito));
  getListaCarrito();
  cantidadCarrito();
  Swal.fire({
    title: "Aviso",
    text: "Producto eliminado del carrito",
    icon: "success",
  });
}
