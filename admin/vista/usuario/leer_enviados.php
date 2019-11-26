<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>MI_CUENTA</title>

    <link href="" rel="stylesheet" type="text/css" />


</head>

<body background="../../../fuserr.jpg">
    <section>
        <?php
        session_start();
        $cone = $_GET["cone"];
        ?>
        <div class="cb">
            <header>
                <nav>
                    <ul>
                        <li> <a href="mensajes_enviados.php?cone=<?php echo $cone; ?>">ATRAS</a> </li>
                    </ul>
                </nav>

            </header>
        </div>
        <?php
        $cone = $_GET["cone"];
        echo $cone;
        $codi = $_GET["codigo"];
        echo $codi;
        include '../../../config/conexionBD.php';
        echo "</br>";
        $sql = "SELECT * FROM mensajes WHERE men_codigo = '$codi'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <form id="formulario01" method="POST" action="../../controladores/controlador_eliminar.php">

                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $cedula ?>" />

                    <label for="Fecha">Fecha (*)</label>
                    <input type="text" id="fecha" name="fecha" value="<?php echo $row["men_fecha"]; ?>" disabled />
                    <br>

                    <label for='Destinatario'>Destinatario (*)</label>
                    <input type="text" id="destinatario" name="destinatario" value="<?php echo $row["men_destinatario"]; ?>" disabled />
                    <br>
                    <label for='Asunto'>Asunto (*)</label>
                    <input type="text" id="asunto" name="asunto" value="<?php echo $row["men_asunto"]; ?>" disabled />
                    <br>
                    <label for="Contenido">Mensjae (*)</label>
                    <input type="text" id="contenido" name="contenido" value="<?php echo $row["men_contenido"]; ?>" disabled />
                    <br>
                    <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
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