<?php

session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'business'){
    header('Location: IniciarSesion.php');
}


include_once 'validation.php';
include_once 'connection.php';

$error = '';

if(isset($_POST['update'])){
    if(!validate_name($_POST['firstname']))
        $error .= "Invalid first name<br/>";
    if(!validate_name($_POST['lastname']))
        $error .= "Invalid last name<br/>";
    if(!validate_email($_POST['email']))
        $error .= "Invalid email<br/>";
    if(!validate_phone_number($_POST['telephone']))
        $error .= "Invalid Telephone<br/>";
    if(!validate_alphanumeric($_POST['username']))
        $error .= "Invalid Username (Only alpha numeric)<br/>";
    if(!validate_password($_POST['password']))
        $error .= "Password should be at least 6 characters long.<br/>";

    if(empty($error)){
        $sql = "UPDATE `users` SET first_name = '".$_POST['firstname']."', last_name = '".$_POST['lastname']."', 
        email = '".$_POST['email']."', password = '".$_POST['password']."', registration_number = '".$_POST['registrationnumber']."', 
        username = '".$_POST['username']."', telephone = '".$_POST['telephone']."' WHERE user_id = '" . $_SESSION['user']['user_id'] . "'";


        if ($conn->query($sql) === TRUE) {
            $error = "Update successfully";
        } else {
            $error =  "Error: <br>" . $conn->error;
        }
    }
}

$sql = "SELECT * FROM users WHERE user_id = " . $_SESSION['user']['user_id'];
$user = $conn->query($sql)->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <title>Profile Business</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile - Business</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="css/leanevent.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
            <li> <a href="index.php"> <span class="yellow">Inicio</span> </a> </li>
            <li> <a href="HomeBusiness.php"> Events</a></li>
            <li> <a href="MyEventsBusiness.php"> My Events</a></li>
            <li> <a href="ProfileBusiness.php"> Profile</a></li>
            <li> <a href="IniciarSesion.php"> Cerrar Sesión</a></li>
        </ul>
    </div>


    <div class="container">
        <img src="imagenes/bannercontacto.jpg" alt="Banner" id="bottombanner" href="Contacto.html">
        <span class="caption3">PERFIL</span>
        <span class="under_text">INICIO</span>
        <span class="under_text1">PERFIL</span>
    </div>

    <div id="information-form">
        <h3>
            Tu Información del Perfil
        </h3>
        <div class="infomation-board-class">
            <ul>
                <li><i class="fas fa-book"></i>&nbsp;<?php echo $user['first_name'] . ' ' . $user['last_name']; ?></li>
                <li><i class="fas fa-book"></i>&nbsp;<?php  echo $user['registration_number'] ?></li>
                <li><i class="fas fa-user"></i>&nbsp;<?php echo $user['email'] ?></li>
                <li><i class="fas fa-phone"></i>&nbsp;<?php echo $user['telephone'] ?></li>
            </ul>
            <ul>
                <li>
                    <div><i class="fas fa-map-marker-alt" aria-hidden="true"></i>&nbsp;<?php echo $user['address'] . "<br>"
                            . $user['city'] . ' ' . $user['state'] . ' ' . $user['zip'] ?></div>
                </li>
                <li>
                    <div><i class="far fa-paper-plane"></i>&nbsp;<a
                                href="mailto:info@diazapps.com">info@diazapps.com</a>
                    </div>
                </li>
                <li>
                    <div><i class="fas fa-globe"></i>&nbsp;<a href="www.diazapps.com">diazapps.com</a></div>
                </li>
            </ul>
            <div><img src="imagenes/nologo.png" alt=""></div>
        </div>
        <div id="contact-form">
            <h3>Estar en contacto</h3>
            <br>
            <span><?= $error ?></span>
            <form action="" method="post">
                <div id="agent-contact-form-upper">
                    <div>
                        <ul id="contact-input-boxes">
                            <li><label for="Nombre">Nombres</label>
                                <input type="text" name="firstname" placeholder="Tu Nombre" value="<?php  echo $user['first_name'] ?>"><br>
                            <li><label for="Nombre">Apellido</label>
                                <input type="text" name="lastname" placeholder="Tu Apellido" value="<?php  echo $user['last_name'] ?>"></li>
                            <li><br>
                                <label for="Apellido">Numerode Registro del inscrito</label><input name="registrationnumber" value="<?php  echo $user['registration_number'] ?>" type="text" placeholder="Numerode Registro del inscrito">
                            </li>
                            <br>
                        </ul>
                    </div>
                    <!--<div>
                        <img src="imagenes/nologo.png" alt="">
                        <button type="button">Seleccionar Logo</button>
                    </div>-->
                </div>
                <div id="lower-row1"><label for="Nombre">Correo</label><input type="email" name="email" value="<?php  echo $user['email'] ?>" placeholder="Tu Correo electronico"></div>
                <div id="agent-contact-form-lower">
                    <ul>
                        <li><label for="Nombres">Telefono</label><input type="text" name="telephone" value="<?php  echo $user['telephone'] ?>" placeholder="Telefono"></li>
                        <li><label for="Nombre">Usuario</label><input type="text" name="username" value="<?php  echo $user['username'] ?>" placeholder="Nombre de Usuario"></li>
                        <li><label for="Nombre">Contrasena</label><input type="text" required name="password" value="<?php  echo $user['password'] ?>" placeholder="Contrasena"></li>
                    </ul>
                    <div id="notas">
                        <div id="nota-button">Nota:</div>
                        <span>Solo puede cambiar los datos (Telefono,Contrassena logo)</span>
                    </div>
                </div>
                <input id="nota-button" name="update" type="submit" value="Guardar Cambios" />
            </form>
        </div>


        <div id="footer20">
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