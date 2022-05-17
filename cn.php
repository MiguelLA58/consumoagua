<?php
$conexion = mysqli_connect("consumoagua.local", "root","datosdat05");
mysqli_set_charset($conexion, "utf8");

if (!$conexion) {
    echo 'Error al concetar a la base de datos';
}
else {
    echo '&deg;';
}

?>
