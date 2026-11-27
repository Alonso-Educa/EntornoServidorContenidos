<?php

require_once '../vista/encabezado.php';
require_once '../controlador/funciones.php';

if (!isset($_GET["id_alumno"])) {
    echo "<p class='error'>Error: Faltan los datos del alumno</p>";
    exit;
}

$id_alumno = filtrar($_GET["id_alumno"]) ?? "";
$dni = filtrar($_GET["dni"]) ?? "";
$nombre = filtrar($_GET["nombre"]) ?? "";
$apellido1 = filtrar($_GET["apellido1"]) ?? "";
$apellido2 = filtrar($_GET["apellido2"]) ?? "";
$email = filtrar($_GET["email"]) ?? "";
$telefono = filtrar($_GET["telefono"]) ?? "";
$ciclo = filtrar($_GET["ciclo"]) ?? "";
$errores = filtrar($_GET["errores"]) ?? "";
$errorDni = filtrar($_GET["errorDni"]) ?? "";
$errorEmail = filtrar($_GET["errorEmail"]) ?? "";
$errorTel = filtrar($_GET["errorTel"]) ?? "";
$errorCiclo = filtrar($_GET["errorCiclo"]) ?? "";

?>

<h3>Formulario de modificación de alumnos:</h3>

<form action="../controlador/alumno_controlador.php" method="POST">
    <p class="error"><? $errores ?></p>
    <p>
        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" value="<?= $dni ?>" required>
        <span class="error"><? $errorDni ?></span>
    </p>
    <p>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= $nombre ?>" required>
    </p>
    <p>
        <label for="apellido1">Apellido 1:</label>
        <input type="text" id="apellido1" name="apellido1" value="<?= $apellido1 ?>" required>
    </p>
    <p>
        <label for="apellido2">Apellido 2:</label>
        <input type="text" id="apellido2" name="apellido2" value="<?= $apellido2 ?>" required>
    </p>
    <p>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?= $email ?>" required>
        <span class="error"><? $errorEmail ?></span>
    </p>
    <p>
        <label for="telefono">Teléfono:</label>
        <input type="number" id="telefono" name="telefono" value="<?= $telefono ?>" required>
        <span class="error"><? $errorTel ?></span>
    </p>
    <p>
        <label for="ciclo">Ciclo (en mayúsculas):</label>
        <input type="text" id="ciclo" name="ciclo" value="<?= $ciclo ?>" required>
        <span class="error"><? $errorCiclo ?></span>
    </p>
    <input type="hidden" name="id_alumno" value="<?= $id_alumno ?>">
    <input type="hidden" id="accion" name="accion" value="update">
    <input type="submit" value="Modificar alumno">
</form>

<?php

require_once '../vista/pie.php';

?>