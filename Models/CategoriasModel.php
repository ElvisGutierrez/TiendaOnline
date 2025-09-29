<?php
class CategoriasModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }
    public function getCategorias($estado)
    {
        $sql = "SELECT * FROM categorias WHERE estado = $estado";
        return $this->selectAll($sql);
    }

    public function registrar($categoria, $imagen){
        $sql = "INSERT INTO categorias (categoria, imagen) VALUES (?,?)";
        $array = array($categoria, $imagen);
        return $this->insertar($sql, $array);
    
    }
    public function verificarCategoria($categoria)
{
    $sql = "SELECT categoria FROM categorias WHERE categoria = '$categoria' AND estado = 1";
    return $this->select($sql);
}

    public function eliminar($idCat){
        $sql = "UPDATE categorias SET estado = ? WHERE id = ?";
        $array = array(0, $idCat);
        return $this->save($sql, $array);
    }

    public function getCatoria($idCat)
    {
        $sql = "SELECT * FROM categorias WHERE id = $idCat";
        return $this->select($sql);
    }

    public function modificar($nombre, $apellido, $correo, $id){
        $sql = "UPDATE usuarios SET nombres=?, apellidos=?, correo=? WHERE id=?";
        $array = array($nombre, $apellido, $correo, $id);
        return $this->save($sql, $array);
    }
    public function modificarConClave($categoria, $imagen, $id)
{
    $sql = "UPDATE categorias SET categoria=?, imagen=? WHERE id=?";
    $array = array($categoria, $imagen, $id);
    return $this->save($sql, $array);
}

    
    
    

}
 
