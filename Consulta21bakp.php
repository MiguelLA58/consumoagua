<?php 
    include "./cn.php";
   	$MES = $_GET["mes"];
/*Consultas para definir rango de datos de la tabla, maximo y minimo*/
	$registro = "SELECT * FROM consumoagua.lecturas WHERE mes = $MES ORDER BY FECHA";
	$min = "SELECT MIN(consumo) FROM consumoagua.lecturas WHERE mes = $MES";
	$elmin = mysqli_query($conexion,$min);
	$mino=mysqli_fetch_assoc($elmin);
	$bajo = ($mino["MIN(consumo)"]);
	$max = "SELECT MAX(consumo) FROM consumoagua.lecturas WHERE mes = $MES";
	$elmax = mysqli_query($conexion,$max);
	$maxo = mysqli_fetch_assoc($elmax);
	$alto = ($maxo["MAX(consumo)"]);
	$row = "";

	
/*Consulta de mes anterior y siguiente */	$contenido = "SELECT * FROM consumoagua.contenido WHERE mes = $MES";
	$tiktok = "SELECT * FROM consumoagua.contenido WHERE mes = (SELECT MAX(mes) FROM consumoagua.contenido WHERE mes < $MES) ";
	$toktik = "SELECT * FROM consumoagua.contenido WHERE mes = (SELECT MIN(mes) FROM consumoagua.contenido WHERE mes > $MES) ";
	$dime = mysqli_query($conexion,$tiktok);
	$digo = mysqli_query($conexion,$toktik);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Datos de Consumo del mes</title>
    <link href="CSS/styles.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Libre+Franklin&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Chilanka&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rancho&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    
<body>
    <header>
        <imagen>
        <img src="Fotos/gallery-ds-X_tEarX6svc-unsplash.jpg">
        </imagen>
    <h1>Consumo de Agua</h1>
    </header>
    
    <div class="cabecera">
		<ul class="topnav">
			<li><a href="menu.html">Inicio</a></li>
			<li><a href="Consulta21.php?mes='<?php $mesant=mysqli_fetch_assoc($dime);
						echo $mesant["mes"]; ?>'">Mes anterior</a></li>
			<li><a href="Consulta21.php?mes='<?php $mespos=mysqli_fetch_assoc($digo);
						echo $mespos["mes"]; ?>'">Mes siguiente</a></li>
			<li><a href="Mensaje.html">Comentarios</a></li>
			<li><a href="http://www.google.com">Salir</a></li>
		</ul>
    </div>
    <p class="titulo"><?php $pidemes=mysqli_query($conexion,$contenido);
	                 $dato=mysqli_fetch_assoc($pidemes);
	                 echo $dato["mesL"]; ?></p>
        <section class="tabladatos">
			<table class="tabla">
				<caption>CONSUMO DE AGUA DEP 4, 6 Y 7 EN METROS CUBICOS</caption>
				<tr><th>SEC</th><th>FECHA</th><th>HORA</th><th> LECTURA </th><th>CONSUMO REAL</th><th>CONS REAL ACUM</th></tr>
					<?php $consulta = mysqli_query($conexion,$registro);
					while($row=mysqli_fetch_assoc($consulta)){  ?>
					<tr><td><?php echo $row["SEC"]?></td>
					    <td><?php echo $row["FECHA"]?></td>
						<td><?php echo $row["HORA"]?></td>
						<td><?php echo $row["LECTURA"]?></td>
						<?php 
							if ($row["CONSUMO"] == $bajo){
								echo "<td style='background-color:green;color:white;'>".$row["CONSUMO"];
							}
							elseif ($row["CONSUMO"] == $alto){
								echo "<td style='background-color:red;color:yellow;'>".$row["CONSUMO"];
							}
							else
								echo "<td>".$row["CONSUMO"]; ?></td>
						<td><?php echo $row["CONS_REAL_ACUM"]?></td>
					</tr>
				<?php } mysqli_free_result($consulta);mysqli_close($conexion);?>
			</table>
		</section>

	
	
 <footer>Aguascalientes, Mexico, &copy;2019 - 2021</footer>  
</body>
</html>