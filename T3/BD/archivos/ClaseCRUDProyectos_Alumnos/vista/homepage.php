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
<form action="../alumno_crear.php">
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
            echo "<td><a href='../conalumno_modificar.php'>Editar</td>";
            echo "<td><a href='alumno_eliminar.php'>Eliminar</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
    <tfoot>
        <tr><td><small>Tabla de datos de alumnos</small></td></tr>
    </tfoot>
</table>

<?php
mysqli_stmt_close($consulta);
mysqli_close($conexion);
?>