<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3: Mostrar datos de biblioteca</title>
    <style type="text/css">
        header {
            font-family: verdana;
            font-size: 2em;
            font-weight: bold;
            color: white;
            background-color: red;
            padding: 10px;
            margin-bottom: 20px;
        }

        footer {
            position: fixed;
            bottom: 0;
            right: 0;
            width: 300px;
            background-color: red;
            font-weight: bold;
            color: white;
            margin: 5px;
            padding: 10px;
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
        <h3>Ejercicio 3: Mostrar datos de libreria</h3>
    </header>
    <section>
        <?php
        include "../../../../seguridad/tema03/datosBDbiblioteca.php";
        // Si se pone @ no se myuestran los errores por pantalla
        $canal = @mysqli_connect(IP, USUARIO, CLAVE, BD);
        if (!$canal) {
            echo "Ha ocurrido el error: " . mysqli_connect_errno() . " " . mysqli_connect_error() . "<br>";
        }

        mysqli_set_charset($canal, "utf8");
        echo "<p>Conexion establecida</p>";

        // consulta a la base de datos
        // guarda datos de ordenacion
        $sql = "select * from `ordenacion` order by posicion asc;";
        // guarda los registros en un array
        $consulta = mysqli_prepare($canal, $sql);
        if (!$consulta) {
            echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
            exit;
        }
        mysqli_stmt_execute($consulta);
        mysqli_stmt_bind_result($consulta, $posicion, $planta, $seccion, $estanteria, $descripcion);

        echo "<h3>Ordenacion:</h3>";
        echo "<table border='1'>";
        echo "<th>Posición</th><th>Planta</th><th>Sección</th><th>Estantería</th><th>Descripción</th>";

        $posAnterior = "";

        // recorre cada resultado del array devuelto
        while (mysqli_stmt_fetch($consulta)) {
            echo "<tr>";
            if ($posAnterior != $posicion) {
                echo "<td class='arriba'>$posicion</td><td class='arriba'>$planta</td><td class='arriba'>$seccion</td><td class='arriba'>$estanteria</td><td class='arriba'>$descripcion</td>";
                $posAnterior = $posicion;
            } else {
                echo "<td></td><td>$planta</td><td>$planta</td><td>$seccion</td><td>$estanteria</td><td>$descripcion</td>";
            }
            echo "</tr>";
        }
        echo "</table>";


        mysqli_stmt_close($consulta);
        mysqli_close($canal);

        $canal2 = @mysqli_connect(IP, USUARIO, CLAVE, BD);
        if (!$canal2) {
            echo "Ha ocurrido el error: " . mysqli_connect_errno() . " " . mysqli_connect_error() . "<br>";
        }

        mysqli_set_charset($canal2, "utf8");

        // consulta a la base de datos
        // guarda datos de ordenacion
        $sql2 = "select * from `libro` order by titulo asc;";
        // guarda los registros en un array
        $consulta2 = mysqli_prepare($canal2, $sql2);
        if (!$consulta2) {
            echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
            exit;
        }
        mysqli_stmt_execute($consulta2);
        mysqli_stmt_bind_result($consulta2, $isbn, $titulo, $autor, $tematica, $fecha, $n_paginas, $posicion, $ejemplar, $prestado);

        echo "<h3>Libros:</h3>";
        echo "<table border='1'>";
        echo "<th>ISBN</th><th>Título</th><th>Autor</th><th>Temática</th><th>Fecha</th><th>Número de páginas</th><th>Posición</th><th>Ejemplar</th><th>Prestado</th>";

        $posAnterior = "";

        // recorre cada resultado del array devuelto
        while (mysqli_stmt_fetch($consulta2)) {
            echo "<tr>";
            $prestado == "1" ? "Prestado" : "Sin prestar";
            if ($posAnterior != $posicion) {
                echo "<td class='arriba'>$posicion</td><td class='arriba'>$titulo</td><td class='arriba'>$autor</td><td class='arriba'>$tematica</td><td class='arriba'>$fecha</td>
                <td class='arriba'>$n_paginas</td><td class='arriba'>$ejemplar</td><td class='arriba'>$prestado</td><td class='arriba'>$posicion</td>";
                $posAnterior = $posicion;
            } else {
                echo "<td></td><td>$isbn</td><td>$titulo</td><td>$autor</td><td>$tematica</td><td>$fecha</td><td>$n_paginas</td><td>$ejemplar</td><td>$prestado</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </section>
</body>

</html>