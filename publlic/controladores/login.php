
<?php

session_start();
include '../../config/conexionBD.php';
$usuario = isset($_POST["correo"]) ? trim($_POST["correo"]):null;
$contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]):null;

$sql = "SELECT * FROM usuario WHERE usu_correo ='$usuario' and usu_password = MD5('$contrasena') and usu_eliminado = 'N'";

$result = $conn->query($sql);
$rl = mysqli_fetch_assoc($result);
$rlt = $rl["usu_rol"];

if($result->num_rows > 0){
    $_SESSION["isLogged"] == TRUE;
    if($rlt == "admin"){
        $_SESSION['isLogged'] == TRUE;
       header("Location:../../admin/vista/admin/index_admin.php?cone='$usuario'");
    }else{

        header("Location:../../admin/vista/usuario/index_usuario.php?cone='$usuario'");
    }

}else{
    header("Location:../vista/login.html");
}

$conn->close();

?>