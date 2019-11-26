<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Insertar</title>
    
</head>

<body>
    <?php
    include '../../config/conexionBD.php';
    $remi = isset($_POST["remitente"]) ? mb_strtolower(trim($_POST["remitente"]), 'UTF-8') : null;
    $des = isset($_POST["destinatario"]) ? mb_strtolower(trim($_POST["destinatario"]), 'UTF-8') : null;
    $asu = isset($_POST["asunto"]) ? mb_strtolower(trim($_POST["asunto"]), 'UTF-8') : null;
    $mens = isset($_POST["mensaje"]) ? mb_strtolower(trim($_POST["mensaje"]), 'UTF-8') : null;
    
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());

    $sql = " INSERT INTO mensajes VALUES(0,'$fecha','$des','$remi','$asu','$mens','NO')";

    if ($conn->query($sql) == TRUE) {
        echo "<p>Se envio el mensaje</p>";
        header("Location:../vista/usuario/nuevo_mensaje.php?cone=$remi");
        

    } else {
        if ($conn->ermo == 1062) {
            echo "<p class='error'>La perosona con la cedula $asu ya esta</p>";
        } else {
            echo "<p class='error'> Error" . mysqli_error($conn) . "</p>";
        }
    }

    $conn->close();
    echo "<a href='../vista/usuario/nuevo_mensaje.php'?cone=$remi>Regresar</a>";


    ?>
</body>

</html>