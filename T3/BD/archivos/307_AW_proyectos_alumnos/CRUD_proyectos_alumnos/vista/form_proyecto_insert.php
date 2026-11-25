<?php
include "../controller/alumnoController.php";
include "../controller/tutorController.php";

// alumnos y tutores para los desplegables (se reutilizan las funciones de cada CRUD)
$listaAlumnos = listarAlumno();
$listaTutores = listarTutor();

// opciones de los otros desplegables
$periodos = array("diciembre", "mayo");
$cursos = array("2024_2025", "2025_2026", "2026_2027");

include "encabezado.php";
?>

<h2>Agregar proyecto</h2>

<form action="../controller/proyectoController.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="accion" value="crear">

    <label for="titulo">Título: </label>
    <input type="text" name="titulo" id="titulo" maxlength="100" required><br>

    <label for="descripcion">Descripción: </label><br>
    <textarea name="descripcion" id="descripcion" rows="4" cols="40" required></textarea><br>

    <label for="periodo">Periodo: </label>
    <select name="periodo" id="periodo" required>
        <option value="">-- Seleccionar periodo --</option>
        <?php foreach ($periodos as $opcion) { ?>
            <option value="<?= $opcion ?>"><?= $opcion ?></option>
        <?php } ?>
    </select><br>

    <label for="curso">Curso: </label>
    <select name="curso" id="curso" required>
        <option value="">-- Seleccionar curso --</option>
        <?php foreach ($cursos as $opcion) { ?>
            <option value="<?= $opcion ?>"><?= $opcion ?></option>
        <?php } ?>
    </select><br>

    <label for="fecha_presentacion">Fecha de presentación: </label>
    <input type="date" name="fecha_presentacion" id="fecha_presentacion" required><br>

    <label for="nota">Nota (opcional): </label>
    <input type="number" name="nota" id="nota" min="0" max="10" step="0.01"><br>

    <label for="logotipo">Logotipo (imagen, máximo 1 MB): </label>
    <input type="file" name="logotipo" id="logotipo" accept="image/*" required><br>

    <label for="pdf_proyecto">PDF del proyecto: </label>
    <input type="file" name="pdf_proyecto" id="pdf_proyecto" accept="application/pdf" required><br>

    <label for="alumno">Alumno: </label>
    <select name="alumno" id="alumno" required>
        <option value="">-- Seleccionar alumno --</option>
        <?php foreach ($listaAlumnos as $alumno) { ?>
            <!-- se muestra el nombre completo pero se envía el id -->
            <option value="<?= $alumno["id_alumno"] ?>">
                <?= htmlspecialchars($alumno["nombre"] . " " . $alumno["apellido1"] . " " . $alumno["apellido2"]) ?>
            </option>
        <?php } ?>
    </select><br>

    <label for="tutor">Tutor: </label>
    <select name="tutor" id="tutor" required>
        <option value="">-- Seleccionar tutor --</option>
        <?php foreach ($listaTutores as $tutor) { ?>
            <option value="<?= $tutor["id_tutor"] ?>">
                <?= htmlspecialchars($tutor["nombre"] . " " . $tutor["apellido1"] . " " . $tutor["apellido2"]) ?>
            </option>
        <?php } ?>
    </select><br>

    <input type="submit" value="Guardar">
</form>

<a href="lista_proyecto.php">Volver al listado</a>

<?php include "pie.php"; ?>
