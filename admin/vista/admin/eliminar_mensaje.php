<!DOCTYPE html> 
<html> 
    <head>     
        <meta charset="UTF-8">     
        <title>Eliminar datos de persona </title> 
        </head>
<body background="../../../fadminn.jpg">
    <?php  
    include '../../../config/conexionBD.php';   
    //incluir conexión a la base de datos     include '../../../config/conexionBD.php';  
    $codigo = $_GET["codigo"];
    $usuco = $_GET['cone'];
    $flt ="'".$usuco."'"; 
             
    //Si voy a eliminar físicamente el registro de la tabla     
    //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'"; 
    date_default_timezone_set("America/Guayaquil");     
    $fecha = date('Y-m-d H:i:s', time()); 
    echo "$fecha";
    echo "$codigo";    
    $sql = "UPDATE mensajes SET men_eliminado = 'SI' WHERE men_codigo = $codigo"; 
    if ($conn->query($sql) === TRUE) {                 
        echo "<p>Se ha eliminado los datos correctamemte!!!</p>";
        header("Location:index_admin.php?cone=$flt");
             
    } else {                 
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";             
    }     echo "<a href='../vista/usuario/index.php'>Regresar</a>"; 
    $conn->close();      
    ?> 
</body> 
</html>