<?php
$ccc = "";
if (isset($_POST["ccc"])) {
    $ccc = strip_tags(trim($_POST["ccc"]));
}

include "../../../../seguridad/tema03/datosBDbanco.php";

$canal = @mysqli_connect(IP, USUARIO, CLAVE, BD);
if (!$canal) {
    echo "Ha ocurrido el error: " . mysqli_connect_errno() . " " . mysqli_connect_error() . "<br />";
    exit;
}
mysqli_set_charset($canal, "utf8");

$sql = "select c.ccc, sum(m.cantidad) from cuentas c left join movimientos m on m.ccc=c.ccc where c.ccc=? group by c.ccc";
$consulta = mysqli_prepare($canal, $sql);
if (!$consulta) {
    echo "Ha ocurrido el error: " . mysqli_errno($canal) . " " . mysqli_error($canal) . "<br />";
    exit;
}
mysqli_stmt_bind_param($consulta, "s", $ccc);
mysqli_stmt_execute($consulta);
mysqli_stmt_bind_result($consulta, $cccBD, $saldo);
$existe = mysqli_stmt_fetch($consulta);
mysqli_stmt_close($consulta);
mysqli_close($canal);

if (!$existe) {
    header("Location: solicitarSaldo.php?ccc=" . urlencode($ccc) . "&mensaje=" . urlencode("La cuenta introducida no existe"));
    exit;
}
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Saldo</title>
    <style type="text/css">
        header {
            padding: 20px;
            font-size: 2em;
            font-weight: bold;
            background-color: red;
            color: white;
            margin-bottom: 15px;
        }

        article {
            width: 50%;
            margin: 0 auto;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }

        tr:nth-child(even) {
            background-color: #cacaca;
        }

        th {
            background-color: green;
            color: white;
        }

        th,
        td {
            padding: 5px;
        }

        .arriba {
            border-top: 1px solid black;
        }
    </style>
</head>

<body>
    <header>
        Saldo de la cuenta
    </header>
    <section>
        <article>
            <table>
                <tr>
                    <th>CCC</th>
                    <th>Saldo total</th>
                </tr>
                <tr>
                    <td class='arriba'><?= htmlspecialchars(strip_tags($cccBD)) ?></td>
                    <td class='arriba'><?= htmlspecialchars(strip_tags($saldo)) ?> €</td>
                </tr>
            </table>
            <p><a href="solicitarSaldo.php">Consultar otra cuenta</a></p>
        </article>
    </section>
</body>

</html>