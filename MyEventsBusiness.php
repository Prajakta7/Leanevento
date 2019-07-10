<?php

session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'business'){
    header('Location: IniciarSesion.php');
}

include_once 'connection.php';

if(isset($_GET['del'])){
    $sql = "DELETE FROM `volunteer` WHERE volunteer_id = " . $_GET['del'];
    if($conn->query($sql))
        header("Location: MyEventsBusiness.php");
    else{
        echo $conn->error;
        die();
    }
}

$sql = "SELECT `volunteer_id`, `event_phone`, `responsible`, `place`, `ticket_amount`, `schedule`  
FROM `volunteer` 
INNER JOIN `events` ON events.event_id = volunteer.event_id WHERE volunteer.user_id = ".$_SESSION['user']['user_id']." ORDER BY schedule DESC";
if($res = $conn->query($sql))
    $events = $res->fetch_all();
else {
    echo $conn->error;
    die();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>My Events</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
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
        <li> <a href="index.php"> <span class="yellow">Inicio</span> </a> </li>
        <li> <a href="HomeBusiness.php"> Events</a></li>
        <li> <a href="MyEventsBusiness.php"> My Events</a></li>
        <li> <a href="ProfileBusiness.php"> Profile</a></li>
        <li> <a href="IniciarSesion.php"> Cerrar Sesión</a></li>

    </ul>
</div>
<div class="band5">
    <table>
        <th>
            <h2>Lista de mis Eventos</h2>
        </th>
    </table>
</div>
<div class="band3">
    <div class="band2">
        <table cellpadding="4" cellspacing="35">
            <tr>
                <th>DETALLES DEL EVENTOS</th>
                <th><span class="space">LUGAR</span></th>
                <th><span class="space1">FETCHA</span></th>
                <th><span class="space2">HORA</span></th>
                <th><span class="space3">ASISTENCIA</span></th>
                <th><span class="space3"></span></th>
            </tr>
        </table>
    </div>
</div>

<div class="band3">
    <table cellpadding="4" cellspacing="35">
        <?php foreach ($events AS $event){ ?>
            <tr>
                <td> <img src="imagenes/minibaner<?php echo rand(1, 4); ?>.jpg" height="75px" width="75px">
                <td valign="middle"><?php echo "Responsible: " . $event[2] . "<br>
                    Number: ". $event[1] . '<br>
                    Price: $' . $event[4]; ?></td>
                <td> <?php echo $event[3] ?> </td>
                <td> <?php echo date('M d, Y', strtotime($event[5])) ?> </td>
                <td> <?php echo date('g:i A', strtotime($event[5])) ?> </td>
                <td>
                    <div class="registrarse">
                        <a href="MyEventsBusiness.php?del=<?php echo $event[0] ?>" class="myButton1">Delete</a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>

</div>
<hr width=95%><br><br><br><br><br><br>
<div id="footer1">
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