<?php 
    include("cn.php");
    $comentarios = "SELECT * FROM comentarios";

?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8">

	<title>Consumo Agua</title>
        
	<link href="CSS/styles.css" rel="stylesheet" type="text/css" >
       <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Chilanka&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rancho&display=swap" rel="stylesheet">
    
</head>
<body>
    <header>
        <img src="Fotos/gallery-ds-X_tEarX6svc-unsplash.jpg">
        <h1 style="margin-left:60px;width:80%;">Sus comentarios son bienvenidos</h1>
    </header>
    
    <div id="cabecera">
        <ul class="topnav">
            <li><a href="menu.html">Inicio</a></li>
            <li><a href="verComentarios.php">Ver comentarios anteriores</a></li>
            <li><a href="http://www.google.com">Salir</a></li>
        </ul>
    </div>

        <p style="margin-top:60px; text-align: center;">Tratando de mejorar este sitio, le agradeceré me ayude con sus comentarios en el formulario siguiente:</p>
    <!----------------------------------------->    

    <form action="insertarCom.php" method="post" class="formulario" name="comentarios">
        <h1 class="formulario__titulo">Mensaje</h1>   
        <input type="text" name="nombre" class="formulario__input">
        <label for="nombre" class="formulario__label">Por favor escriba su nombre aqui</label>
        <input type="text" name="departamento" class="formulario__input">
        <label for="departamento" class="formulario__label">Por favor indique su departamento (4, 6 o 7)</label>
        <input type="text" name="mensaje" class="formulario__input">
        <label for="mensaje" class="formulario__label">Por favor registre sus comentarios aqui</label>
        <input type="submit" class="submit" value="Enviar">
		<br>Igualmente puede enviar un mensaje por WhatsApp<br> al teéfono 449-196-3959.<br> Gracias
    </form>
	
    
    
    <!-- <script type="text/javascript" src="js/comentsForm.js"></script> -->
</body>
</html>