<?php

require_once '../config/conexion.php';

$conexion = conexion();

$sql = "select * from alumnos";
$consulta = mysqli_prepare($conexion, $sql);

if (!$consulta) {
    echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
    exit;
}
mysqli_stmt_execute($consulta);
mysqli_stmt_bind_result($consulta, $id_alumno, $dni, $nombre, $apellido1, $apellido2, $email, $telefono, $ciclo);

?>
<h3>Datos de los alumnos</h3>
<!-- boton que lleva al formulario de create -->
<form action="../vista/form_alumno_crear.php">
    <button type="submit">Agregar</button>
</form>

<table border="1">
    <thead>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Apellido1</th>
        <th>Apellido2</th>
        <th>Email</th>
        <th>Teléfono</th>
        <th>Ciclo</th>
        <th>Modificar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        <?php
        while (mysqli_stmt_fetch($consulta)) {
            echo "<tr>";
            echo "<td>$dni</td><td>$nombre</td><td>$apellido1</td><td>$apellido2</td><td>$email</td><td>$telefono</td><td>$ciclo</td>";
            ?>
            <td>
                <form action="../vista/form_alumno_modificar.php" method="GET">
                    <input type="hidden" name="id_alumno" value="<?= htmlspecialchars($id_alumno) ?>">
                    <input type="hidden" name="dni" value="<?= htmlspecialchars($dni) ?>">
                    <input type="hidden" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
                    <input type="hidden" name="apellido1" value="<?= htmlspecialchars($apellido1) ?>">
                    <input type="hidden" name="apellido2" value="<?= htmlspecialchars($apellido2) ?>">
                    <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
                    <input type="hidden" name="telefono" value="<?= htmlspecialchars($telefono) ?>">
                    <input type="hidden" name="ciclo" value="<?= htmlspecialchars($ciclo) ?>">
                    <input type="submit" value="Modificar">
                </form>
            </td>
            <td>
                <form action="../vista/form_alumno_eliminar.php" method="GET">
                    <input type="hidden" name="id_alumno" value="<?= htmlspecialchars($id_alumno) ?>">
                    <input type="hidden" name="dni" value="<?= htmlspecialchars($dni) ?>">
                    <input type="hidden" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
                    <input type="hidden" name="apellido1" value="<?= htmlspecialchars($apellido1) ?>">
                    <input type="hidden" name="apellido2" value="<?= htmlspecialchars($apellido2) ?>">
                    <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
                    <input type="hidden" name="telefono" value="<?= htmlspecialchars($telefono) ?>">
                    <input type="hidden" name="ciclo" value="<?= htmlspecialchars($ciclo) ?>">
                    <input type="submit" value="Eliminar">
                </form>
            </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="9" style="border: none;"><small>Tabla de datos de alumnos</small></td>
        </tr>
    </tfoot>
</table>

<?php
mysqli_stmt_close($consulta);
mysqli_close($conexion);
?>