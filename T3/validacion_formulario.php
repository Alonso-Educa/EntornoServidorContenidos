<?php

// <!-- nom, ab, ab_o, an, an_o, fec, fec_o, rad, sel, che[], tel, ema, con, doc-->

$nom = $_POST["nom"];
$ab = $_POST["ab"];
$ab_o = $_POST["ab_o"];
$an = $_POST["an"];
$an_o = $_POST["an_o"];
$fec = $_POST["fec"];
$fec_o = $_POST["fec_o"];
$rad = $_POST["rad"];
$sel = $_POST["sel"];
$che = $_POST["che"];
$tel = $_POST["tel"];
$ema = $_POST["ema"];
$con = $_POST["con"];
$doc = $_FILES["doc"]["name"] . " (" . $_FILES["doc"]["type"] . ") " . $_FILES["doc"]["size"] . " bytes";

echo "Nombre: " . $nom . "<br>";
echo "Alfabetico: " . $ab . "<br>";
echo "Alfabetico Opcional: " . $ab_o . "<br>";
echo "Alfanumerico: " . $an . "<br>";
echo "Alfanumerico Opcional: " . $an_o . "<br>";
echo "Fecha: " . $fec . "<br>";
echo "Fecha Opcional: " . $fec_o . "<br>";
echo "Radio: " . $rad . "<br>";
echo "Selector: " . $sel . "<br>";
echo "Checkbox: ";
print_r($che);
echo "<br>";
echo "Telefono: " . $tel . "<br>";
echo "Email: " . $ema . "<br>";
echo "Contraseña: " . $con . "<br>";
echo "Documento: " . $doc . "<br>";

$validacionesExistencia = [isset($nom), isset($ab), isset($an), isset($fec), isset($rad), isset($sel), isset($che), isset($tel), isset($ema), isset($con), isset($doc)];
$validacionesFormato = [validarFormato($fec, '/^[1-2]\d{3}-[0-1]\d-[0-3]\d$/'), validarFormato($rad, '/^Opcion[^1]$/'), count($che) > 0 && count($che) < 4, validarFormato($tel, '/^[69]\d{8}$/'),validarFormato($ema, '/^.{1,}@.{1,}\..{2,}$/')];

function validarFormato($s, $exp)
{
    return preg_match($exp, $s) === 1;
}

function imprimirDatos(){
    
}
?>