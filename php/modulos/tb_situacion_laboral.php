<?php
    interface tb_situacion_laboral{

    public function promedio_situacion_lab();
    public function tabla_situacion();
    public function update_situacion(object $data);
        
    }
    class Situacion implements tb_situacion_laboral{
        static $total;
        public function __construct(){}
        static function getIns():object {
            if(!self::$total instanceof self){
                self::$total = new Situacion();
            }
            return self::$total;
        }
        public function promedio_situacion_lab()
        {
            $sql = "CALL `situacion`();";
            $data = Conexion::getIns()->db()->prepare($sql);
            $data->execute();
            $mensaje = $data->fetch(PDO::FETCH_ASSOC);
            return $mensaje;
        }
        public function tabla_situacion()
        {
            $sql = "SELECT * FROM `tb_situacion_laboral`;";
            $data = Conexion::getIns()->db()->prepare($sql);
            $data->execute();
            $mensaje = $data->fetchAll(PDO::FETCH_ASSOC);
            return $mensaje;
        }
        public function update_situacion(object $data)
        {
            $json = (array) $data;
            $sql = "UPDATE `tb_situacion_laboral` SET `descripcion_ocupacion`=:ocu,`relacion_laboral`=:rela,`descripcion_medio_empleo`=:empl,`descripcion_asignacion_salarial`=:asig,`empresa_actual`=:empre,`salario_adecuado`=:salario,`descripcion_tiempo_transcu`=:tim,`descripcion_condicion_de_trabajo`=:condi,`cursos_a_ofertar`=:cursos WHERE id_situacion_laboral =:id;";
            $data = Conexion::getIns()->db()->prepare($sql);
            $data->execute($json);
            $mensaje = (array) ["Datos actualizados" => $data->rowCount()];
            return $mensaje;
        }
    }
?>