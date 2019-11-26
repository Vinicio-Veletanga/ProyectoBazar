
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Gestion de Usuarios</title>
    <script type="text/javascript" src="../../../public/vista/ajax.js"></script>
    <link href="../../../public/vista/estilos.css" rel="stylesheet" type="text/css" />

</head>

<body background="../../../fuserr.jpg">
    <section>
        <div class="en">
            <header>
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
            
                <nav>
                    <ul>
                        <li> <a href="../../../config/cerra_sesion.php">Inicio</a> </li>
                        <li> <a href="nuevo_mensaje.php?cone=<?php echo $ref; ?>">Nuevo Mensaje</a> </li>
                        <li> <a href="mensajes_enviados.php?cone=<?php echo $ref; ?>">Mensajes Enviados</a> </li>
                        <li> <a href="mi_cuenta.php?cone=<?php echo $ref; ?>">Mi Cuenta</a> </li>
                    </ul>
                </nav>
             
            </header>
        </div>

        <div id="im">
            <img id="ima" src="../../../imagenes/<?php echo $rlt; ?>" alt="" />
            <br>
            <label><?php echo $nm;
                    echo "&nbsp;";
                    echo $ap ?></label>
        </div>
        <br>
        <input type="text" id="correobus" name="correobus" value=""  placeholder="Buscar por Remitente ..." >
        <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarcedula()">
        <br>
        <div>
            <h2>Mensajes Recibidos</h2>
            <table style="width:100%" border="3px" >
                <tr>
                    <th>FECHA</th>
                    <th>REMITENTE</th>
                    <th>ASUNTO</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                </tr>
                <?php
                include '../../../config/conexionBD.php';
                $vr = "NO";
                $sql = "SELECT * FROM mensajes WHERE men_destinatario ='$ref' AND men_eliminado = '$vr' ORDER BY men_fecha DESC;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "   <td>" . $row["men_fecha"] . "</td>";
                        echo "   <td>" . $row['men_remitente'] . "</td>";
                        echo "   <td>" . $row['men_asunto'] . "</td>";
                        echo "   <td>" . "<a href='leer_mensaje.php?cone=" . $ref . "&codigo=" . $row['men_codigo'] . "'>Leer</a>" . "</td>";

                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo " <td colspan='4'> No existen Mensajes Recibidos</td>";
                    echo "</tr>";
                }

                $conn->close();
                ?>
            </table>
        </div>

    </section>

</body>

</html>