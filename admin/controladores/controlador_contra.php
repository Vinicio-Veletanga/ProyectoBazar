<!DOCTYPE html> 
<html> 
    <head> 
        <meta charset="UTF-8"> 
        <title>Modificar contraseña </title> 
    </head> 
    
    <body> 
        <?php 
        
        //incluir conexión a la base de datos 
        include '../../config/conexionBD.php'; 
        $rlt = $_GET["cone"];
        
        $codigo = $_POST["codigo"];     
        $contrasena1 = isset($_POST["contrasena1"]) ? trim($_POST["contrasena1"]) : null;
        $contrasena2 = isset($_POST["contrasena2"]) ? trim($_POST["contrasena2"]) : null;

        $sqlContrasena1 = "SELECT * FROM usuario where usu_codigo=$codigo and
        usu_password=MD5('$contrasena1')";

        $result1 = $conn->query($sqlContrasena1);
       
        if ($result1->num_rows > 0) {
        date_default_timezone_set("America/Guayaquil");
        $fecha = date('Y-m-d H:i:s', time());

        $sqlContrasena2 = "UPDATE usuario " .
        "SET usu_password = MD5($contrasena2), " .
        "usu_fecha_modificacion = '$fecha' " .
        "WHERE usu_codigo = $codigo";
        
        if ($conn->query($sqlContrasena2) === TRUE) {
        echo "Se ha actualizado la contraseña correctamemte!!!<br>";
        } } 
        echo "<a href='../vista/usuario/mi_cuenta.php?cone=" . $rlt ."'>Regresar</a>"; 
        $conn->close();
       
        
        ?> 
    </body> 
</html>