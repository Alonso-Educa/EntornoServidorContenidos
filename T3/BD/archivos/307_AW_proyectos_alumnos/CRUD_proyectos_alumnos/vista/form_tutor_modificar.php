<?php
include "../controller/tutorController.php";

// recoge el id de la URL y busca ese tutor para rellenar el formulario
$id = $_GET["id"];
$tutor = listarTutorId($id);

include "encabezado.php";
?>

<h2>Modificar tutor</h2>

<form action="../controller/tutorController.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
    <input type="hidden" name="accion" value="modificar">

    DNI: <input type="text" name="dni" maxlength="15" value="<?= htmlspecialchars($tutor["dni"]) ?>" required><br>
    Nombre: <input type="text" name="nombre" maxlength="50" value="<?= htmlspecialchars($tutor["nombre"]) ?>" required><br>
    Primer apellido: <input type="text" name="apellido1" maxlength="50" value="<?= htmlspecialchars($tutor["apellido1"]) ?>" required><br>
    Segundo apellido: <input type="text" name="apellido2" maxlength="50" value="<?= htmlspecialchars($tutor["apellido2"]) ?>" required><br>
    Email: <input type="email" name="email" maxlength="100" value="<?= htmlspecialchars($tutor["email"]) ?>" required><br>
    Teléfono: <input type="text" name="telefono" maxlength="20" value="<?= htmlspecialchars($tutor["telefono"]) ?>" required><br>

    <input type="submit" value="Guardar cambios">
</form>

<a href="lista_tutor.php">Volver al listado</a>

<?php include "pie.php"; ?>
