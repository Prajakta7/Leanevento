<?php

include_once 'connection.php';
include_once 'validation.php';

session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'agent'){
    header('Location: IniciarSesion.php');
}

$error = $number = $responsible = $place = $eventDate = $time = $price = "";
if(isset($_POST['submit'])){

    if(!validate_phone_number($_POST['number']))
        $error .= "Invalid phone number. Please use 10-digit phone number without space or symbols<br>";
    if(!validate_name($_POST['responsible']))
        $error .= "Invalid Name<br>";
    if(!validate_address($_POST['address']))
        $error .= "Invalid Address<br>";
    if(!($date = validate_date($_POST['date'])))
        $error .= "Invalid Date<br>";
    if(!validate_time($_POST['time']))
        $error .= "Invalid Time<br>";
    if(!validate_number($_POST['price']))
        $error .= "Invalid Price";

    if(empty($error)){
        $schedule = date('Y-m-d H:i:s',strtotime($date[2] . '-' . $date[0] . '-' . $date[1] . $_POST['time']));
        if(!empty($_POST['event_id'])){
            $sql = "UPDATE events SET event_phone = '". $_POST['number'] ."', responsible = '". $_POST['responsible'] ."', 
            place = '". $_POST['address'] . "', schedule = '". $schedule ."', ticket_amount = '". $_POST['price'] ."' 
            WHERE event_id = " . $_POST['event_id'];
        }
        else{
            $sql = "INSERT INTO events (event_phone, responsible, place, schedule, ticket_amount, agent_id) VALUES 
          ('" . $_POST['number'] . "', '".$_POST['responsible']."', '".$_POST['address']."', '".$schedule."','". $_POST['price'] ."',
          '". $_SESSION['user']['user_id'] ."')";
        }

        
        if($conn->query($sql)){
            header("Location: Eventos.php");
        }
        else{
            echo "Error: " . $conn->error;
            die();
        }
    }
}
elseif(isset($_GET['edit'])){
    $sql = "SELECT * FROM events WHERE event_id = " . $_GET['edit'];
    $event = $conn->query($sql)->fetch_assoc();

    $event_id = $_GET['edit'];
    $number = $event['event_phone'];
    $responsible = $event['responsible'];
    $place = $event['place'];
    $eventDate = date('m/d/Y', strtotime($event['schedule']));
    $time = date('H:i', strtotime($event['schedule']));
    $price = $event['ticket_amount'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Event</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <li> <a href="index.php"> Inicio</a> </li>
        <li> <a href="ListaDeVoluntarios.php">Lista de Voluntarios </a></li>
        <li> <a href="ListaDeFundaciones.php"> Lista de Fundaciones</a></li>
        <li> <a href="Eventos.php"><span class="yellow"> Eventos </span> </a></li>
        <li> <a href="Agente.php"> Agente </a></li>
    </ul>
</div>
<div class="container">
    <img src="imagenes/bannerregistro.jpg" height="260" width="1090" alt="Banner" id="bottombanner" href="ComprarBoletos.php">
    <span class="caption1">REGISTRO DE EVENTO</span>
    <span class="under_text">EVENTO </span>
    <span class="under_text1">REGISTROS</span>
</div>
<div id="event-form">
    <form action="" method="post">
        <span style="color: red;"><?php echo $error;  ?></span>
        <div id="event-form-section1">
            <div>
                <ul>
                    <input type="hidden" name="event_id" value="<?php echo @$event_id ?>"/>
                    <li><label for="Nombres">Telefono</label><input type="text" name="number" placeholder="Nombre del Evento" required value="<?php echo $number ?>"></li>
                    <li><label for="Responsable">Responsable</label><input type="text" name="responsible" placeholder="Nombre del Responsable" required value="<?php echo $responsible ?>"></li>
                </ul>
            </div>
            <div>
                <ul>
                    <li><img src="imagenes/imagensubir.png" alt=""></li>
                    <!--                        <li><button>Seleccionar imagen</button></li>-->
                </ul>
            </div>
            <span>
                    <label for="Lugar">Lugar</label><input type="text" name="address" placeholder="Direccion del Lugar del Eventos" required value="<?php echo $place; ?>">
                </span>
        </div>
        <div id="event-form-lower">
            <ul>
                <li><label for="Fecha">Fecha</label><input name="date" type="text" placeholder="MM/DD/YYYY" value="<?php echo $eventDate ?>"></li>
                <li><label for="Hora">Hora</label><input type="text" name="time" placeholder="HH:mm" value="<?php echo $time ?>"></li>
                <li><label for="valor">Valor de Boleto</label><input type="text" name="price" placeholder="000.00" value="<?php  echo  $price?>"></li>
            </ul>
            <input type="submit" name="submit" id="submit-form" value="Guardar" />
        </div>
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
</body>
</html>















</body>

</html>