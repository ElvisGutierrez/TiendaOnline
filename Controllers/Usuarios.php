<?php
class Usuarios extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        $data['title'] = 'usuarios';
        $this->views->getView('admin/usuarios', "index", $data);
    }

    public function listar()
    {
        $data = $this->model->getUsuarios(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['accion'] = '<div class="d-flex">
            <button class="btn btn-primary" type="button" onclick="editUser(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="eliminarUser(' . $data[$i]['id'] . ')"><i class="fas fa-trash"></i></button>
            </div>';
        }
        echo json_encode($data);
        die();
    }

    public function registrar()
    {
        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $clave = isset($_POST['clave']) ? $_POST['clave'] : ''; // No obligatorio para edición
            $id = $_POST['id'];
    
            if (empty($nombre) || empty($apellido) || empty($correo)) {
                $respuesta = array('msg' => 'Nombre, Apellido y Correo son obligatorios', 'icono' => 'warning');
            } else {
                if (empty($id)) {
                    // Registro de nuevo usuario
                    if (empty($clave)) {
                        $respuesta = array('msg' => 'La contraseña es obligatoria para registrar un nuevo usuario', 'icono' => 'warning');
                    } else {
                        $hash = password_hash($clave, PASSWORD_DEFAULT);
                        $result = $this->model->verificarCorreo($correo);
                        if (empty($result)) {
                            $data = $this->model->registrar($nombre, $apellido, $correo, $hash);
                            if ($data > 0) {
                                $respuesta = array('msg' => 'Usuario registrado', 'icono' => 'success');
                            } else {
                                $respuesta = array('msg' => 'Error al registrar', 'icono' => 'warning');
                            }
                        } else {
                            $respuesta = array('msg' => 'El correo ya existe', 'icono' => 'warning');
                        }
                    }
                } else {
                    // Modificación de usuario
                    if (!empty($clave)) {
                        $hash = password_hash($clave, PASSWORD_DEFAULT);
                        $data = $this->model->modificarConClave($nombre, $apellido, $correo, $hash, $id);
                    } else {
                        $data = $this->model->modificar($nombre, $apellido, $correo, $id);
                    }
    
                    if ($data == 1) {
                        $respuesta = array('msg' => 'Usuario modificado', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al modificar', 'icono' => 'warning');
                    }
                }
            }
            echo json_encode($respuesta);
        }
        die();
    }
    


    public function delete($idUser)
    {
        if (is_numeric($idUser)) {
            $data = $this->model->eliminar($idUser);
            if ($data == 1) {
                $respuesta = array('msg' => 'Usuario dado de baja', 'icono' => 'success');
            } else {
                $respuesta = array('msg' => 'Error al eliminar', 'icono' => 'warning');
            }
        } else {
            $respuesta = array('msg' => 'ID de usuario no válido', 'icono' => 'warning');
        }

        echo json_encode($respuesta);
        die();
    }
    //editar usuario
    public function edit($idUser)
    {
        if (is_numeric($idUser)) {
            $data = $this->model->getUsuario($idUser);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }


        die();
    }
}
