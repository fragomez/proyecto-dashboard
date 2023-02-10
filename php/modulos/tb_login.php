<?php
interface tb_administrador
{
    public function loginAdmin(object $data);
    public function promedioAdmin();
    public function promedioUsu();
    public function listarAdministrador();
    public function listarUsuario();
    public function update_usu(object $data);
    public function update_admin(object $data);
    public function deleteAdm(object $data);
}
class Usuario implements tb_administrador
{
    static $usuario;
    public function __construct()
    {
    }
    static function getIns(): object
    {
        if (!self::$usuario instanceof self) {
            self::$usuario = new Usuario();
        }
        return self::$usuario;
    }
    public function loginAdmin(object $data)
    {
        $json = (array) $data;
        $sql = "call login(:cc, :pass);";
        $data = Conexion::getIns()->db()->prepare($sql);
        $data->execute($json);
        $mensaje = $data->fetch(PDO::FETCH_ASSOC);
        return $mensaje;
    }
    public function promedioAdmin()
    {
        $sql = "CALL `admin`();";
        $data = Conexion::getIns()->db()->prepare($sql);
        $data->execute();
        $mensaje = $data->fetch(PDO::FETCH_ASSOC);
        return $mensaje;
    }
    public function promedioUsu()
    {
        $sql = "CALL `usuarios`();";
        $data = Conexion::getIns()->db()->prepare($sql);
        $data->execute();
        $mensaje = $data->fetch(PDO::FETCH_ASSOC);
        return $mensaje;
    }

    public function listarUsuario()
    {
        $sql = "SELECT `id_usuario`, `cedula`, `nombres`, `apellidos`, `fecha_nacimiento`, `genero`, `tipo_poblacion`, `direccion`, `telefono`, `correo`, `rol_user`, `estado` FROM `tb_usuario` WHERE rol_user = 'Egresado' OR rol_user = 'Funcionario';";
        $data = Conexion::getIns()->db()->prepare($sql);
        $data->execute();
        $mensaje = $data->fetchAll(PDO::FETCH_ASSOC);
        return $mensaje;
    }

    public function listarAdministrador()
    {
        $sql = "SELECT `id_usuario`, `cedula`,`clave`,  `estado` FROM `tb_usuario` WHERE rol_user = 'Administrador';";
        $data = Conexion::getIns()->db()->prepare($sql);
        $data->execute();
        $mensaje = $data->fetchAll(PDO::FETCH_ASSOC);
        return $mensaje;
    }
    public function update_usu(object $data)
    {
        $json = (array) $data;
        $sql = "UPDATE `tb_usuario` SET `cedula`=:cc,`nombres`=:nam,`apellidos`=:apell,`fecha_nacimiento`=:fech,`genero`=:genero,`tipo_poblacion`=:tipo,`direccion`=:direcc,`telefono`=:telf, `correo`=:correo,`rol_user`=:rol,`estado`=:estado WHERE id_usuario =:id;";
        $data = Conexion::getIns()->db()->prepare($sql);
        $data->execute($json);
        $mensaje = (array) ["Datos actualizados" => $data->rowCount()];
        return $mensaje;
    }
    public function update_admin(object $data)
    {
        $json = (array) $data;
        $sql = "UPDATE `tb_usuario` SET `cedula`=:cc,`clave`=:pass,`estado`=:estado WHERE id_usuario =:id;";
        $data = Conexion::getIns()->db()->prepare($sql);
        $data->execute($json);
        $mensaje = (array) ["Datos actualizados" => $data->rowCount()];
        return $mensaje;
    }
    public function deleteAdm(object $data)
    {
        $json = (array) $data;
        $sql = 'DELETE FROM `tb_usuario` WHERE id_usuario =:id';
        $data = Conexion::getIns()->db()->prepare($sql);
        $data->execute($json);
        $mensaje = (array) ["Datos eliminados" => $data->rowCount()];
        return $mensaje;
    }
}


?>