<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Comentarios</title>
        <style>
            * {box-sizing:border-box;}
            body{font-family: Verdana;padding: 10px;background: linen}

            header{padding:30px;text-align: center;color:#1995B7;background: linen}
            header h1{width: 90%;font-size: 40px}
            header img{width: 10%;height: 80px;float:left;box-shadow: 5px 3px 5px #ff8000;border-radius:100%}


            h2 {text-align: center;font-family: verdana;padding: 40px 0px;height: 60px;width: 100%}

            .marcogrande{display: grid;width: 60%;grid-template-columns: repeat(3, 33%);margin-top: 5rem;margin: 6rem 25% 0 25%;}
            .tituloTabla{background-color: #1D64A6;color:white;grid-column-start: 1;grid-column-end: 4;font-size: 3rem;text-align: center;}
            .cabezaTabla{width:100%;grid-column-start: 1;grid-column-end: 4;background: cyan;align-items:baseline;}
            .titCabeza{font-size: 1.2rem;display: inline;background: #1D64A6;color:white;text-align: center;margin-right: 1rem;}
            .miembroTablaNombre{text-align: left;align-items: baseline;grid-column-start: 1;grid-column-end: 2;margin-top: 2rem;}
            .miembroTablaDepa{text-align: left;font-size: 1.5rem;align-items: baseline;grid-column-start: 3;grid-column-end: 4;margin-top: 2rem;}
            .miembroTablaComen{text-align: left;font-style: italic;align-items: baseline;grid-column-start: 1;grid-column-end: 4;}



            ul {list-style:none;}
            #cabecera{width:100%;background-color:#1D64A6;color:white}
            .topnav a{color:white;display:block;text-decoration:none;float:left;overflow: hidden;background-color:#165ea5;;padding:20px;}
            .topnav a:hover{background-color: #ff8000;}
            .salida {float:right}
        </style>
    </head>
    <body>
        <div id="cabecera">
            <ul class="topnav">
                <li><a href="menu.html">Inicio</a></li>
                <li><a href="Coments.php">Registar un comentario</a></li>
                <li class="salida"><a href="https://www.google.com">Salir</a></li>
            </ul>
        </div>
        <div class="marcogrande">
            <div class="tituloTabla">Comentarios</div>
            <?php
            include "./cn.php";
            $comentarios= ("SELECT * FROM consumoagua.comentarios ORDER BY id DESC ") or die("Error de conexion");
            $resultado= mysqli_query($conexion,$comentarios);
                while($row = mysqli_fetch_assoc($resultado)){ ?>
                <div class="miembroTablaNombre"><span class="titCabeza">Nombre: </span><?php echo $row["nombre"] ?></div>
                <div class="miembroTablaDepa"><span class="titCabeza">Departamento: </span><?php echo $row["departamento"] ?></div>
                <div class="miembroTablaComen"><span class="titCabeza">Comentario: <br></span><?php echo $row["mensaje"] ?></div>
            <?php } 
            mysqli_free_result($resultado); ?>
        </div>
    </body>
</html> 