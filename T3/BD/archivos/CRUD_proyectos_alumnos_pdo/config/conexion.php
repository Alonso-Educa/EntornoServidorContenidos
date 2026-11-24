<?php

include_once "../../../../../../seguridad/tema03/datosBDPDOproyectos.php";

// devuelve la conexión a la base de datos
function conexion()
{
    try {
        // array asociativo de comandos opcionales para la conexion con pdo ( solo uno, codificacion utf8)
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        // conexion con pdo, se crea el objeto pdo con las 3 variables definidas en seguridad y el array de opciones de configuración
        $conexion = new PDO(PDO_MYSQL_HOST, PDO_MYSQL_USER, PDO_MYSQL_PASSWORD, $opciones);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $conexion = new PDO('mysql:host=localhost; dbname=prueba', 'root', '');
        return $conexion;
    } catch (PDOException $e) {
        echo "Falló la conexión: " . $e->getMessage();
    }
}

?>