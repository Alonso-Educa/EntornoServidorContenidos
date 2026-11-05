<?php
/*si va bien redirige a principal.php 
si va mal, mensaje de error */
if ($_POST['usuario'] === "usuario" and $_POST["clave"] === "1234") {
    header("Location:login_basico.html");
} else {
    header("Location:http://www.google.es");
}

?>