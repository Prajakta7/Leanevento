<?php

/**
 * Source:  https://www.formget.com/javascript-onsubmit/
 *          https://stackoverflow.com/a/46181/3493780
 */

include_once 'validation.php';
include_once 'connection.php';

$error = '';
$success = '';

if(isset($_POST['regindividual'])){
    if(!validate_name($_POST['fname']))
        $error .= "Invalid first name<br/>";
    if(!validate_name($_POST['lname']))
        $error .= "Invalid last name<br/>";
    if(!validate_email($_POST['email']))
        $error .= "Invalid email<br/>";
    if(!validate_zip($_POST['zipcode']))
        $error .= "Invalid zip<br/>";

    if(empty($error)){
        $sql = "INSERT INTO `users` (first_name, last_name, email, password, address, zip, city, state, user_type) VALUES 
        ('".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['email']."', '".$_POST['password']."', '".$_POST['address']."', '".$_POST['zipcode']."', 
        '".$_POST['city']."', '".$_POST['state']."', 'individual')";


        if ($conn->query($sql) === TRUE) {
            $success = "Registered successfully";
        } else {
            $error =  "Error: <br>" . $conn->error;
        }
    }
}



?>


<!DOCTYPE html>
<html>

<head>
    <title>Registro Individual</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/leanevent.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<div id="contact-form7">
    <form action="" method="post" onsubmit="return ValidationEvent()">
        <h3>Registro Individual</h3>
        <div><p style="color: red"><?php  echo $error; ?></p></div>
        <div><p style="color: green"><?php echo $success; ?></p></div>
        <hr>
        <ul id="row26">
            <li><label for="Correo">Correo</label><input id="email" name="email" type="email" placeholder="Correo" required></li>
            <li><label for="Contraseña">Contraseña</label><input name="password" type="password" placeholder="Contraseña" required minlength="6"></li>
        </ul>
        <ul id="row26">
            <li><label for="Nombre">Nombre</label><input type="text" name="fname" placeholder="Nombre" required></li>
            <li><label for="Apellido">Apellido</label><input type="text" name="lname" placeholder="Apellido" required></li>
        </ul>
        <div class="row25">
            <label for="tema">Dirección</label><input type="text" name="address" placeholder="Dirección" required>
        </div>
        <div class="row25">
            <label for="tema">Ciudad</label><input type="text" name="city" placeholder="Ciudad" required>
        </div>
        <ul id="row26">
            <li><label for="state">Estado</label>
                <select name="state" id="state">
                    <option value="TX">Texas</option>
                </select>
            </li>
            <li><label for="Código Postal">Código Postal</label><input name="zipcode" type="text" placeholder="Código Postal" required pattern="[0-9]{5}"></li>
        </ul>
        <div class="registrarse">
            <input type="submit" value="Registrarse" name="regindividual" class="myButton1" />
        </div>
        <hr>
        <div class="cerrar">
            <a href="Registrate.php" class="myButton5">Cerrar</a>
        </div>
    </form>
</div>




</body>

<script>
    var validatejs = false;

    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function validateName(name) {
        var re = /^[a-zA-Z ]+$/;
        return re.test(name)
    }

    function validateZip(zip) {
        var re = /^[0-9]+$/;
        return zip.length === 5 && re.test(zip)
    }

    function ValidationEvent() {
        if(validatejs){
            var email = document.getElementsByName('email')[0].value;
            var fname = document.getElementsByName('fname')[0].value;
            var lname = document.getElementsByName('lname')[0].value;
            var zip = document.getElementsByName('zipcode')[0].value;
            valid = true;
            if(!validateEmail(email)){
                alert('Invalid Email');
                valid = false;
            }
            else if(!validateName(fname)){
                alert('Names can only contain letters and spaces');
                valid = false;
            }else if(!validateName(lname)){
                alert('Names can only contain letters and spaces');
                valid = false;
            }else if(!validateZip(zip)){
                alert('Zip can only number and length should be 5');
                valid = false;
            }
            return valid;
        }
        else{
            return true;
        }
    }



</script>

</html>