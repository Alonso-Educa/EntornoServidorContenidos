<?php
$directorioSubida = "uploads/";
$max_file_size = "51200";
$extensionesValidas = array("jpg", "png", "gif");
if (isset($_POST["submit"]) && isset($_FILES['imagen'])) {
    $errores = array();
    $nombreArchivo = $_FILES['imagen']['name'];
    $filesize = $_FILES['imagen']['size'];
    $directorioTemp = $_FILES['imagen']['tmp_name'];
    $tipoArchivo = $_FILES['imagen']['type'];
    $arrayArchivo = pathinfo($nombreArchivo);
    $extension = $arrayArchivo['extension'];
    // Comprobamos la extensión del archivo
    if (!in_array($extension, $extensionesValidas)) {
        $errores[] = "La extensión del archivo no es válida o no se ha subido ningún archivo";
    }
    // Comprobamos el tamaño del archivo
    if ($filesize > $max_file_size) {
        $errores[] = "La imagen debe de tener un tamaño inferior a 50 kb";
    }
    // Comprobamos y renombramos el nombre del archivo
    $nombreArchivo = $arrayArchivo['filename'];
    $nombreArchivo = preg_replace("/[^A-Z0-9._-]/i", "_", $nombreArchivo);
    $nombreArchivo = $nombreArchivo . rand(1, 100);
    // Desplazamos el archivo si no hay errores
    if (empty($errores)) {
        $nombreCompleto = $directorioSubida . $nombreArchivo . "." . $extension;
        move_uploaded_file($directorioTemp, $nombreCompleto);
        print "El archivo se ha subido correctamente";
    }
}

/*
 * $_FILES['imagen']['error'] devuelve un integer con el número de error:
 *
 * UPLOAD_ERR_OK         0  No hay errores
 * UPLOAD_ERR_INI_SIZE   1  Supera el tamaño máximo indicado en php.ini
 * UPLOAD_ERR_FORM_SIZE  2  Supera el tamaño máximo indicado en MAX_FILE_SIZE de html
 * UPLOAD_ERR_PARTIAL    3  Sólo se ha subido el archivo parcialmente
 * UPLOAD_ERR_NO_FILE    4  No se ha subido ningún archivo
 * UPLOAD_ERR_NO_TMP_DIR 6  Falta la carpeta temporal
 * UPLOAD_ERR_CANT_WRITE 7  No se puede escribir en el directorio especificado
 * UPLOAD_ERR_EXTENSION  8  Una extensión de PHP ha detenido la subida
 */
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de teoria 2</title>
</head>

<body>
    <h2>Formulario subida de archivos</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
        <input type="file" name="imagen" />
        <input type="submit" name="submit" />
    </form>
</body>

</html>