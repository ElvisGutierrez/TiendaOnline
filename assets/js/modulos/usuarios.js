const nuevo = document.querySelector('#nuevo_registro');
const myModal = new bootstrap.Modal(document.getElementById('nuevoModal'));
const frm = document.querySelector('#frmRegistro');
const titleModal = document.querySelector('#titleModal');
const btnAccion = document.querySelector('#btnAccion');
let tblUsuario;

document.addEventListener('DOMContentLoaded', function () {
    tblUsuario = $ ('#tblUsuarios').DataTable({
    ajax: {
        url: base_url + 'usuarios/listar',
        dataSrc: ''
    },
    columns: [
        { data: 'id' },
        { data: 'nombres' },
        { data: 'apellidos' },
        {data:'correo'},
        {data:'perfil'},
        {data:'accion'},

    ]
});

//levantar modal
nuevo.addEventListener('click', function(){
    document.querySelector('#id').value = '';
    titleModal.textContent = 'NUEVO USUARIO';
    btnAccion.textContent = 'Registrar';
    frm.reset();
    document.querySelector('#clave').removeAttribute('readonly');
    myModal.show();

})
   //submit usuarios
   frm.addEventListener('submit', function (e) {
    e.preventDefault();
    let data = new FormData(this);
    const url = base_url + 'usuarios/registrar';
    const http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(data);
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
               const res = JSON.parse(this.responseText);
               if(res.icono == 'success'){
                myModal.hide();
                tblUsuario.ajax.reload();
               }
              
             //  alertas(res.msg, res.icono);
               Swal.fire('Aviso?',res.msg.toUpperCase(),res.icono);
              
            
        }
    }
   })

})

function eliminarUser(idUser) {
    Swal.fire({
        title: "Aviso?",
        text: "¿Estás seguro de eliminar este registro?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminar!"
    }).then((result) => {
        if (result.isConfirmed) {
           
            const url = base_url + "usuarios/delete/" + idUser; 
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send(); 
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res.icono == 'success') {
                        tblUsuario.ajax.reload(); //a
                    }
                    Swal.fire('Aviso', res.msg.toUpperCase(), res.icono);
                }
            };
        }
    });
}

function editUser(idUser){
    const url = base_url + "usuarios/edit/" + idUser;
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();  
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            console.log(res); 
            document.querySelector('#id').value = res.id;
            document.querySelector('#nombre').value = res.nombres;
            document.querySelector('#apellido').value = res.apellidos;
            document.querySelector('#correo').value = res.correo;
            document.querySelector('#clave').setAttribute('readonly', 'readonly');
            btnAccion.textContent = 'Actualizar';
           
            titleModal.textContent = 'MODIFICAR USUARIO';
            myModal.show();
        }
    }
}


