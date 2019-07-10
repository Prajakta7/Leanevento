<?php

include_once 'connection.php';

session_start();
if(!isset($_SESSION['user'])){
    header('Location: IniciarSesion.php');
}

$message = "";

if(isset($_POST['subscribe'])){
    include_once 'validation.php';
    if(!validate_email($_POST['email'])){
        $message = "Invalid Email";
    }
    else{
        $msg = "You have successfully subscribed to LEAVEVENTO!";
        if ($var = mail($_POST['email'], "Feedback from Project 4", $msg)) {
            $message = "Subscribed!";
        }
        else {
            $message = "Error subscribing";
        }
    }
}

$message = '';
if(empty($_GET['id'])){
    header('Location: ComprarBoletos.php');
}
elseif (isset($_POST['cart'])){
    if($_POST['qty'] > 0 || $_POST['qty'] <= 10){
        $sql = "INSERT INTO `orders` (user_id, product_id, quantity, purchase_date) VALUES ('". 1 ."',
        '".$_POST['id']."', '".$_POST['qty']."', '". date('Y-m-d H:i:s') ."')";
        if($conn->query($sql)){
            $message = "1";
        }
        else{
            $message = "2";
        }
    }
    else{
        $message = "3";
    }
    header("Location: Perdamos.php?id=" . $_POST['id'] . '&stat=' . $message);
}
else{
    $sql = "SELECT * FROM `products` WHERE `product_id` = " . $_GET['id'];
    $res = $conn->query($sql);

    foreach ($res AS $product){
        $title = $product['product_name'];
        $desc = $product['description'];
        $price = $product['price'];
        $image = $product['image_url'];
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Perdamos</title>
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
        <li> <a href="Blog.html"> Blog </a></li>
        <li> <a href="Registrate.php"> Registrate </a></li>
        <li> <a href="Contacto.php"> Contacto </a></li>
        <li> <a href="IniciarSesion.php"> Iniciar sesión </a></li>
        <li> <a href="ComprarBoletos.php"> Comprar Boletos</a></li>
    </ul>
</div>

<div class="container">
    <img src="imagenes/bannercboleto.jpg" alt="Banner" id="bottombanner" href="Comprar Boletos.php">
    <span class="caption1">COMPRAR BOLETOS</span>
    <span class="under_text">INICIO</span>
    <span class="under_text1">COMPRAR BOLETOS</span>
</div>
<br><br><br>
<div class="column6">
    <div class="column7">
        <img src="<?php echo $image; ?>" height=400px width=400px align="left" hspace="100" />
    </div>
    <div id="column8">
        <h2><?php echo $title; ?></h2>
        <ul>
            <li>
                <?php if($price == 0) echo "Entrada Gratis"; else echo "$ " .$price; ?>
            </li>

            <li>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span> </li>

            <li> (74 Rating)</li>
        </ul>
        <p><?php echo $desc; ?></p>
        <form action="" method="post">
            <span style="font-size: small">Numero De Entras</span>
            <input id="qty" name="qty" type="number" value="1" min="1" max="10" required>
            <input name="id" type="hidden" value="<?php echo $_GET['id']; ?>"/>
            <input type="submit" value="Comprar" name="cart" /><br>
            <span><?php
                switch (@$_GET['stat']){
                    case '1':
                        echo "Order placed!";
                        break;
                    case '2':
                        echo "Error placing order";
                        break;
                    case '3':
                        echo "Invalid quantity (valid 1 - 10)";
                        break;
                    default:
                        echo "";
                        break;
                }
                ?></span>
        </form>
    </div><br>
    <br>
    <div class="footer1">
        <div class="band" id="bottom-band">
            <ul id="bottom-band-menu">
                <li>
                    <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                    <span>Registrese para recibir un boletín </span>
                </li>
                <li>
                    <span style="color: green;"><?php echo $message; ?></span>
                    <div id="search_wrapper">
                        <form action="" method="post">
                            <input type="email" placeholder="Introduce tu correo electrónico" id="search_field" name="email" required />
                            <input type="submit" id="search_button" name="subscribe" value="Subscribier" />
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        <div id="heading">
            <p>LEAN EN LAS REDES SOCIALES</p>
        </div>
        <ul id="social-media">
            <li> <i class="fa fa-twitter" aria-hidden="true"></i> </li>
            <li> <i class="fa fa-facebook" aria-hidden="true"></i> </li>
            <li><i class="fa fa-instagram" aria-hidden="true"></i> </li>
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

</html>