<?php
// Cambiar en php.ini zona horaria
date_default_timezone_set('Europe/Madrid'); //puede fallar si contradice php.ini
if (date_default_timezone_get())
echo 'date_default_timezone_set: ' . date_default_timezone_get() . '<br />';
if (ini_get('date.timezone'))
echo 'date.timezone: ' . ini_get('date.timezone');
?>