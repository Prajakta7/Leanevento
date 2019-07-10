<?php

include_once 'connection.php';

session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'individual'){
    header('Location: IniciarSesion.php');
}

$message = "";
if(isset($_GET['id'])){
    $sql = "INSERT INTO `volunteer` (event_id, user_id) VALUES (" . $_GET['id']. ", ".$_SESSION['user']['user_id'].")";
    if($conn->query($sql)){
        header("Location: Bien.php");
    }
    else{
        echo "Error: " . $conn->error;
        die();
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Bien</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/leanevent.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div id="contact-form5">
        <form action="submit">
            <div class="bien"><h3>Bienvenido</h3></div>
            <hr>
            <ul id="row1">
                <p> Gracias por ser un voluntario en nuestro evento</p>
            </ul>
            <hr>
            <div class="cerrar">
                <a href="HomeIndividual.php" class="myButton15">Close</a>
            </div>
        </form>
    </div>
</body>

</html>