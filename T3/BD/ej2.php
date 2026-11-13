<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2: Consultas a biblioteca</title>
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
        <h3>Ejercicio 2: Consultas a libreria</h3>
    </header>
    <?php
    include "../../../seguridad/tema03/datosBDbiblioteca.php";

    // CONSULTA 1
    $canal = @mysqli_connect(IP, USUARIO, CLAVE, BD);
    if (!$canal) {
        echo "Ha ocurrido el error: " . mysqli_connect_errno() . " " . mysqli_connect_error() . "<br />";
        exit;
    }
    echo "<p>Conexion establecida</p>";
    mysqli_set_charset($canal, "utf8");
    $sql = "select * from `libro` where tematica='Humanidades' order by posicion asc;";
    $consulta = mysqli_prepare($canal, $sql);
    if (!$consulta) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
        exit;
    }
    mysqli_stmt_execute($consulta);
    mysqli_stmt_bind_result($consulta, $isbn, $titulo, $autor, $tematica, $fecha, $n_paginas, $posicion, $ejemplar, $prestado);

    echo "<h3>Consulta 1: Mostrar los registros de los libros de la temática humanidades</h3>";
    echo "<table border='1'>";
    echo "<th>ISBN</th><th>Título</th><th>Autor</th><th>Temática</th><th>Fecha</th><th>Número de páginas</th><th>Posición</th><th>Ejemplar</th><th>Prestado</th>";

    $posAnterior = "";

    // recorre cada resultado del array devuelto
    while (mysqli_stmt_fetch($consulta)) {
        $prestado = $prestado ? "Sí" : "No";
        // imprime los datos
        echo "<tr>";
        if ($posAnterior != $isbn) {
            echo "<td class='arriba'>$isbn</td><td class='arriba'>$titulo</td><td class='arriba'>$autor</td><td class='arriba'>$tematica</td><td class='arriba'>$fecha</td>
                <td class='arriba'>$n_paginas</td><td class='arriba'>$posicion</td><td class='arriba'>$ejemplar</td><td class='arriba'>$prestado</td>";
            $posAnterior = $isbn;
        } else {
            // si una posicion tiene mas de una fila, despues de la segunda fila solo imprimira el resto de datos
            echo "<td></td><td>$titulo</td><td>$autor</td><td>$tematica</td><td>$fecha</td>
                <td>$n_paginas</td><td>$posicion</td><td>$ejemplar</td><td>$prestado</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    mysqli_stmt_close($consulta);
    mysqli_close($canal);



    // CONSULTA 2
    $canal2 = @mysqli_connect(IP, USUARIO, CLAVE, BD);
    if (!$canal2) {
        echo "Ha ocurrido el error: " . mysqli_connect_errno() . " " . mysqli_connect_error() . "<br>";
    }

    mysqli_set_charset($canal2, "utf8");

    // consulta a la base de datos
    // guarda datos de ordenacion
    $sql = "select isbn,titulo,n_paginas from `libro` where n_paginas between 200 and 500 order by n_paginas asc;";
    $consulta2 = mysqli_prepare($canal2, $sql);
    if (!$consulta2) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal2) . " " . mysqli_error($canal2) . "<br />";
        exit;
    }
    mysqli_stmt_execute($consulta2);
    mysqli_stmt_bind_result($consulta2, $isbn, $titulo, $n_paginas);

    echo "<h3>Consulta 2: Mostrar el título de los libros que contengan entre 200 y 500 páginas</h3>";
    echo "<table border='1'>";
    echo "<th>Número de páginas</th><th>ISBN</th><th>Título</th>";

    $posAnterior = "";

    // recorre cada resultado del array devuelto
    while (mysqli_stmt_fetch($consulta2)) {
        // imprime los datos
        echo "<tr>";
        echo "<td class='arriba'>$n_paginas</td><td class='arriba'>$isbn</td><td class='arriba'>$titulo</td>";
        echo "</tr>";
    }
    echo "</table>";

    mysqli_stmt_close($consulta2);
    mysqli_close($canal2);


    // CONSULTA 3
    $canal3 = @mysqli_connect(IP, USUARIO, CLAVE, BD);
    if (!$canal3) {
        echo "Ha ocurrido el error: " . mysqli_connect_errno() . " " . mysqli_connect_error() . "<br>";
    }

    mysqli_set_charset($canal3, "utf8");

    // consulta a la base de datos
    // guarda datos de ordenacion
    $sql = "select posicion,isbn,titulo,tematica from `libro` where tematica='Ciencias' order by posicion asc;";
    $consulta3 = mysqli_prepare($canal3, $sql);
    if (!$consulta3) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal3) . " " . mysqli_error($canal3) . "<br />";
        exit;
    }
    mysqli_stmt_execute($consulta3);
    mysqli_stmt_bind_result($consulta3, $posicion, $isbn,$titulo, $tematica);

    echo "<h3>Consulta 3: Mostrar la posición de los libros de ciencias</h3>";
    echo "<table border='1'>";
    echo "<th>Posición</th><th>ISBN</th><th>Título</th><th>Temática</th>";

    $posAnterior = "";

    // recorre cada resultado del array devuelto
    while (mysqli_stmt_fetch($consulta3)) {
        // imprime los datos
        echo "<tr>";
        if ($posAnterior != $posicion) {
            echo "<td class='arriba'>$posicion</td><td class='arriba'>$isbn</td><td class='arriba'>$titulo</td><td class='arriba'>$tematica</td>";
            $posAnterior = $posicion;
        } else {
            // si una posicion tiene mas de una fila, despues de la segunda fila solo imprimira el resto de datos
            echo "<td></td><td>$isbn</td><td>$titulo</td><td>$tematica</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    mysqli_stmt_close($consulta3);
    mysqli_close($canal3);



    // CONSULTA 4
    $canal4 = @mysqli_connect(IP, USUARIO, CLAVE, BD);
    if (!$canal4) {
        echo "Ha ocurrido el error: " . mysqli_connect_errno() . " " . mysqli_connect_error() . "<br>";
    }

    mysqli_set_charset($canal4, "utf8");

    // consulta a la base de datos
    // guarda datos de ordenacion
    $sql = "select isbn,titulo,autor from `libro` where autor='Eva Muela' or autor='Pedro Crespo' order by autor asc;";
    $consulta4 = mysqli_prepare($canal4, $sql);
    if (!$consulta4) {
        echo "Ha ocurrido el error: " . mysqli_errno($canal4) . " " . mysqli_error($canal4) . "<br />";
        exit;
    }
    mysqli_stmt_execute($consulta4);
    mysqli_stmt_bind_result($consulta4, $isbn, $titulo, $autor);

    echo "<h3>Consulta 4: Mostrar el título de los libros cuyos autores sean Eva Muela y Pedro Crespo</h3>";
    echo "<table border='1'>";
    echo "<th>Autor</th><th>ISBN</th><th>Título</th>";

    $posAnterior = "";

    // recorre cada resultado del array devuelto
    while (mysqli_stmt_fetch($consulta4)) {
        // imprime los datos
        echo "<tr>";
        if ($posAnterior != $autor) {
            echo "<td class='arriba'>$autor</td><td class='arriba'>$isbn</td><td class='arriba'>$titulo</td>";
            $posAnterior = $autor;
        } else {
            // si una posicion tiene mas de una fila, despues de la segunda fila solo imprimira el resto de datos
            echo "<td></td><td>$isbn</td><td>$titulo</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    mysqli_stmt_close($consulta4);
    mysqli_close($canal4);

    ?>

</body>

</html>