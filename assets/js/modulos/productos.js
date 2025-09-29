const frm = document.querySelector("#frmRegistro");
const btnAccion = document.querySelector("#btnAccion");
let tblProductos;

var firstTabEl = document.querySelector("#myTab li:last-child button");
var firstTab = new bootstrap.Tab(firstTabEl);

document.addEventListener("DOMContentLoaded", function () {
  tblProductos = $("#tblProductos").DataTable({
    ajax: {
      url: base_url + "productos/listar",
      dataSrc: "",
    },
    columns: [
      { data: "id" },
      { data: "nombre" },
      { data: "precio" },
      { data: "cantidad" },
      { data: "imagen" },
      { data: "accion" },
    ],
  });

  //submit productos
  frm.addEventListener("submit", function (e) {
    e.preventDefault();
    let data = new FormData(this);
    const url = base_url + "productos/registrar";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(data);
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        Swal.fire("Aviso", res.msg.toUpperCase(), res.icono).then(() => {
          if (btnAccion.textContent === "Modificar") {
            // Si está modificando, recarga la página
            location.reload();
          } else {
            // Si está agregando, recarga la tabla
            tblProductos.ajax.reload();
            frm.reset();
          }
        });
      }
    };
  });
});

function eliminarPro(idPro) {
  Swal.fire({
    title: "Aviso?",
    text: "¿Estás seguro de eliminar este registro?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "productos/delete/" + idPro;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res.icono == "success") {
            tblProductos.ajax.reload();
            document.querySelector("#id").value = "";
          }
          Swal.fire("Aviso", res.msg.toUpperCase(), res.icono);
        }
      };
    }
  });
}

function editPro(idPro) {
  const url = base_url + "productos/edit/" + idPro;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      if (res.msg) {
        Swal.fire("Aviso", res.msg.toUpperCase(), res.icono);
        return; // Si hay un mensaje de error, no continuar
      }
      document.querySelector("#id").value = res.id;
      document.querySelector("#nombre").value = res.nombre;
      document.querySelector("#precio").value = res.precio;
      document.querySelector("#cantidad").value = res.cantidad;
      document.querySelector("#categoria").value = res.id_categoria;
      document.querySelector("#descripcion").value = res.descripcion;
      document.querySelector("#imagen_actual").value = res.imagen;
      btnAccion.textContent = "Modificar";
      firstTab.show();
    }
  };
}
