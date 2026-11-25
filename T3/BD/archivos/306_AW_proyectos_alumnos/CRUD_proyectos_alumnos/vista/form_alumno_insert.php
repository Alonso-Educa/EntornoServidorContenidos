<?php
// opciones del desplegable de ciclo
$ciclos = array("DAW", "DAM", "ASIR");

include "encabezado.php";
?>

<h2>Agregar alumno</h2>

<form action="../controller/alumnoController.php" method="POST" enctype="multipart/form-data">
    <!-- le dice al controlador qué función ejecutar -->
    <input type="hidden" name="accion" value="crear">

    DNI: <input type="text" name="dni" maxlength="15" required><br>
    Nombre: <input type="text" name="nombre" maxlength="50" required><br>
    Primer apellido: <input type="text" name="apellido1" maxlength="50" required><br>
    Segundo apellido: <input type="text" name="apellido2" maxlength="50" required><br>
    Email: <input type="email" name="email" maxlength="100" required><br>
    Teléfono: <input type="text" name="telefono" maxlength="20" required><br>
    Ciclo:
    <select name="ciclo" required>
        <option value="">-- Seleccionar ciclo --</option>
        <?php foreach ($ciclos as $opcion) { ?>
            <option value="<?= $opcion ?>"><?= $opcion ?></option>
        <?php } ?>
    </select><br>

    <input type="submit" value="Guardar">
</form>

<a href="lista_alumno.php">Volver al listado</a>

<?php include "pie.php"; ?>
