<?php
    interface tb_dato_academico{

    public function promedio_dato_academico();
    public function promedio_centros();
    public function tabla_dato_academico();
    public function update_dato(object $data);
        
    }
    class Dato implements tb_dato_academico{
        static $total;
        public function __construct(){}
        static function getIns():object {
            if(!self::$total instanceof self){
                self::$total = new Dato();
            }
            return self::$total;
        }
        public function promedio_dato_academico()
        {
            $sql = "CALL `dato_academico`();";
            $data = Conexion::getIns()->db()->prepare($sql);
            $data->execute();
            $mensaje = $data->fetch(PDO::FETCH_ASSOC);
            return $mensaje;
        }
        public function promedio_centros()
        {
            $sql = "CALL `centros`();";
            $data = Conexion::getIns()->db()->prepare($sql);
            $data->execute();
            $mensaje = $data->fetch(PDO::FETCH_ASSOC);
            return $mensaje;
        }
        public function tabla_dato_academico()
        {
            $sql = "SELECT `id_dato`, `id_usuario_fk`, `programa_formacion`, `nombre_centro_formacion`, `descripcion_nivel_formacion`, `fecha_graduacion` FROM `tb_dato_academico`;";
            $data = Conexion::getIns()->db()->prepare($sql);
            $data->execute();
            $mensaje = $data->fetchAll(PDO::FETCH_ASSOC);
            return $mensaje;
        }
        public function update_dato(object $data)
        {
            $json = (array) $data;
            $sql = "UPDATE `tb_dato_academico` SET `programa_formacion`=:programa,`nombre_centro_formacion`=:centro,`descripcion_nivel_formacion`=:nivel,`fecha_graduacion`=:fecha WHERE id_dato =:id;";
            $data = Conexion::getIns()->db()->prepare($sql);
            $data->execute($json);
            $mensaje = (array) ["Datos actualizados" => $data->rowCount()];
            return $mensaje;
        }
    }
?>