<?php

include_once 'connection.php';

session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'business'){
    header('Location: IniciarSesion.php');
}

if(isset($_GET['confirm'])){
    $sql = "INSERT INTO `volunteer` (event_id, user_id) VALUES (" . $_GET['confirm']. ", ".$_SESSION['user']['user_id'].")";
    if($conn->query($sql)){
        $message = "Success";
    }
    else{
        echo "Error: " . $conn->error;
        die();
    }
}

$sql = "SELECT * FROM `events` LEFT JOIN (SELECT * FROM volunteer WHERE user_id = ".$_SESSION['user']['user_id'].") AS v ON v.event_id = events.event_id ORDER BY schedule DESC";
if($res = $conn->query($sql))
    $events = $res->fetch_all();
else{
    echo $conn->error;
    die();
}

//echo "<pre>";
//print_r($events);
//die();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Home Business</title>
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
            <h2>Lista de Eventos</h2>
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
                    Number: ". $event[1] . "<br>
                                        Price: $". $event[5]; ?></td>
                <td> <?php echo $event[3] ?> </td>
                <td> <?php echo date('M d, Y', strtotime($event[4])) ?> </td>
                <td> <?php echo date('g:i A', strtotime($event[4])) ?> </td>
                <td>
                    <?php if($event[0] !== $event[10] && $event[9] != $_SESSION['user']['user_id']){ ?>
                        <div class="registrarse">
                            <button id="<?php echo $event[0] ?>" onclick="confirmar(this)"  class="myButton1 btn1">Confirmar</button>
                        </div>
                    <?php } ?>
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

<div id="myModal1" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <div><h3>Bienvenido</h3></div>
        <hr>
        <div id="row1">
            <p> Gracias por ser parte en nuestros evento.</p>
        </div>
        <hr>
        <div class="cerrar">
            <button class="myButton1 close" style="float: none; color: white">Close</button>
        </div>
    </div>

</div>
</body>


<script>
    // Get the modal
    var modal1 = document.getElementById('myModal1');


    // Get the <span> element that closes the modal
    var span1 = document.getElementsByClassName("close")[0];
    var close1 = document.getElementsByClassName("close")[1];

    function confirmar(obj) {
        modal1.style.display = "block";
        cur_id = obj.id;
    }

    // When the user clicks on <span> (x), close the modal
    span1.onclick = function() {
        modal1.style.display = "none";
        window.location.href = "HomeBusiness.php?confirm=" + cur_id;

    };
    close1.onclick = function() {
        modal1.style.display = "none";
        window.location.href = "HomeBusiness.php?confirm=" + cur_id;

    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target === modal1) {
            modal1.style.display = "none";
            window.location.href = "HomeBusiness.php?confirm=" + cur_id;

        }
    };
</script>

</html>