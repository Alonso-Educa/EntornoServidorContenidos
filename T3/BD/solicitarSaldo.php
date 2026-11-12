<?php

if(isset($_GET["ccc"])){
    $ccc=$_GET["ccc"];
}

if(isset($_GET["mensaje"])){
    $ccc=$_GET["mensaje"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar saldo del banco</title>
</head>
<body>
    <p style="color:red"><?$mensaje?></p>
    <form>
        <label for="ccc">Código de cuenta: </label>
        <input type="text" id="ccc" name="ccc" maxlength="24" value="<?$ccc?>">
        <button type="submit" value="Enviar"></button>
    </form>
</body>
</html>