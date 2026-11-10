<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexion a mysql</title>
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
        <h3>Ejemplo 1</h3>
    </header>
    <section>
        <?php
        // seguridad esta fuera de la carpeta htdocs que es publica
        include "../../../../seguridad/tema03/datosBDclase.php";
        // Si se pone @ no se myuestran los errores por pantalla
        $canal = @mysqli_connect(IP, USUARIO, CLAVE, BD);
        if (!$canal) {
            echo "Ha ocurrido el error: " . mysqli_connect_errno() . " " . mysqli_connect_error() . "<br>";
        }

        mysqli_set_charset($canal, "utf8");
        echo "<p>Conexion establecida</p>";
        mysqli_close($canal);
        ?>
    </section>
</body>

</html>