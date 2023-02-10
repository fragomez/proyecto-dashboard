Login 
 Procedimiento login.
 DELIMITER $$
CREATE OR REPLACE PROCEDURE login(IN cc int, IN pass text)
BEGIN
	SELECT `cedula` as 'Nuip', `clave` as 'Contraseña' FROM `tb_usuario` WHERE `cedula`=cc AND `clave`=pass;
END $$
DELIMITER ;


Datos estadisticos

DELIMITER $$
CREATE OR REPLACE PROCEDURE admin()
BEGIN           
        SET @TOTAL_DATOS= (SELECT COUNT(tb_usuario.id_usuario) FROM tb_usuario WHERE tb_usuario.rol_user = 'Administrador');
        SET @PORCENTAJE = (@TOTAL_DATOS/@TOTAL_DATOS)*100;
        SET @MENSAJE = "Promedio de administradores";
        SELECT @TOTAL_DATOS as 'Admins registrados', @PORCENTAJE as 'Porcentaje', @MENSAJE AS 'Mensaje';
END $$
DELIMITER ;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

DELIMITER $$
CREATE OR REPLACE PROCEDURE usuarios()
BEGIN           
        SET @TOTAL_DATOS= (SELECT COUNT(tb_usuario.id_usuario) FROM tb_usuario WHERE tb_usuario.rol_user = 'Egresado' OR tb_usuario.rol_user = 'Funcionario');
        SET @PORCENTAJE = (@TOTAL_DATOS/@TOTAL_DATOS)*100;
        SET @MENSAJE = "Promedio de usuarios";
        SELECT @TOTAL_DATOS as 'Usuarios registrados', @PORCENTAJE as 'Porcentaje', @MENSAJE AS 'Mensaje';
END $$
DELIMITER ;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

DELIMITER $$
CREATE OR REPLACE PROCEDURE dato_academico()
BEGIN           
        SET @TOTAL_DATOS= (SELECT COUNT(tb_dato_academico.id_dato) FROM tb_dato_academico);
        SET @PORCENTAJE = (@TOTAL_DATOS/@TOTAL_DATOS)*100;
        SET @MENSAJE = "Promedio de datos academicos registrados";
        SELECT @TOTAL_DATOS as 'Datos registrados', @PORCENTAJE as 'Porcentaje', @MENSAJE AS 'Mensaje';
END $$
DELIMITER ;     

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

DELIMITER $$
CREATE OR REPLACE PROCEDURE centros()
BEGIN           
        SET @TOTAL_DATOS= (SELECT COUNT(tb_dato_academico.nombre_centro_formacion) FROM tb_dato_academico);
        SET @PORCENTAJE = (@TOTAL_DATOS/@TOTAL_DATOS)*100;
        SET @MENSAJE = "Promedio de centros registrados";
        SELECT @TOTAL_DATOS as 'Centros registrados', @PORCENTAJE as 'Porcentaje', @MENSAJE AS 'Mensaje';
END $$
DELIMITER ; 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

DELIMITER $$
CREATE OR REPLACE PROCEDURE situacion()
BEGIN           
        SET @TOTAL_DATOS= (SELECT COUNT(tb_situacion_laboral.id_situacion_laboral) FROM tb_situacion_laboral);
        SET @PORCENTAJE = (@TOTAL_DATOS/@TOTAL_DATOS)*100;
        SET @MENSAJE = "Promedio de situaciones laborales";
        SELECT @TOTAL_DATOS as 'Situaciones laborales registradas', @PORCENTAJE as 'Porcentaje', @MENSAJE AS 'Mensaje';
END $$
DELIMITER ;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

DELIMITER $$
CREATE OR REPLACE PROCEDURE programa()
BEGIN           
        SET @TOTAL_DATOS= (SELECT COUNT(tb_programa.id_programa) FROM tb_programa);
        SET @PORCENTAJE = (@TOTAL_DATOS/@TOTAL_DATOS)*100;
        SET @MENSAJE = "Promedio de programas";
        SELECT @TOTAL_DATOS as 'Programas de formación registrados', @PORCENTAJE as 'Porcentaje', @MENSAJE AS 'Mensaje';
END $$
DELIMITER ;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

DELIMITER $$
CREATE OR REPLACE PROCEDURE coordinacion()
BEGIN           
        SET @TOTAL_DATOS= (SELECT COUNT(tb_coordinacion.id_coordinacion) FROM tb_coordinacion);
        SET @PORCENTAJE = (@TOTAL_DATOS/@TOTAL_DATOS)*100;
        SET @MENSAJE = "Promedio de coordinadores";
        SELECT @TOTAL_DATOS as 'Coordinadores académicos registrados', @PORCENTAJE as 'Porcentaje', @MENSAJE AS 'Mensaje';
END $$
DELIMITER ;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

