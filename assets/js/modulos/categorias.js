const nuevo = document.querySelector("#nuevo_registro");
const myModal = new bootstrap.Modal(document.getElementById("nuevoModal"));
const frm = document.querySelector("#frmRegistro");
const titleModal = document.querySelector("#titleModal");
const btnAccion = document.querySelector("#btnAccion");
let tblCategorias;

document.addEventListener("DOMContentLoaded", function () {
  tblCategorias = $("#tblCategorias").DataTable({
    ajax: {
      url: base_url + "categorias/listar",
      dataSrc: "",
    },
    columns: [
      { data: "id" },
      { data: "categoria" },
      { data: "imagen" },
      { data: "accion" },
    ],
  });

  //levantar modal
  nuevo.addEventListener("click", function () {
    document.querySelector("#id").value = "";
    document.querySelector("#imagen_actual").value = "";
    document.querySelector("#imagen").value = "";
    titleModal.textContent = "NUEVA CATEGORIA";
    btnAccion.textContent = "Registrar";
    frm.reset();
    myModal.show();
  });
  //submit usuarios

  frm.addEventListener("submit", function (e) {
    e.preventDefault();
    let data = new FormData(this);
    const url = base_url + "categorias/registrar";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(data);
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        const res = JSON.parse(this.responseText);
        if (res.icono == "success") {
          myModal.hide(); // Asegúrate de que myModal esté definido
          tblCategorias.ajax.reload(); // Asegúrate de que tblCategorias esté definido
        }
        Swal.fire("Aviso?", res.msg.toUpperCase(), res.icono);
      }
    };
  });
});

function eliminarCat(idCat) {
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
      const url = base_url + "categorias/delete/" + idCat;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res.icono == "success") {
            tblCategorias.ajax.reload();
            document.querySelector("#id").value = "";
          }
          Swal.fire("Aviso", res.msg.toUpperCase(), res.icono);
        }
      };
    }
  });
}

function editCat(idCat) {
  const url = base_url + "categorias/edit/" + idCat;
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
      document.querySelector("#id").value = res.id; // Asegúrate de que la respuesta tenga el id
      document.querySelector("#categoria").value = res.categoria; // Asegúrate de que la respuesta tenga la categoría
      document.querySelector("#imagen_actual").value = res.imagen; // Asegúrate de que la respuesta tenga la imagen
      titleModal.textContent = "EDITAR CATEGORÍA"; // Actualiza el título del modal
      btnAccion.textContent = "Modificar"; // Cambia el texto del botón
      myModal.show(); // Muestra el modal
    }
  };
}
