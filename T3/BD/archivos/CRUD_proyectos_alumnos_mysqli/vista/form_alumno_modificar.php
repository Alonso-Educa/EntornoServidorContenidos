<?php
include "../controlador/alumnoController.php";

// recoge el id enviado por POST y busca ese alumno para rellenar el formulario
$alumno = listarAlumnoId($_POST["id_alumno"]);

include "encabezado.php";
?>

<h2>Modificar alumno</h2>

<form action="../controlador/alumnoController.php" method="post">
    <!-- le dice al controlador qué función ejecutar y qué alumno modificar -->
    <input type="hidden" name="accion" value="modificar">
    <input type="hidden" name="id_alumno" value="<?= $alumno["id_alumno"] ?>">

    DNI: <input type="text" name="dni" maxlength="15" value="<?= $alumno["dni"] ?>" required><br>
    Nombre: <input type="text" name="nombre" maxlength="50" value="<?= $alumno["nombre"] ?>" required><br>
    Primer apellido: <input type="text" name="apellido1" maxlength="50" value="<?= $alumno["apellido1"] ?>"
        required><br>
    Segundo apellido: <input type="text" name="apellido2" maxlength="50" value="<?= $alumno["apellido2"] ?>"
        required><br>
    Email: <input type="email" name="email" maxlength="100" value="<?= $alumno["email"] ?>" required><br>
    Teléfono: <input type="text" name="telefono" maxlength="20" value="<?= $alumno["telefono"] ?>" required><br>
    Ciclo: <input type="text" name="ciclo" maxlength="50" value="<?= $alumno["ciclo"] ?>" required><br>

    <input type="submit" value="Guardar cambios">
</form>

<a href="vista_alumno.php">Volver al listado</a>

<?php include "pie.php"; ?>