<?php 
    error_reporting(0);
    include "cn.php";
    if(isset($_POST['entrar'])){
        $ruser = $conexion->real_escape_string($_POST['usuario']);
        $rpass = $conexion->real_escape_string($_POST['pass']);
        $entrada = "SELECT * FROM consumoagua.usuario WHERE usuario = '$ruser' AND clave = '$rpass'";
        $resultado = mysqli_query($conexion,$entrada);
        if($resultado){
            while($row = mysqli_fetch_array($resultado)){
                $userok = $row['usuario'];
                $passok = $row['clave'];
            }
            echo $userok," ",$passok;
        $resultado->close();
        }
    $conexion->close();
        if(isset($ruser) && isset($rpass)){
            if($ruser == $userok && $rpass == $passok){
                $_SESSION['login'] = TRUE;
                $_SESSION['usuario'] = $usuario;
                header("location:menu.html");
            }
            else{
                $mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Sus datos no son correctos</strong> Por favor verifique sus datos.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span></button> 
                    </div>";
            }
        }
        else{
            $mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Sus datos no son correctos</strong> Por favor verifique sus datos.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span></button> 
                    </div>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumo Agua</title>
    <link href="CSS/styles.css" rel="stylesheet" type="text/css" >
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Chilanka&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rancho&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
</head>
<body>
    <div class="contaniner py-4">
        <div class="row justify-content-center h-100 py-4">
            <div class="card col-sm-6 col-md-6 col-lg-6 shadow-lg p-3 mb-5 bg-white rounded">
                <article class="card-body">
                    <h4 class="card-title-text-center">Ingresar </h4>
                    <hr>
                    <p class="text-success text-center">Introduzca sus datos</p>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="usuario" placeholder="Usuario" class="form-control">
                            </div>
                            <div class="input-group py-2">
                                <input type="password" name="pass" placeholder="Password" class="form-control">
                            </div>
                            <div class="input-group">
                                <input type="submit" name="entrar" value="Enviar" class="btn btn-sm bt-success bt-block">
                            </div>
                        </div>
                    </form> 
                    <?php echo $mensaje; ?>               
                </article>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/preloader.js"></script>
    <script src="js/main.js"></script>
    <script src="https://unpakg.com/aos@2.3.1/dist/aos.js"></script>
</body>
</html>