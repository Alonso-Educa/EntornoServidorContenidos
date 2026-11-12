<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1: Datos de biblioteca</title>
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
        <h3>Ejercicio 1: Datos de libreria</h3>
    </header>
    <section>
        <?php
        include "../../../seguridad/tema03/datosBDbiblioteca.php";
        // Si se pone @ no se myuestran los errores por pantalla
        $canal = @mysqli_connect(IP, USUARIO, CLAVE, BD);
        if (!$canal) {
            echo "Ha ocurrido el error: " . mysqli_connect_errno() . " " . mysqli_connect_error() . "<br>";
        }

        mysqli_set_charset($canal, "utf8");
        echo "<p>Conexion establecida</p>";

        // consulta a la base de datos
        // guarda datos de ordenacion
        $sql = "select * from `ordenacion` order by titulo asc;";
        // guarda los registros en un array
        $consulta = mysqli_prepare($canal, $sql);
        if (!$consulta) {
            echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
            exit;
        }
        mysqli_stmt_execute($consulta);
        mysqli_stmt_bind_result($consulta, $posicion, $planta, $seccion, $estanteria, $descripcion);

        echo "<table border='1'>";
        echo "<th>Posición</th><th>Planta</th><th>Sección</th><th>Estantería</th><th>Descripción</th>";

        $posAnterior = "";

        // recorre cada resultado del array devuelto
        while (mysqli_stmt_fetch($consulta)) {
            echo "<tr>";
            if ($posAnterior != $dni) {
                echo "<td class='arriba'>$posicion</td><td class='arriba'>$planta</td><td class='arriba'>$seccion</td><td class='arriba'>$estanteria</td><td class='arriba'>$descripcion</td>";
                $posAnterior = $dni;
            } else {
                echo "<td></td><td>$planta</td><td>$planta</td><td>$seccion</td><td>$estanteria</td><td>$descripcion</td>";
            }
            echo "</tr>";

            // consulta a la base de datos para los numeros de cuenta de cada usuario
            $consulta2 = "select ccc from `posee` where dni='$dato[dni]';";
            // guarda el array de cuentas
            $cuentas = mysqli_query($canal, $consulta2);

            $cont = 0;
            // imprime los datos
            foreach ($cuentas as $cuenta) {
                echo "<tr>";
                if ($cont == 0) {
                    echo "<td>$dato[nombre]</td>";
                    echo "<td>$dato[dni]</td>";
                    echo "<td>$cuenta[ccc]</td>";
                } else {
                    // si un usuario tiene mas de una cuenta, despues de la segunda fila solo imprimira el numero de cuenta
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td>$cuenta[ccc]</td>";
                }
                echo "</tr>";
                $cont++;
            }
        }
        echo "</table>";


        mysqli_close($canal);
        ?>
    </section>
</body>

</html>