<?php

include_once 'connection.php';
include_once 'validation.php';

session_start();

//Cerrar Sesión current session
unset($_SESSION['user']);

$error = "";
if(isset($_POST['submit'])){
    $email = $_POST["email"];
    if(!validate_email($email)){
        $error = "Invalid email";
    }
    else{
        $sql = "SELECT * FROM `users` WHERE email = '".$email."' AND password='".$_POST['password']."' LIMIT 1";
        $res = $conn->query($sql);

        if($res->num_rows > 0){
            $user = $res->fetch_assoc();
            $_SESSION['user'] = $user;

            switch ($user['user_type']){
                case 'individual':
                    header("Location: HomeIndividual.php");
                    break;

                case 'agent':
                    header("Location: HomeAgentLEAN.php");
                    break;

                case 'business':
                    header("Location: HomeBusiness.php");
                    break;

                default:
                    header("Location: IniciarSesion.php");
                    break;
            }
        }
        else{
            $error = "Invaild username/password";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Incinar sesión</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/leanevent.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="wrapper">
    <i class="fas fa-arrow-alt-circle-up"></i>
    <a name="top"></a>
    <div id="nav">
        <ul id="logo-menu">
            <li><img src="imagenes/logo-blanco.png" /></li>
            <li> LEANEVENTOS</li>
        </ul>
        <ul id="menu">
            <li> <a href="index.php"> Inicio </a> </li>
            <li> <a href="QuienesSomos.php"> Quienes Somos</a></li>
            <li> <a href="http://prajakta.uta.cloud/"> Blog </a></li>
            <li> <a href="Registrate.php"> Registrate </a></li>
            <li> <a href="Contacto.php"> Contacto </a></li>
            <li> <a href="IniciarSesion.php"> Iniciar sesión </a></li>
            <li> <a href="ComprarBoletos.php"> Comprar Boletos</a></li>
        </ul>
    </div>

    <div class="container">
        <img src="imagenes/bannerlogin.jpg" alt="Banner" id="bottombanner" href="Incinar sesión.php">
        <span class="caption1">INICIAR SESIÓN</span>
        <span class="under_text">INICIO</span>
        <span class="under_text1">INICIAR SESIÓN</span>
    </div>



    <div id="contact-form1">
        <form action="" method="post">
            <ul id="row1">
                <li><label for="Nombre de Usuario">Nombre de Usuario</label>
                <input type="email" name="email" placeholder="Nombre Usuario o Correo" required></li>
                <li><label for="Contraseña">Contraseña</label>
                <input type="password" name="password" placeholder="Contraseña" required></li>
            </ul>
            <div id="forgot-pswd">
                <a href="RecuperarContrasena.php">Olvido su contraseña? </a>
            </div>
            <input type="submit" id="submit-form" name="submit" value="Entra" />
            <br><span><?php echo $error; ?></span>
        </form>
    </div>

    <div class="footer1">
        <div id="heading">
            <p>LEAN EN LAS REDES SOCIALES</p>
        </div>
        <ul id="social-media">
            <li> <i class="fa fa-twitter" aria-hidden="true"></i> </li>
            <li> <i class="fa fa-facebook" aria-hidden="true"></i> </li>
            <li> <i class="fa fa-instagram" aria-hidden="true"></i> </li>
        </ul>

        <ul id="copy">
            <li>Copyright</li>
            <li><i class="fa fa-copyright" aria-hidden="true"></i>2019</li>
            <li>All rights reserved | This web is made with </li>
            <li><i class="fa fa-heart-o" aria-hidden="true"></i> by </li>
            <p>DiazApps</p>

        </ul>
        <a href="#top"><img src="imagenes/top_button.png" id="top-icon" /></a>
    </div>
    </div>
</body>

</html>