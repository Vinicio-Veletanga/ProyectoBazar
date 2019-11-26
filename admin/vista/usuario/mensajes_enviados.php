<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Gestion de Usuarios</title>
    <link href="../../../public/vista/estilos.css" rel="stylesheet" type="text/css" />

</head>

<body background="../../../fuserr.jpg">
    <section>
        <div>
            <?php
            $cone = $_GET["cone"];
            //  echo $cone;
            ?>
            <header>
                <nav>
                    <ul>
                        <li> <a href="index_usuario.php?cone='<?php echo $cone; ?>'">ATRAS</a> </li>
                    </ul>
                </nav>

            </header>
        </div>

        <div>
            <table style="width:100%" border>
                <tr>
                    <th>FECHA</th>
                    <th>DESTINATARIO</th>
                    <th>ASUNTO</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>

                </tr>
                <?php
                include '../../../config/conexionBD.php';
                $cone = $_GET["cone"];
                echo 'Correo: ' . $cone;
                $vr = "NO";
                $sql = "SELECT * FROM mensajes WHERE men_remitente ='$cone' AND men_eliminado = '$vr' ORDER BY men_fecha DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "   <td>" . $row["men_fecha"] . "</td>";
                        echo "   <td>" . $row['men_destinatario'] . "</td>";
                        echo "   <td>" . $row['men_asunto'] . "</td>";
                        echo "   <td>" . "<a href='leer_enviados.php?cone=" . $cone . "&codigo=" . $row['men_codigo'] . "'>Leer</a>" . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo " <td colspan='10'> No existe Mensajes Enviados </td>";
                    echo "</tr>";
                }

                $conn->close();

                ?>
            </table>
        </div>
    </section>
</body>

</html>