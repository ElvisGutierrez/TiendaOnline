const btn = document.querySelector('#btnContactos');
const nombre = document.querySelector('#nombre');
const email = document.querySelector('#email');
let mensaje;

document.addEventListener('DOMContentLoaded', function () {
    ClassicEditor
        .create( document.querySelector( '#message' ), {
        } )
        .then( newEditor => {
            mensaje = newEditor;
        })
        .catch( error => {
            console.error( error )
        } );

        btn.addEventListener('click', function (e) {
            e.preventDefault();
            let data = new FormData();
            data.append('nombre', nombre.value);
            data.append('email', email.value);
            data.append('mensaje', mensaje.getData());
        
            const url = base_url + 'contactos/index';
            const http = new XMLHttpRequest();
            http.open('POST', url, true);
            http.send(data);
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    try {
                        const res = JSON.parse(this.responseText);
                        Swal.fire(
                            'Aviso',
                            res.msg,
                            res.icono
                        );
                    } catch (error) {
                        console.error("Error al parsear JSON:", error);
                        console.log(this.responseText);  // Verifica la respuesta si no es válida
                    }
                }
            }
        });
        

});

   

