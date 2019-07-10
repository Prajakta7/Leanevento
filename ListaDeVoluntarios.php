<?php

include_once 'connection.php';

session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'agent'){
    header('Location: IniciarSesion.php');
}

$sql = "SELECT * FROM volunteer LEFT JOIN users ON users.user_id = volunteer.user_id INNER JOIN events ON events.event_id = volunteer.event_id
WHERE user_type = 'individual' AND events.agent_id = " . $_SESSION['user']['user_id'];
if($res = $conn->query($sql))
    $volunteers = $res->fetch_all();
else{
    echo $conn->error;
    die();
}

//echo "<pre>";
//echo $sql;
//print_r($volunteers);
//die();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Lista de Voluntarios</title>
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
            <li> <a href="ListaDeVoluntarios.php"><span class="yellow">Lista de Voluntarios </span></a></li>
            <li> <a href="ListaDeFundaciones.php"> Lista de Fundaciones</span></a></li>
            <li> <a href="Eventos.php"> Eventos </a></li>
            <li> <a href="Agente.php"> Agente </a></li>
            <li> <a href="IniciarSesion.php"> Cerrar Sesión</a></li>

        </ul>
    </div>
    <div class="band5">
        <table>
            <th>
                <h2>Lista de Voluntarios</h2>
            </th>
        </table>
    </div>
    <div class="band3">
        <div class="band2">
            <table cellpadding="4" cellspacing="30">
                <tr>
                    <th>NOMBRE DE VOLUNTARIO</th>
                    <th><span class="space4">CORREO</span></th>
                    <th><span class="space5">TELEPHONO</span></th>
                    <th><span class="space6">EVENTO</span></th>
                    <th><span class="space7">RESPONSABLE</span></th>
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
                    <td valign="middle"><?php echo $event[7] ?></td>
                    <td> <?php echo $event[16] ?> </td>
                    <td> <?php echo $event[18] ?> </td>
                    <td> <?php echo $event[17] ?> </td>
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