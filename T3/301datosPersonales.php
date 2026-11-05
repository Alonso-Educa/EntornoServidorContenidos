<?php
include_once('validarDatosForm.php');

// usar if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST"){ para validar si se ha entregado el form con post
// pone valores por defecto si está vacío el cmapo
if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = filtrado($_POST['nombre'] ?? "");
    $apellido1 = filtrado($_POST['ape1'] ?? "");
    $apellido2 = filtrado($_POST['ape2'] ?? "");
    $dni = filtrado($_POST['dni'] ?? "");
    $email = filtrado($_POST['ema'] ?? "");
    $fec = filtrado($_POST['fec'] ?? "");
    $telefono = filtrado($_POST['tel'] ?? "");
    $sexo = filtrado($_POST['sexo'] ?? "");
    $estudios = filtrado($_POST['est'] ?? "");
    $idiomas = filtrado(implode(", ", $_POST['idi'] ?? ["Ninguno"]));
}

// echo "<h1>Datos recibidos</h1>";
// echo "Nombre: $nombre $apellido1 $apellido2<br>";
// echo "Edad: $edad años<br>";
// echo "DNI: $dni<br>";
// echo "Email: $email<br>";
// echo "Fecha de nacimiento: $fec<br>";
// echo "Teléfono: $telefono<br>";
// echo "Sexo: $sexo<br>";
// echo "Estudios: $estudios<br>";
// echo "Idiomas: $idiomas<br>";
// echo "<img src='datosPersonales/$dni.png' width='150'><br>";
// echo "<a href='datosPersonales/$dni.pdf'>Ver currículum</a>";

// Edad a partir de la fecha de nacimiento
$edad = date_diff(date_create($fec), date_create('today'))->y;

// Se guardan los ficheros como dni.png y dni.pdf en la carpeta datosPersonales
if (!is_dir("datosPersonales")) {
    mkdir("datosPersonales");
}
// Se detecta el tipo real del fichero (no solo su extensión) y se guarda con la extensión que le corresponde
$tipos = ["image/png" => "png", "image/jpeg" => "jpg", "image/gif" => "gif", "image/webp" => "webp"];
$mime = mime_content_type($_FILES['foto']['tmp_name']);
$extension = $tipos[$mime] ?? "";

if ($extension != "") {
    move_uploaded_file($_FILES['foto']['tmp_name'], "datosPersonales/$dni.$extension");
}
move_uploaded_file($_FILES['cv']['tmp_name'], "datosPersonales/$dni.pdf");

// Nombre en la parte superior
echo "<h1>$nombre $apellido1 $apellido2</h1>";

// Una sola tabla: datos a la izquierda y foto a la derecha (celda que ocupa las 8 filas)
echo "<table border='1' cellpadding='6'>";
echo "<tr><th align='left'>Edad</th><td>$edad años</td>";
echo "<td rowspan='8'><img src='datosPersonales/$dni.$extension' width='180' alt='Foto de $nombre'></td></tr>";
echo "<tr><th align='left'>DNI</th><td>$dni</td></tr>";
echo "<tr><th align='left'>Email</th><td>$email</td></tr>";
echo "<tr><th align='left'>Fecha de nacimiento</th><td>$fec</td></tr>";
echo "<tr><th align='left'>Teléfono</th><td>$telefono</td></tr>";
echo "<tr><th align='left'>Sexo</th><td>$sexo</td></tr>";
echo "<tr><th align='left'>Estudios</th><td>$estudios</td></tr>";
echo "<tr><th align='left'>Idiomas</th><td>$idiomas</td></tr>";
echo "</table>";

// Currículum en la parte inferior
echo "<h2>Currículum</h2>";
echo "<iframe src='datosPersonales/$dni.pdf' width='100%' height='100%'></iframe>";
echo "<p><a href='datosPersonales/$dni.pdf'>Abrir currículum en otra pestaña</a></p>";

?>