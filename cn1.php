<?php
$conexion = mysqli_connect("consumoagua.local", "root","datosdat05","consumoagua");
mysqli_set_charset($conexion, "utf8");

if (!$conexion) {
    echo 'Error al conectar a la base de datos';
}
else {
    echo '&deg;';
}

?>
