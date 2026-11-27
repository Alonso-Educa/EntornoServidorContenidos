<?php

require_once '../config/conexion.php';
require_once 'funciones.php';

if (!isset($_POST["accion"])) {
    echo "<p class='error'>Error: Faltan datos fatales</p>";
    exit;
} else {
    $accion = filtrar($_POST["accion"]) ?? "";
}

switch ($accion) {
    case "create":
        $error = "f";

        $dni = filtrar($_POST["dni"]) ?? "";
        $nombre = filtrar($_POST["nombre"]) ?? "";
        $apellido1 = filtrar($_POST["apellido1"]) ?? "";
        $apellido2 = filtrar($_POST["apellido2"]) ?? "";
        $email = filtrar($_POST["email"]) ?? "";
        $telefono = filtrar($_POST["telefono"]) ?? "";
        $ciclo = filtrar($_POST["ciclo"]) ?? "";
        $errorDni = "";
        $errorEmail = "";
        $errorTel = "";
        $errorCiclo = "";

        if (!isset($dni) || empty($dni)) {
            $error = "v";
        }
        if (!validarDni($dni)) {
            $error = "v";
            $errorDni = "El formato del dni no es correcto.";
        }
        // el dni es único: si ya existe no se inserta
        if (existeDni($dni)) {
            $error = "v";
            $errorDni = "Ya existe un alumno con ese dni.";
        }

        if (!isset($nombre) || empty($nombre)) {
            $error = "v";
        }
        if (!isset($apellido1) || empty($apellido1)) {
            $error = "v";
        }
        if (!isset($apellido2) || empty($apellido2)) {
            $error = "v";
        }

        if (!isset($email) || empty($email)) {
            $error = "v";
        }
        if (!validarEmail($email)) {
            $error = "v";
            $errorEmail = "El formato del email no es correcto.";
        }

        if (!isset($telefono) || empty($telefono)) {
            $error = "v";
        }
        if (!validarTelefono($dni)) {
            $error = "v";
            $errorTel = "El formato del telefono no es correcto.";
        }

        if (!isset($ciclo) || empty($ciclo)) {
            $error = "v";
        }
        if (!validarCiclo($ciclo)) {
            $error = "v";
            $errorCiclo = "El formato del ciclo no es correcto.";
        }

        if ($error != "v") {
            $canal = conexion();
            $sql = "insert into alumnos(dni, nombre, apellido1, apellido2, email, telefono, ciclo) values(?, ?, ?, ?, ?, ?, ?)";
            $consulta = mysqli_prepare($canal, $sql);
            if (!$consulta) {
                echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
                exit;
            }
            mysqli_stmt_bind_param($consulta, "sssssis", $dni, $nombre, $apellido1, $apellido2, $email, $telefono, $ciclo);
            // mysqli_stmt_execute devuelve true si todo ha ido bien
            $correcto = mysqli_stmt_execute($consulta);
            mysqli_stmt_close($consulta);
            mysqli_close($canal);

            if ($correcto) {
                // vuelve al listado, que se muestra actualizado
                $http = "Location: ../vista/lista_alumno.php?";
                header($http);
                exit;
            } else {
                echo "Error al insertar el alumno";
                exit;
            }
        } else {
            // vuelve al formulario porque hay errores
            $http = "Location: ../vista/form_crear_alumno.php?";

        $http .= "id_alumno=" . urlencode($id_alumno);
                $http .= "dni=" . urlencode($dni);
                $http .= "nombre=" . urlencode($nombre);
                $http .= "apellido1=" . urlencode($apellido1);
                $http .= "apellido2=" . urlencode($apellido2);
                $http .= "email=" . urlencode($email);
                $http .= "telefono=" . urlencode($telefono);
                $http .= "ciclo=" . urlencode($ciclo);
                $http .= "errorDni=" . urlencode($errorDni);
                $http .= "errorEmail=" . urlencode($errorEmail);
                $http .= "errorTel=" . urlencode($errorTel);
                $http .= "errorCiclo=" . urlencode($errorCiclo);
                
                header($http);
                exit;
        }

        break;
    case "update":
        $dia = "lunes";
        break;
    case "delete":
        $dia = "lunes";
        break;
    default:
        echo "<p class='error'>Error: Faltan datos fatales</p>";
        exit;
        break;
}
?>