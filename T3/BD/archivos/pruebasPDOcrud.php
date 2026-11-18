<?php


include "../../../../seguridad/tema03/datosBDPDObanco.php";

// 1. CONEXIÓN
try {
    // array asociativo de comandos opcionales para la conexion con pdo ( solo uno, codificacion utf8)
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    // conexion con pdo, se crea el objeto pdo con las 3 variables definidas en seguridad y el array de opciones de configuración
    $conexion = new PDO(PDO_MYSQL_HOST, PDO_MYSQL_USER, PDO_MYSQL_PASSWORD, $opciones);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $conexion = new PDO('mysql:host=localhost; dbname=prueba', 'root', '');
} catch (PDOException $e) {
    echo "Falló la conexión: " . $e->getMessage();
}
echo "Conexion realizada";



// 2. CONSULTAS

// leer por fila
try {
    $sql = "select * from clientes;";
    $sentencia = $conexion->prepare($sql);
    $sentencia->setFetchMode(PDO::FETCH_ASSOC);
    $sentencia->execute();
    $num_filas = $sentencia->rowCount();
    if ($num_filas == 0) {
        echo "No hay registros en la base de datos o ha habido un error<br/>";
    } else {
        while ($fila = $sentencia->fetch()) {
            echo "DNI: " . $fila["dni"] . "<br/>";
            echo "Nombre: " . $fila["nombre"] . "<br/>";
        }
    }
} catch (PDOException $e) {
    echo "Falló la conexión: " . $e->getMessage();
}

// leer por matriz
try {
    $sql = "select * from clientes;";
    $sentencia = $conexion->prepare($sql);
    $sentencia->setFetchMode(PDO::FETCH_ASSOC);
    $sentencia->execute();

    if ($sentencia->rowCount() == 0) {
        echo "No hay registros en la base de datos o ha habido un error<br/>";
    } else {
        $personas = $sentencia->fetchAll();
        foreach ($personas as $persona) {
            echo "DNI: " . $persona["dni"] . "<br/>";
            echo "Nombre: " . $persona["nombre"] . "<br/>";
        }
    }
} catch (PDOException $e) {
    echo "Falló la conexión: " . $e->getMessage();
}

// leer por objeto
try {
    $sql = "select * from clientes;";
    $sentencia = $conexion->prepare($sql);
    $sentencia->setFetchMode(PDO::FETCH_OBJ);
    $sentencia->execute();

    if ($sentencia->rowCount() == 0) {
        echo "No hay registros en la base de datos o ha habido un error<br/>";
    } else {
        while ($t = $sentencia->fetch()) {
            echo "DNI: " . $t->dni . "<br/>";
            echo "Nombre: " . $fila->nombre . "<br/>";
        }
    }
} catch (PDOException $e) {
    echo "Falló la conexión: " . $e->getMessage();
}



// 3. INSERTAR
// prepare -> bind -> execute
try {
    $sql = "insert into clientes(nombre,dni) values(:nombre, :dni)";
    $sentencia = $conexion->prepare($sql);


    if ($sentencia->rowCount() == 0) {
        echo "No hay registros en la base de datos o ha habido un error<br/>";
    } else {
        while ($t = $sentencia->fetch()) {
            echo "DNI: " . $t->dni . "<br/>";
            echo "Nombre: " . $fila->nombre . "<br/>";
        }
    }
} catch (PDOException $e) {
    echo "Falló la conexión: " . $e->getMessage();
}

// para cerrar la conexion
$conexion = null;
?>