<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json; charset=utf-8');
$_DATA = json_decode(file_get_contents("php://input"));

include_once "conexion/conexion.php";
class Api
{
    static $api;
    public function __construct()
    {
    }
    static function getIns()
    {
        if (!self::$api instanceof self) {
            return self::$api = new Api();
        }
        return self::$api;
    }
    //Login
    public function login(object $obj)
    {
        include_once "modulos/tb_login.php";
        echo json_encode(Usuario::getIns()->loginAdmin($obj), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    //Datos estadisticos
    public function PromedioAdm()
    {
        include_once "modulos/tb_login.php";
        echo json_encode(Usuario::getIns()->promedioAdmin(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    public function promUsu()
    {
        include_once "modulos/tb_login.php";
        echo json_encode(Usuario::getIns()->promedioUsu(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    public function prom_dato_aca()
    {
        include_once "modulos/tb_dato_academico.php";
        echo json_encode(Dato::getIns()->promedio_dato_academico(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    public function prom_cent()
    {
        include_once "modulos/tb_dato_academico.php";
        echo json_encode(Dato::getIns()->promedio_centros(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    public function prom_situ()
    {
        include_once "modulos/tb_situacion_laboral.php";
        echo json_encode(Situacion::getIns()->promedio_situacion_lab(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }   
    //Tablas
    public function table_usuarios()
    {
        include_once "modulos/tb_login.php";
        echo json_encode(Usuario::getIns()->listarUsuario(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    public function table_dato()
    {
        include_once "modulos/tb_dato_academico.php";
        echo json_encode(Dato::getIns()->tabla_dato_academico(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    public function table_situac()
    {
        include_once "modulos/tb_situacion_laboral.php";
        echo json_encode(Situacion::getIns()->tabla_situacion(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    public function table_adm()
    {
        include_once "modulos/tb_login.php";
        echo json_encode(Usuario::getIns()->listarAdministrador(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    //Modificar
    public function updat_usu(object $obj)
    {
        include_once "modulos/tb_login.php";
        echo json_encode(Usuario::getIns()->update_usu($obj), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    public function update_dat($obj)
    {
        include_once "modulos/tb_dato_academico.php";
        echo json_encode(Dato::getIns()->update_dato($obj), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    public function update_form_compl($obj)
    {
        include_once "modulos/tb_form_compl.php";
        echo json_encode(Complem::getIns()->update_form_comp($obj), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    public function update_situ($obj)
    {
        include_once "modulos/tb_situacion_laboral.php";
        echo json_encode(Situacion::getIns()->update_situacion($obj), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    public function update_adm($obj)
    {
        include_once "modulos/tb_login.php";
        echo json_encode(Usuario::getIns()->update_admin($obj), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    public function delete_adm($obj)
    {
        include_once "modulos/tb_login.php";
        echo json_encode(Usuario::getIns()->deleteAdm($obj), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}


call_user_func_array([Api::getIns(), apache_request_headers()["accept"]], [$_DATA]);

?>