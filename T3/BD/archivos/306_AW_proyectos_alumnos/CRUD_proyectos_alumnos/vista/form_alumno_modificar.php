<?php
include "../controller/alumnoController.php";

// recoge el id de la URL y busca ese alumno para rellenar el formulario
$id = $_GET["id"];
$alumno = listarAlumnoId($id);

// opciones del desplegable de ciclo
$ciclos = array("DAW", "DAM", "ASIR");

include "encabezado.php";
?>

<h2>Modificar alumno</h2>

<form action="../controller/alumnoController.php" method="POST" enctype="multipart/form-data">
    <!-- le dice al controlador qué función ejecutar y qué alumno modificar -->
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
    <input type="hidden" name="accion" value="modificar">

    DNI: <input type="text" name="dni" maxlength="15" value="<?= htmlspecialchars($alumno["dni"]) ?>" required><br>
    Nombre: <input type="text" name="nombre" maxlength="50" value="<?= htmlspecialchars($alumno["nombre"]) ?>" required><br>
    Primer apellido: <input type="text" name="apellido1" maxlength="50" value="<?= htmlspecialchars($alumno["apellido1"]) ?>" required><br>
    Segundo apellido: <input type="text" name="apellido2" maxlength="50" value="<?= htmlspecialchars($alumno["apellido2"]) ?>" required><br>
    Email: <input type="email" name="email" maxlength="100" value="<?= htmlspecialchars($alumno["email"]) ?>" required><br>
    Teléfono: <input type="text" name="telefono" maxlength="20" value="<?= htmlspecialchars($alumno["telefono"]) ?>" required><br>
    Ciclo:
    <select name="ciclo" required>
        <option value="">-- Seleccionar ciclo --</option>
        <?php foreach ($ciclos as $opcion) { ?>
            <!-- selected deja marcado el ciclo actual del alumno -->
            <option value="<?= $opcion ?>" <?= $opcion == $alumno["ciclo"] ? "selected" : "" ?>><?= $opcion ?></option>
        <?php } ?>
    </select><br>

    <input type="submit" value="Guardar cambios">
</form>

<a href="lista_alumno.php">Volver al listado</a>

<?php include "pie.php"; ?>
