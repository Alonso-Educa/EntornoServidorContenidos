<?php
function saludar($edad, $nombre = 'usuario')
{
    echo "Hola $nombre, tienes $edad años.<br />";
}
saludar(12); // Hola usuario
saludar(44, "Lola","a"); // Hola Lolo tienes 44 años
?>