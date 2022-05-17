<?php 
error_reporting(0);
include "./cn.php";
$Mes = $_GET['mes'];

$contenido = "SELECT * FROM consumoagua.contenido WHERE mes = $Mes";

$tiktok = "SELECT * FROM consumoagua.contenido WHERE mes = (SELECT MAX(mes) FROM consumoagua.contenido WHERE mes < $Mes) ";
$toktik = "SELECT * FROM consumoagua.contenido WHERE mes = (SELECT MIN(mes) FROM consumoagua.contenido WHERE mes > $Mes) ";

$dime = mysqli_query($conexion,$tiktok);
$digo = mysqli_query($conexion,$toktik);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/DTD/strict.dtd">
<html>
<head>
    <meta charset="UTF-8">
	
    <title><?php $consulta=mysqli_query($conexion,$contenido);
	                 $row=mysqli_fetch_assoc($consulta);
	                 echo $row["mesL"]; ?></title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Libre+Franklin&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Chilanka&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rancho&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    
<body>
 
    <header>
        <imagen>
        <img src="Fotos/gallery-ds-X_tEarX6svc-unsplash.jpg" alt="Foto">
        </imagen>
    <h1>Consumo Agua</h1>
    </header>
    
    <div id="cabecera">
        <ul class="topnav">
            <li><a href="menu.html">Inicio</a></li>
            <li><a href="vmes.php?mes='<?php $mesant=mysqli_fetch_assoc($dime);
                        echo $mesant["mes"]; ?>'">Mes anterior</a></li>
            <li><a href="Consulta21.php?mes='<?php echo $row["mes"];?>'">Datos</a></li>
            <li><a href="Informacion/<?php echo $row["mes"];?>/<?php echo $row["presen"]; ?>">Presentación</a></li>
            <li><a href="vmes.php?mes='<?php $mespos=mysqli_fetch_assoc($digo);
                        echo $mespos["mes"]; ?>'">Mes siguiente</a></li>
            <li><a href="Mensaje.html">Comentarios</a></li>
            <li class="salida"><a href="http://www.google.com">Salir</a></li>
        </ul>
    </div>
    <p class="titulo"><?php $consulta=mysqli_query($conexion,$contenido);
	                 $row=mysqli_fetch_assoc($consulta);
	                 echo $row["mesL"]; ?></p>
    
    <section class="informacion">
    
    <div class="col1">
    
                <?php $consulta=mysqli_query($conexion,$contenido);
	                 $row=mysqli_fetch_assoc($consulta);
	                 echo $row["nota1"]; ?>
    
    </div>
    
    <div class="col2">
        
				<?php $consulta=mysqli_query($conexion,$contenido);
	                 $row=mysqli_fetch_assoc($consulta);
	                 echo $row["nota2"]; ?>
    </div>
    <div class="col3">
        
               <?php $consulta=mysqli_query($conexion,$contenido);
	                 $row=mysqli_fetch_assoc($consulta);
	                 echo $row["nota3"]; ?>
     </div>
    </section>
    
    
    <div class="graficon">
       <!--div class="renglon1"-->
        <div class="celda celda1">
            <a href="Informacion/<?php echo $row["mes"];?>/<?php echo $row["foto1"]; ?>">
            <img src="Informacion/<?php echo $row["mes"];?>/<?php echo $row["foto1"]; ?>" alt="Foto">
            </a>
        </div>
        <div class="celda celda2">
            <a href="Informacion/<?php echo $row["mes"];?>/<?php echo $row["foto2"]; ?>">
            <img src="Informacion/<?php echo $row["mes"];?>/<?php echo $row["foto2"]; ?>"  alt="Foto">
            </a>
        </div>
        <!--/div-->
        <!--div class="renglon2"-->
        <div class="celda celda3">
            <a href="Informacion/<?php echo $row["mes"];?>/<?php echo $row["foto3"]; ?>">
            <img src="Informacion/<?php echo $row["mes"];?>/<?php echo $row["foto3"]; ?>"  alt="Foto" >
            </a>
        </div>
        <div class="celda celda4">
            <a href="Informacion/<?php echo $row["mes"];?>/<?php echo $row["foto4"]; ?>">
            <img src="Informacion/<?php echo $row["mes"];?>/<?php echo $row["foto4"]; ?>"  alt="Foto">
            </a>
        </div>
        <!--/div-->
    </div>
    
    <div class="consul_datos">
            
    </div>      
    
    <div class="consul_info">
        <a href="Informacion/<?php echo $row["mes"];?>/<?php echo $row["presen"]; ?>">Presentación con la información</a>
    </div>
     
     
       

  
    
<footer>&copy; Aguascalientes, Mexico, &copy;2021</footer>   
</body>

</html>