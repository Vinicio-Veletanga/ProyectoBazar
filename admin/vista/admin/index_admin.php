
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Gestion de Usuarios</title>
    <link href="../../../public/vista/estilos.css" rel="stylesheet" type="text/css" />

</head>

<body background="../../../fadminn.jpg">
    <section>
        <div class="en">
            <?php
            include '../../../config/conexionBD.php';
            $cone = $_GET["cone"];
            //   echo $cone;
            $tm = strlen($cone);
            //   echo "mensaje- --- --";
            $ref = substr($cone, 1, $tm - 2);
            //   echo $ref;
            $sqlusu = "SELECT * FROM usuario WHERE usu_correo ='$ref'";
            $result = $conn->query($sqlusu);
            $rl = mysqli_fetch_assoc($result);
            $rlt = $rl["usu_fotografia"];
            $nm =  $rl["usu_nombres"];
            $ap =  $rl["usu_apellidos"];
            ?>
            <header>
                <nav>
                    <ul>
                        <li><a href="../../../config/cerra_sesion.php">Inicio</a> </li>
                        <li> <a href="index.php?cone=<?php echo $cone?>">Usuarios</a> </li>
                    </ul>
                </nav>
            </header>

        </div>
        <div id="im">
            <img id="ima" src="../../../imagenes/<?php echo $rlt; ?>" alt="" />
            <br>
            <label id="cnt"><?php echo $nm;
                            echo "&nbsp;";
                            echo $ap ?></label>
        </div>

        <div>
            <h2>MENSAJES ELECTRONICOS</h2>
            <table style="width:100%" border>
                <tr>
                    <th>FECHA</th>
                    <th>DESTINATARIO</th>
                    <th>REMITENTE</th>
                    <th>ASUNTO</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>

                </tr>
                <?php
                include '../../../config/conexionBD.php';
                $cone = $_GET["cone"];
                echo $cone;
                $sql = "SELECT * FROM mensajes WHERE men_eliminado = 'NO' ORDER BY men_fecha DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "   <td>" . $row["men_fecha"] . "</td>";
                        echo "   <td>" . $row['men_destinatario'] . "</td>";
                        echo "   <td>" . $row['men_remitente'] . "</td>";
                        echo "   <td>" . $row['men_asunto'] . "</td>";
                        echo "   <td> <a href='eliminar_mensaje.php?codigo=" . $row['men_codigo'] . "&cone=". $ref ."'>Eliminar</a> </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo " <td colspan='10'> No existe Usuarios </td>";
                    echo "</tr>";
                }

                $conn->close();

                ?>
            </table>
        </div>
    </section>
</body>

</html>