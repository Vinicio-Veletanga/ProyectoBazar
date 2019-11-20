<?php
// detalles de la conexion
$conn_string = "host='localhost' port='5432' dbname='bazarzalamea' user='postgres' password='GuabO*1920' ";
// establecemos una conexion con el servidor postgresSQL
$dbconn = pg_connect($conn_string) or die("Error de conexion".preg_last_error());
// Revisamos el estado de la conexion en caso de errores. 
if(!$dbconn) {
echo "<p>Error: No se ha podido conectar a la base de datos</p>";
} else {
    echo "<p> Conexion exitosa perro</p>";
}
// Close connection
pg_close($dbconn);
 
?>