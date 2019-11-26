<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Gestion de Usuarios</title>
    <link href="../../../public/vista/estilos.css" rel="stylesheet" type="text/css" />

</head>

<body background="../../../fadminn.jpg">
    <section>
        <div>
            <?php
            include '../../../config/conexionBD.php';
            $cone = $_GET["cone"];
             echo $cone;
            $tm = strlen($cone);
              echo $tm;
            $ref = substr($cone, 1, $tm - 2);
    echo $ref;
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
                        <li> <a href="index_admin.php?cone=<?php echo "$cone";?>">Atras</a> </li>
                    </ul>
                </nav>
            </header>

        </div>
        <div>
        <h2>USUARIOS</h2>
            <table style="width:100%" border>
                <tr>
                    <th>CEDULA</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>DIRECCION</th>
                    <th>TELEFONO</th>
                    <th>CORREO</th>
                    <th>FECHA_NACIMINETO</th>
                    <th>ELIMINAR</th>
                    <th>MODIFICAR</th>
                    <th>CAMBIAR_CONTRASEÑA</th>
                </tr>
                <?php
                 $cone = $_GET["cone"];
                include '../../../config/conexionBD.php';
                $sql = "SELECT * FROM usuario WHERE usu_eliminado ='N' AND usu_rol='usua';";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "   <td>" . $row["usu_cedula"] . "</td>";
                        echo "   <td>" . $row['usu_nombres'] . "</td>";
                        echo "   <td>" . $row['usu_apellidos'] . "</td>";
                        echo "   <td>" . $row['usu_direccion'] . "</td>";
                        echo "   <td>" . $row['usu_telefono'] . "</td>";
                        echo "   <td>" . $row['usu_correo'] . "</td>";
                        echo "   <td>" . $row['usu_fecha_nacimiento'] . "</td>";
                        echo "   <td> <a href='eliminar_usuario.php?codigo=" . $row['usu_codigo'] . "& cone=". $ref ."'>Eliminar</a> </td>";
                        echo "   <td> <a href='modificar_usuario.php?codigo=" . $row['usu_codigo'] . "& cone=". $ref ."'>Modificar</a> </td>";
                        echo "   <td> <a href='modificar_contrasena.php?codigo=" . $row['usu_codigo'] . "&cone=". $ref ."'>Cambiar contraseña</a> </td>";
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