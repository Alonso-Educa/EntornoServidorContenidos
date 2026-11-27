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

?>

<h3>Eliminación de alumnos:</h3>

<table border="1">
    <thead>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Apellido1</th>
        <th>Apellido2</th>
        <th>Email</th>
        <th>Teléfono</th>
        <th>Ciclo</th>
    </thead>
    <tbody>
        <?php
        echo "<td>$dni</td><td>$nombre</td><td>$apellido1</td><td>$apellido2</td><td>$email</td><td>$telefono</td><td>$ciclo</td>";
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="9" style="border: none;"><small>Tabla de datos del alumno</small></td>
        </tr>
    </tfoot>
</table>

<form action="../controlador/alumno_controlador.php" method="POST">
    <br><b>¿Desea eliminar al alumno?</b>
    <input type="hidden" id="accion" name="accion" value="delete">
    <input type="hidden" name="id_alumno" value="<?= $id_alumno ?>">
    <input type="submit" value="Eliminar alumno">
</form>

<?php

require_once '../vista/pie.php';

?>