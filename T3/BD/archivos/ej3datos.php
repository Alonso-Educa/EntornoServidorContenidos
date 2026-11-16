<?php

include "../../../../seguridad/tema03/datosBDbiblioteca.php";

function filtrado($datos)
{
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

$correcto = "v";
$mensaje = "";

$canal = @mysqli_connect(IP, USUARIO, CLAVE, BD);
if (!$canal) {
    echo "Ha ocurrido el error: " . mysqli_connect_errno() . " " . mysqli_connect_error() . "<br />";
    exit;
}

mysqli_set_charset($canal, "utf8");

if (!empty($_POST["tipo"]) && $_POST["tipo"] == "libro") {
    $isbn = $titulo = $autor = $tematica = $fecha = $n_paginas = $posicion = $ejemplar = $prestado = "";

    // se comprueban los datos
    if (empty($_POST["isbn"])) {
        $correcto = "f";
        $mensaje = "No puede haber campos vacios";
    } else {
        $isbn = filtrado($_POST["isbn"]);
    }

    if (empty($_POST["titulo"])) {
        $correcto = "f";
        $mensaje = "No puede haber campos vacios";
    } else {
        $titulo = filtrado($_POST["titulo"]);
    }

    if (empty($_POST["autor"])) {
        $correcto = "f";
        $mensaje = "No puede haber campos vacios";
    } else {
        $autor = filtrado($_POST["autor"]);
    }

    if (empty($_POST["tematica"])) {
        $correcto = "f";
        $mensaje = "No puede haber campos vacios";
    } else {
        $tematica = filtrado($_POST["tematica"]);
    }

    if (empty($_POST["fecha"])) {
        $correcto = "f";
        $mensaje = "No puede haber campos vacios";
    } else {
        $fecha = filtrado($_POST["fecha"]);
    }

    if (empty($_POST["n_paginas"])) {
        $correcto = "f";
        $mensaje = "No puede haber campos vacios";
    } else {
        $n_paginas = filtrado($_POST["n_paginas"]);
    }

    if (empty($_POST["posicion"])) {
        $correcto = "f";
        $mensaje = "No puede haber campos vacios";
    } else {
        $posicion = filtrado($_POST["posicion"]);
    }

    if (empty($_POST["ejemplar"])) {
        $correcto = "f";
        $mensaje = "No puede haber campos vacios";
    } else {
        $ejemplar = filtrado($_POST["ejemplar"]);
    }

    if (!isset($_POST["prestado"]) || $_POST["prestado"] === "") {
        $correcto = "f";
        $mensaje = "No puede haber campos vacios";
    } else {
        $prestado = filtrado($_POST["prestado"]);
    }

    if ($correcto == "v") {
        $consultaInsert = $canal->prepare("insert into libro(isbn,titulo,autor,tematica,fecha,n_paginas,posicion,ejemplar,prestado) value(?,?,?,?,?,?,?,?,?)");

        // date = string, bit = integer
        $consultaInsert->bind_param("sssssissi", $isbn, $titulo, $autor, $tematica, $fecha, $n_paginas, $posicion, $ejemplar, $prestado);

        if ($consultaInsert->execute()) {
            // se insertan los datos y se muestra la lista de datos
            header("Location: ej3mostrar.php");
            $consultaInsert->close();
            mysqli_close($canal);
            exit();

        } else {
            // error en la consulta
            echo "Error: " . $consultaInsert->error;
            $consultaInsert->close();
            mysqli_close($canal);
            exit;
        }
    } else {
        // error en los datos así que se vuelve al formulario
        $http = "Location: ej3libro.php?";
        //----
        $http .= "mensaje=" . urlencode($mensaje);
        //----
        $http .= "&isbn=" . urlencode($isbn);
        $http .= "&titulo=" . urlencode($titulo);
        $http .= "&autor=" . urlencode($autor);
        $http .= "&tematica=" . urlencode($tematica);
        $http .= "&fecha=" . urlencode($fecha);
        $http .= "&n_paginas=" . urlencode($n_paginas);
        $http .= "&posicion=" . urlencode($posicion);
        $http .= "&ejemplar=" . urlencode($ejemplar);
        $http .= "&prestado=" . urlencode($prestado);
        //----
        header($http);
        mysqli_close($canal);
        exit;
    }

} else if (!empty($_POST["tipo"]) && $_POST["tipo"] == "ordenacion") {
    $posicion = $planta = $seccion = $estanteria = $descripcion = "";

    // se comprueban los datos
    if (empty($_POST["posicion"])) {
        $correcto = "f";
        $mensaje = "No puede haber campos vacios";
    } else {
        $posicion = filtrado($_POST["posicion"]);
    }

    if (empty($_POST["planta"])) {
        $correcto = "f";
        $mensaje = "No puede haber campos vacios";
    } else {
        $planta = filtrado($_POST["planta"]);
    }

    if (empty($_POST["seccion"])) {
        $correcto = "f";
        $mensaje = "No puede haber campos vacios";
    } else {
        $seccion = filtrado($_POST["seccion"]);
    }

    if (empty($_POST["estanteria"])) {
        $correcto = "f";
        $mensaje = "No puede haber campos vacios";
    } else {
        $estanteria = filtrado($_POST["estanteria"]);
    }

    if (empty($_POST["descripcion"])) {
        $correcto = "f";
        $mensaje = "No puede haber campos vacios";
    } else {
        $descripcion = filtrado($_POST["descripcion"]);
    }

    if ($correcto == "v") {
        $consultaInsert = $canal->prepare("insert into ordenacion(posicion,planta,seccion,estanteria,descripcion) value(?,?,?,?,?)");

        // date = string, bit = integer
        $consultaInsert->bind_param("siiis", $posicion, $planta, $seccion, $estanteria, $descripcion);

        if ($consultaInsert->execute()) {
            // se insertan los datos y se muestra la lista de datos
            header("Location: ej3mostrar.php");
            $consultaInsert->close();
            mysqli_close($canal);
            exit;

        } else {
            // error en la consulta
            echo "Error: " . $consultaInsert->error;
            $consultaInsert->close();
            mysqli_close($canal);
            exit;
        }
    } else {
        // error en los datos así que se vuelve al formulario
        $http = "Location: ej3ordenacion.php?";
        //----
        $http .= "mensaje=" . urlencode($mensaje);
        //----
        $http .= "&posicion=" . urlencode($posicion);
        $http .= "&planta=" . urlencode($planta);
        $http .= "&seccion=" . urlencode($seccion);
        $http .= "&estanteria=" . urlencode($estanteria);
        $http .= "&descripcion=" . urlencode($descripcion);
        //----
        header($http);
        mysqli_close($canal);
        exit;
    }

} else {
    $tipo = $_POST["tipo"];
    header("Location: ej3$tipo.php");
    mysqli_close($canal);
    exit;
}

?>