<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Ejemplo 02 - Inyección SQL</title>
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
            width: 50%;
            margin: 0 auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        tr:nth-child(even) {
            background-color: #cacaca;
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

        .buscador {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        Ejemplo 2: Vulnerabilidad SQL Injection en Búsqueda
    </header>
    <section>
        <article>
            <!-- Formulario introducido para recibir la entrada del usuario -->
            <div class="buscador">
                <form action="" method="GET">
                    <label for="nombre">Buscar cliente por nombre:</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Ej: Antonio">
                    <input type="submit" value="Buscar">
                </form>
            </div>

            <?php
            include "../../seguridad/tema03/datosBD.php";
            $canal = @mysqli_connect(IP, USUARIO, CLAVE, BD);
            if (!$canal) {
                echo "Ha ocurrido el error: " . mysqli_connect_errno() . " " . mysqli_connect_error() . "<br />";
                exit;
            }
            mysqli_set_charset($canal, "utf8");

            // Solo ejecutamos la consulta si el usuario ha enviado el formulario
            if (isset($_GET['nombre'])) {
                $nombre_buscado = $_GET['nombre'];

                // VULNERABILIDAD: Se concatena directamente la variable del usuario en la cadena SQL
                // y se cambia mysqli_prepare por mysqli_query para permitir la inyección.
                // Introducir: %' OR '1'='1
                $sql = "SELECT c.dni, c.nombre, p.ccc FROM clientes c, posee p WHERE c.dni=p.dni AND c.nombre LIKE '%$nombre_buscado%' ORDER BY 2";

                echo "<p><strong>Consulta ejecutada en el servidor:</strong> <code>$sql</code></p>";

                $resultados = mysqli_query($canal, $sql);

                if (!$resultados) {
                    echo "Ha ocurrido un error en la consulta: " . mysqli_error($canal) . "<br />";
                } else {
                    if (mysqli_num_rows($resultados) > 0) {
                        ?>
                        <table>
                            <tr>
                                <th>DNI</th>
                                <th>NOMBRE</th>
                                <th>CCC</th>
                            </tr>
                            <?php
                            $dniAnterior = "";
                            while ($fila = mysqli_fetch_assoc($resultados)) {
                                $dni = $fila['dni'];
                                $nombre = $fila['nombre'];
                                $ccc = $fila['ccc'];

                                echo "<tr>";
                                if ($dniAnterior != $dni) {
                                    echo "<td class='arriba'>$dni</td><td class='arriba'>$nombre</td><td class='arriba'>$ccc</td>";
                                    $dniAnterior = $dni;
                                } else {
                                    echo "<td></td><td></td><td>$ccc</td>";
                                }
                                echo "</tr>";
                            }
                            ?>
                        </table>
                        <?php
                    } else {
                        echo "<p>No se encontraron resultados para ese nombre.</p>";
                    }
                }
            }

            mysqli_close($canal);
            ?>
        </article>
    </section>
</body>

</html>