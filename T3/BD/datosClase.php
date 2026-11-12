<?php
$alumno = "";
 
if (isset($_POST["alumno"])) {
    $alumno = $_POST["alumno"];
}
 
$modulo = "";
 
if (isset($_POST["modulo"])) {
    $modulo = $_POST["modulo"];
}
?>
<!doctype html>
<html lang="es">
 
<head>
    <meta charset="utf-8" />
    <title>Ejemplo 3: Datos de alumnos</title>
    <style type="text/css">
        header {
            padding: 20px;
            font-size: 2em;
            font-weight: bold;
            background-color: red;
            color: white;
            margin-bottom: 15px;
        }
 
        article {
            width: 40%;
            margin: 0 auto;
        }
 
        table {
            border-collapse: collapse;
        }
 
        tr:nth-child(even) {
            background-color: #cacaca;
            ----
        }
 
        th {
            background-color: green;
            color: white;
        }
 
        th,
        td {
            padding: 5px;
        }
 
        .arriba {
            border-top: 1px solid black;
        }
    </style>
</head>
 
<body>
    <header>
        Ejemplo 3: Datos de alumnos
    </header>
    <form action="datosClase.php" method="POST">
 
        <label for="alumno">Nombre del alumno: </label>
        <input type="text" name="alumno" id="alumno" placeholder="alumno" value="<?= $alumno ?>">
        <br>
 
        <label for="modulo">Nombre del modulo: </label>
        <input type="text" name="modulo" id="modulo" placeholder="modulo" value="<?= $modulo ?>">
        <br>
 
        <br>
        <input type="submit" value="Enviar">
 
    </form>
    <section>
        <?php
 
        include "../../../seguridad/tema03/datosBDclase.php";

        $canal = @mysqli_connect(IP, USUARIO, CLAVE, BD);
        if (!$canal) {
            echo "Ha ocurrido el error: " . mysqli_connect_errno() . " " . mysqli_connect_error() . "<br />";
            exit;
        }
        mysqli_set_charset($canal, "utf8");
 
        $sql = "select a.dni,a.nombre,c.codigo,m.nombre from alumno a, cursa c, modulo m where a.dni=c.dni and m.codigo=c.codigo and a.nombre like '%$alumno%'";
        // $sql = "select m.nombre, m.n_horas , a.nombre from alumno a join cursa c on a.dni=c.dni join modulo m on m.codigo=c.codigo where a.nombre like '%$alumno%'";

        $consulta = mysqli_prepare($canal, $sql);
        if (!$consulta) {
            echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
            exit;
        }
        mysqli_stmt_execute($consulta);
        mysqli_stmt_bind_result($consulta, $dni, $nombre, $cod, $nombreM);
        ?>
        <article>
            <table>
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Codigo</th>
                    <th>Nombre del módulo</th>
                </tr>
                <?php
                $dniAnterior = "";
                while (mysqli_stmt_fetch($consulta)) {
                    echo "<tr>";
                    if ($dniAnterior != $dni) {
                        echo "<td class='arriba'>$dni</td><td class='arriba'>$nombre</td><td class='arriba'>$cod</td><td class='arriba'>$nombreM</td>";
                        $dniAnterior = $dni;
                    } else {
                        echo "<td></td><td></td><td>$cod</td><td>$nombreM</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </article>
        <?php
        mysqli_stmt_close($consulta);
        mysqli_close($canal);
 
        $canal2 = @mysqli_connect(IP, USUARIO, CLAVE, BD);
        if (!$canal2) {
            echo "Ha ocurrido el error: " . mysqli_connect_errno() . " " . mysqli_connect_error() . "<br />";
            exit;
        }
        mysqli_set_charset($canal2, "utf8");
        $sql = "select m.nombre, m.n_horas , a.nombre from alumno a, cursa c, modulo m where a.dni=c.dni and m.codigo=c.codigo and m.nombre like '%$modulo%'";
        // $sql = "select m.nombre, m.n_horas , a.nombre from alumno a, join cursa c on a.dni=c.dni join modulo m on m.codigo=c.codigo where m.nombre like '%$modulo%'";
        $consulta2 = mysqli_prepare($canal2, $sql);
        if (!$consulta2) {
            echo "Ha ocurrido el error: " . mysqli_errno($canal2) . " " . mysqli_error($canal2) . "<br />";
            exit;
        }
        mysqli_stmt_execute($consulta2);
        mysqli_stmt_bind_result($consulta2, $nombreModulo, $horasModulo, $nombreAlumno);
        ?>
        <article>
            <table>
                <tr>
                    <th>Nombre del módulo</th>
                    <th>Horas del módulo</th>
                    <th>Nombre del alumno</th>   
                </tr>
                <?php
                $nombreAlumnoAnterior = "";
                while (mysqli_stmt_fetch($consulta2)) {
                    echo "<tr>";
                    if ($nombreAlumnoAnterior != $nombreAlumno) {
                        echo "<td class='arriba'>$nombreModulo</td><td class='arriba'>$horasModulo</td><td class='arriba'>$nombreAlumno</td>";
                        $nombreAlumnoAnterior = $nombreAlumno;
                    } else {
                        echo "<td></td><td></td><td>$nombreAlumno</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </article>
        <?php
        mysqli_stmt_close($consulta2);
        mysqli_close($canal2);
        ?>
        <section>
</body>
 
</html>