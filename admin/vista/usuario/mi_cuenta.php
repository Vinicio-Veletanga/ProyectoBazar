<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8" />
    <title>MI_CUENTA</title>
    <link href="" rel="stylesheet" type="text/css" />
</head>

<body background="../../../fuserr.jpg">
    <section>
        <div>
            <?php
            session_start();
            $cone = $_GET["cone"];
            ?>
            <header>
                <nav>
                    <ul>
                        <li> <a href="index_usuario.php?cone='<?php echo $cone; ?>'">ATRAS</a> </li>
                    </ul>
                </nav>

            </header>
        </div>
        <?php

        $cone = $_GET["cone"];
        // echo $cone;
        include '../../../config/conexionBD.php';
        echo "</br>";
        $sql = "SELECT * FROM usuario WHERE usu_correo = '$cone' ";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <form id="formulario01" method="POST" action="../../controladores/controlador_actualizar.php?codigo=<?php echo $row["usu_codigo"]; ?>& cone=<?php echo $cone; ?>" align="center">

                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $row["usu_codigo"]; ?>" />
                    <br>
                    <input type="hidden" id="usuco" name="usuco" value="<?php echo $cone ?>" />
                    <br>
                    <label for='Imagen'>Imagen (*)</label>
                    <img id="yt" src="../../../imagenes/<?php echo $row["usu_fotografia"]; ?>" alt="" />
                    <br>
                    <br>
                    <label for='cedula'>Cedula (*)</label>
                    <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" />
                    <br>
                    <br>
                    <label for='nombres'>Nombres (*)</label>
                    <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" />
                    <br>
                    <br>

                    <label for="apellidos">Apelidos (*)</label>
                    <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" />
                    <br>
                    <br>

                    <label for="direccion">Dirección (*)</label>
                    <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" />
                    <br>
                    <br>
                    <label for="telefono">Teléfono (*)</label>
                    <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" />
                    <br>
                    <br>
                    <label for="fecha">Fecha Nacimiento (*)</label>
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" />
                    <br>
                    <br>
                    <label for="correo">Correo electrónico (*)</label>
                    <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" />
                    <br>
                    <br>
                    <?php echo "   <td> <a href='modificar_contrasena.php?codigo=" . $row['usu_codigo'] . "&cone=". $cone ."'>Cambiar contraseña</a> </td>"?>
                    <br>
                    <br>

                    <div>
                        <input class="btn" type="submit" id="modificar" name="modificar" value="Modificar" />
                        <button type="button" class="btn btn-default"> <a href="index_usuario.php?cone='<?php echo $cone; ?>'">ATRAS</a></button>
                    </div>

                </form>


            <?php

        }
    } else {
        echo " <p> colspan='10'> EROORRRRR!!!!!! </p>";
        echo "<p>" . mysqli_error($conn) . "</p>";
    }

    $conn->close();
    ?>
    </section>
</body>