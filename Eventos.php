<?php

include_once 'connection.php';

session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'agent'){
    header('Location: IniciarSesion.php');
}

if(isset($_GET['del'])){
    $sql = "DELETE FROM events WHERE event_id = " . $_GET['del'];
    $conn->query($sql);
    header('Location: Eventos.php');
}
else {
    $sql = "SELECT * FROM events WHERE agent_id = " . $_SESSION['user']['user_id'];
    if ($res = $conn->query($sql))
        $events = $res->fetch_all();
    else {
        echo $conn->error;
        die();
    }
}
//echo "<pre>";
//echo $sql;
//print_r($events);
//die();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Eventos</title>
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
        <li> <a href="index.php"> Inicio</a> </li>
        <li> <a href="ListaDeVoluntarios.php">Lista de Voluntarios </a></li>
        <li> <a href="ListaDeFundaciones.php"> Lista de Fundaciones</a></li>
        <li> <a href="Eventos.php"><span class="yellow"> Eventos </span> </a></li>
        <li> <a href="Agente.php"> Agente </a></li>
        <li> <a href="IniciarSesion.php"> Cerrar Sesión</a></li>

    </ul>
</div>
<div class="band5">
    <table>
        <th>
            <h2>Lista de Eventos</h2>
        </th>
    </table>
</div><br><br>
<div class="add1">
    <a href="AddEvent.php" class="myButton30">Agregar</a>
</div>
<div class="band3">
    <div class="band2">
        <table cellpadding="4" cellspacing="22">
            <tr>
                <th>DETALLES DEL EVENTOS</th>
                <th><span class="space12">LUGAR</span></th>
                <th><span class="space13">FETCHA</span></th>
                <th><span class="space14">MODIFICAR</span></th>
                <th><span class="space15">ELIMINAR</span></th>
            </tr>
        </table>
    </div>
</div>

<div class="band3">
    <table cellpadding="4" cellspacing="22">
        <?php foreach ($events AS $event){ ?>
            <tr>
                <td> <img src="imagenes/minibaner<?php echo rand(1, 4); ?>.jpg" height="75px" width="75px">
                <td valign="middle"><?php echo "Responsible: " . $event[2] . "<br>
                    Number: ". $event[1] . "<br>
                                        Price: $". $event[5]; ?></td>
                <td> <?php echo $event[3] ?> </td>
                <td> <?php echo date('M d, Y g:i A', strtotime($event[4])) ?> </td>
                <td>
                    <div class="registrarse">
                        <a href="AddEvent.php?edit=<?php echo $event[0]; ?>" class="myButton1"><img src="imagenes/Capture_edit.PNG"></a>
                    </div>
                </td>
                <td>
                    <a href="Eventos.php?del=<?php echo $event[0]; ?>" class="myButton77"><img src="imagenes/Capture_delete.PNG"></a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<hr width=95%>

<!--<div id="filmstrip">-->
<!--    <a href="#" class="myButton29">-->
<!--        << </a> <a href="#" class="myButton29"> 1-->
<!--    </a>-->
<!--    <a href="#" class="myButton29"> 2 </a>-->
<!--    <a href="#" class="myButton29"> 3 </a>-->
<!--    <a href="#" class="myButton29"> 4 </a>-->
<!--    <a href="#" class="myButton29"> 5 </a>-->
<!--    <a href="#" class="myButton29"> >> </a><br><br><br><br><br><br>-->
<!--    <div id="footer1">-->
<!--        <ul id="copy">-->
<!--            <li>Copyright</li>-->
<!--            <li><i class="fa fa-copyright" aria-hidden="true"></i>2019</li>-->
<!--            <li>All rights reserved | This web is made with </li>-->
<!--            <li><i class="fa fa-heart-o" aria-hidden="true"></i> by </li>-->
<!--            <p>DiazApps</p>-->
<!---->
<!--        </ul>-->
<!--        <a href="#top"><img src="imagenes/top_button.png" id="top-icon" /></a>-->
<!--    </div>-->
</body>

</html>