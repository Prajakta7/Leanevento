<?php

include_once 'connection.php';

session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'agent'){
    header('Location: IniciarSesion.php');
}

if(isset($_GET['assign'])){
    $sql = "UPDATE volunteer SET status = 'assigned' WHERE volunteer_id = " . $_GET['assign'];
    $conn->query($sql);
    header('Location: ListaDeFundaciones.php');
}
else {
    $sql = "SELECT * FROM volunteer LEFT JOIN users ON users.user_id = volunteer.user_id INNER JOIN events ON events.event_id = volunteer.event_id
WHERE user_type = 'business' AND events.agent_id = " . $_SESSION['user']['user_id'];
    if ($res = $conn->query($sql))
        $volunteers = $res->fetch_all();
    else {
        echo $conn->error;
        die();
    }
}

//echo "<pre>";
//echo $sql;
//print_r($volunteers);
//die();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Lista de Fundaciones</title>
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
        <li> <a href="ListaDeVoluntarios.php">  Lista de Voluntarios</a></li>
        <li> <a href="ListaDeFundaciones.php"> <span class="yellow">Lista de Fundaciones</span></a></li>
        <li> <a href="Eventos.php"> Eventos </a></li>
        <li> <a href="Agente.php"> Agente </a></li>
        <li> <a href="IniciarSesion.php"> Cerrar Sesión</a></li>

    </ul>
</div>
<div class="band5">
    <table>
        <th>
            <h2>Lista de Fundaciones</h2>
        </th>
    </table>
</div>
<div class="band3">
    <div class="band2">
        <table cellpadding="4" cellspacing="30">
            <tr>
                <th>NOMBRE DE FUNDACION</th>
                <th><span class="space8">EVENTO</span></th>
                <th><span class="space9">RESPONSABLE</span></th>
                <th><span class="space10">COMISION</span></th>
                <th><span class="space11">CONFIRMAR</span></th>
            </tr>
        </table>
    </div>
</div>

<div class="band27">
    <table cellpadding="4" cellspacing="30">
        <?php foreach ($volunteers AS $event){ ?>
            <tr>
                <td> <img src="imagenes/user.png" height="75px" width="75px">
                <td><?php echo $event[5] . ' ' . $event[6] ?></td>
                <td> <?php echo $event[18] ?> </td>
                <td> <?php echo $event[17] ?> </td>
                <td> 1 </td>
                <td><?php if($event[3] === 'requested') echo '<a href="ListaDeFundaciones.php?assign='. $event[0] .'" class="myButton1">Asignar</a>'; ?></td>
            </tr>
        <?php } ?>
    </table>

</div>
<hr width=95%>
<div id="filmstrip">
    <a href="#" class="myButton29">
        << </a> <a href="#" class="myButton29"> 1
    </a>
    <a href="#" class="myButton29"> 2 </a>
    <a href="#" class="myButton29"> 3 </a>
    <a href="#" class="myButton29"> 4 </a>
    <a href="#" class="myButton29"> 5 </a>
    <a href="#" class="myButton29"> >> </a>


    <br><br><br><br><br><br>


    </a>
</div>





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