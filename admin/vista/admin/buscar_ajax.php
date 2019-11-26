<!DOCTYPE html>
<html lang="es">

<head>
</head>

<body>
    <table style="width:100%" border>
        <tr>
            <th>FECHA</th>
            <th>DESTINATARIO</th>
            <th>REMITENTE</th>
            <th>ASUNTO</th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>

        </tr>
        <?php
        include '../../config/conexionBD.php';
        
        $cone = $_GET["cedula"];
        //   echo $cone;
        $tm = strlen($cone);
        //   echo "mensaje- --- --";
        $ref = substr($cone, 1, $tm - 2);
        //   echo $ref;
        $sql = "SELECT * FROM mensaje WHERE men_destinatario ='$ref' AND men_eliminado = '$vr' ORDER BY men_fecha DESC;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "   <td>" . $row["men_fecha"] . "</td>";
                echo "   <td>" . $row['men_remitente'] . "</td>";
                echo "   <td>" . $row['men_asunto'] . "</td>";
                echo "   <td>" . "<a href='../../../public/vista/leer_mensaje.php?cone=" . $ref . "&codigo=" . $row['men_codigo'] . "'>Leer</a>" . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='5'> No existe Usuarios </td>";
            echo "</tr>";
        }

        $conn->close();

        ?>
    </table>
</body>

</html>