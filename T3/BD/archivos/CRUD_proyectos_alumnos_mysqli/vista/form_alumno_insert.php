<?php include "encabezado.php"; ?>

<h2>Agregar alumno</h2>

<form action="../controlador/alumnoController.php" method="post">
    <!-- le dice al controlador qué función ejecutar -->
    <input type="hidden" name="accion" value="insertar">

    DNI: <input type="text" name="dni" maxlength="15" required><br>
    Nombre: <input type="text" name="nombre" maxlength="50" required><br>
    Primer apellido: <input type="text" name="apellido1" maxlength="50" required><br>
    Segundo apellido: <input type="text" name="apellido2" maxlength="50" required><br>
    Email: <input type="email" name="email" maxlength="100" required><br>
    Teléfono: <input type="text" name="telefono" maxlength="20" required><br>
    Ciclo: <input type="text" name="ciclo" maxlength="50" required><br>

    <input type="submit" value="Guardar">
</form>

<a href="vista_alumno.php">Volver al listado</a>

<?php include "pie.php"; ?>