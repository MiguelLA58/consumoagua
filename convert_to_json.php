<?php 
$conexion = mysqli_connect("127.0.0.1", "root","datosdat05","consumoagua");
mysqli_set_charset($conexion, "utf8");

if (!$conexion) {
    echo 'Error al concetar a la base de datos';
}
   	$MES = '2107';
	$registro = "SELECT * FROM consumoagua.lecturas WHERE mes = $MES ORDER BY FECHA";
	$row = "";



$consulta = mysqli_query($conexion,$registro);

$data= array();    //esto se agrega según video

while($row=mysqli_fetch_assoc($consulta)){
    //echo $row["SEC"]." ".$row["FECHA"]." ".$row["HORA"]." ".$row["LECTURA"]." ".$row["CONSUMO"]." ".$row["CONS_REAL_ACUM"]." ".$row["MES"]."<br>"; 
    $data[]=$row;    //aqui se llena el arreglo con los datos de la tabla lecturas.
} 

//var_dump($data);                                  //supongo es para visualizar el arreglo.

json_encode($data);                                 //aqui se hace la conversión de datos a json
echo json_encode($data);                            //para ver en la página si están correctos los datos
$tabla=fopen('tabla_conv.json','w');                // abre el archivo destino json con opción de escritura
fwrite($tabla,json_encode($data));                  // escribe los datos de la variable en el archivo json
fclose($tabla);                                     // cierra el archivo una vez terminada la escritura



mysqli_free_result($consulta);
mysqli_close($conexion);

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Datos de Consumo del mes</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Libre+Franklin&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Chilanka&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rancho&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    
<body>  
    
</body>
</html>