<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexion a mysql - Datos de la tabla banco</title>
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
    </style>
</head>

<body>
    <header>
        <h3>Ejemplo 2: Datos del banco</h3>
    </header>
    <section>
        <?php
        include "../../../seguridad/tema03/datosBDbanco.php";
        // Si se pone @ no se myuestran los errores por pantalla
        $canal = @mysqli_connect(IP, USUARIO, CLAVE, BD);
        if (!$canal) {
            echo "Ha ocurrido el error: " . mysqli_connect_errno() . " " . mysqli_connect_error() . "<br>";
        }

        mysqli_set_charset($canal, "utf8");
        echo "<p>Conexion establecida</p>";

        // consulta a la base de datos
        // $consulta = "select * from `posee` order by dni asc;";

        // guarda nombre y dni de los usuarios con cuenta
        $consulta = "select posee.dni as dni, clientes.nombre as nombre from `posee` inner join `clientes` on posee.dni=clientes.dni group by nombre order by nombre asc;";
        // guarda los registros en un array
        $listaCuentas = mysqli_query($canal, $consulta);

        echo "<table border='1'>";
        echo "<th>Nombre</th><th>DNI</th><th>Código de cuenta</th>";

        // comprobamos que el servidor devuelva resultados
        if ($listaCuentas) {
            // recorre cada resultado del array devuelto
            foreach ($listaCuentas as $dato) {
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
        }

        mysqli_close($canal);
        ?>
    </section>
</body>

</html>