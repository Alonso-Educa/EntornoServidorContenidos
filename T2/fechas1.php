<?php
date_default_timezone_set('Europe/Madrid');
$nuevaFecha = new DateTime(); //Se genera objeto con la fecha actual
echo $nuevaFecha->format("Y-m-d H:i:s"); // formato aceptado por date()
?>