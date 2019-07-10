<?php

include_once 'connection.php';

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

$sql = "SELECT * FROM `products`";
$res = $conn->query($sql);
$prices = $images = $titles = $productID = array();
foreach ($res AS $key => $row){
    $productID[] = $row['product_id'];
    $titles[] = $row['product_name'];
    $prices[] = $row['price'];
    $images[] = $row['image_url'];
}


?>

<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <title>Comprar Boletos</title>
    
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
        <img src="imagenes/bannercboleto.jpg" alt="Banner" id="bottombanner" href="Comprar Boletos.php">
        <span class="caption1">COMPRAR BOLETOS</span>
        <span class="under_text">INICIO</span>
        <span class="under_text1">COMPRAR BOLETOS</span>
    </div>
    <h4> NUESTROS EVENTOS </h4>
    <p>Tu asistencia importane nosotros en los eventos que estamos realizando</p>
    <div class="band1">
        <table cellpadding="5">
            <tr>
                <?php foreach ($images AS $key => $image){ ?>
                <td valign="bottom"><a href="Perdamos.php?id=<?php echo $productID[$key]; ?>"><img src="<?php echo $image; ?>" height=250px width=250px></a></td>
                <?php } ?>
            </tr>
            <tr>
                <?php foreach ($titles AS $title){ ?>
                    <td><?php echo $title; ?></td>
                <?php } ?>
            </tr>

            <tr>
                <?php foreach ($prices AS $price){ ?>
                    <td><?php if($price == 0) echo "Entrada Gratis"; else echo "$ " .$price; ?></td>
                <?php } ?>
            </tr>

        </table>


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
</body>
</html>