<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8" />
    <title>Mensaje</title>
    <link href="../../../public/vista/estilos.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="validar.js"></script>


</head>

<body background="../../../fuserr.jpg">
    <section>
        <div>
            <?php
            $cone = $_GET["cone"];
            //echo $cone;
            ?>
            <header align="center">
                <h1>NUEVO MENSAJE</h1>
            </header>
        </div>
        
        <div>
            <form action="../../controladores/controlador_mensaje.php" method="POST" align="center">
                <input type="hidden" id="remitente" name="remitente" value="<?php echo $cone ?>" />
                <label id="Destinatario">Para :</label>
                <input type="text"  id="destinatario" name="destinatario" onkeyup=""/>
                <span id="correocorrecto"></span>
                <br>
                <br>
                <label id="Asunto">Asunto :</label>
                <input type="text" name="asunto" />
                <br>
                <br>
                <label id="Mensaje">Mensaje</label>
                <input class="pl" type="text" name="mensaje" />
                <br>
                <br>
                <div>
                <input class="btn" id="guargar" name="guardar" type="submit" value="Enviar">&nbsp;
                <input class="btn" id="borrar" name="borrar" type="Reset" value="Borrar">
                <button type="button" class="btn btn-default"><a href="index_usuario.php?cone='<?php echo $cone; ?>'">CANCELAR</a></button>
                </div>
                <br>
            </form>
        </div>
        <footer class="inf">
      Gabriel Leonardo Chuchuca Arevalo &#8226; Universidad Politecnica Salesiana &#8226; <a href="mailto:gchuchucaa@est.ups.edu.ec">gchuchucaa@est.ups.edu.ec</a> &#8226;  <a href="tel:+593-969375242">0969375242</a>
    <br>© Todos los derechos reservados
   </footer>
    </section>
</body>

</html>