<?php
include "../controller/alumnoController.php";
include "../controller/proyectoController.php";

// recoge el id de la URL y busca ese proyecto para rellenar el formulario
$id = $_GET["id"];
$proyecto = listarProyectoId($id);

// alumnos para el desplegable
$listaAlumnos = listarAlumno();

// opciones de los otros desplegables
$periodos = array("diciembre", "mayo");
$cursos = array("2024_2025", "2025_2026", "2026_2027");

include "encabezado.php";
?>

<h2>Modificar proyecto</h2>

<form action="../controller/proyectoController.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
    <input type="hidden" name="accion" value="modificar">

    <label for="titulo">Título: </label>
    <input type="text" name="titulo" id="titulo" maxlength="100" value="<?= htmlspecialchars($proyecto["titulo"]) ?>" required><br>

    <label for="descripcion">Descripción: </label><br>
    <textarea name="descripcion" id="descripcion" rows="4" cols="40" required><?= htmlspecialchars($proyecto["descripcion"]) ?></textarea><br>

    <label for="periodo">Periodo: </label>
    <select name="periodo" id="periodo" required>
        <option value="">-- Seleccionar periodo --</option>
        <?php foreach ($periodos as $opcion) { ?>
            <option value="<?= $opcion ?>" <?= $opcion == $proyecto["periodo"] ? "selected" : "" ?>><?= $opcion ?></option>
        <?php } ?>
    </select><br>

    <label for="curso">Curso: </label>
    <select name="curso" id="curso" required>
        <option value="">-- Seleccionar curso --</option>
        <?php foreach ($cursos as $opcion) { ?>
            <option value="<?= $opcion ?>" <?= $opcion == $proyecto["curso"] ? "selected" : "" ?>><?= $opcion ?></option>
        <?php } ?>
    </select><br>

    <label for="fecha_presentacion">Fecha de presentación: </label>
    <input type="date" name="fecha_presentacion" id="fecha_presentacion" value="<?= $proyecto["fecha_presentacion"] ?>" required><br>

    <label for="nota">Nota (opcional): </label>
    <input type="number" name="nota" id="nota" min="0" max="10" step="0.01" value="<?= $proyecto["nota"] ?>"><br>

    Logotipo actual: <img src="<?= imagenDatos($proyecto["logotipo"]) ?>" alt="logotipo" width="50"><br>
    <label for="logotipo">Nuevo logotipo (opcional, máximo 1 MB): </label>
    <input type="file" name="logotipo" id="logotipo" accept="image/*"><br>

    PDF actual: <a href="<?= urlPdf($proyecto["pdf_proyecto"]) ?>" target="_blank">Ver PDF</a><br>
    <label for="pdf_proyecto">Nuevo PDF (opcional): </label>
    <input type="file" name="pdf_proyecto" id="pdf_proyecto" accept="application/pdf"><br>

    <label for="alumno">Alumno: </label>
    <select name="alumno" id="alumno" required>
        <option value="">-- Seleccionar alumno --</option>
        <?php foreach ($listaAlumnos as $alumno) { ?>
            <option value="<?= $alumno["id_alumno"] ?>" <?= $alumno["id_alumno"] == $proyecto["alumno"] ? "selected" : "" ?>>
                <?= htmlspecialchars($alumno["nombre"] . " " . $alumno["apellido1"] . " " . $alumno["apellido2"]) ?>
            </option>
        <?php } ?>
    </select><br>

    <input type="submit" value="Guardar cambios">
</form>

<a href="lista_proyecto.php">Volver al listado</a>

<?php include "pie.php"; ?>
