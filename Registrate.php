<?php

/**
 * Source:  https://www.formget.com/javascript-onsubmit/
 *          https://stackoverflow.com/a/46181/3493780
 */

include_once 'validation.php';
include_once 'connection.php';

$error = '';
$success = '';

if(isset($_POST['register'])){
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
        '".$_POST['city']."', '".$_POST['state']."', '".$_POST['type']."')";


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

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <title>Registrate</title>

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
    <img src="imagenes/bannerregistro.jpg" alt="Banner" id="bottombanner" href="IncinarSesion.php">
    <span class="caption1">REGISTRATE</span>
    <span class="under_text">INICIO</span>
    <span class="under_text1">REGISTRATE</span>
</div>



<div id="contact-form3">
    <h3>Elija el tipo de usuario para registrarse</h3>
    <ul id=" row20">
        <li><button id="mod-ind" class="myButton1">Como individual</button> </li>
        <li><button id="mod-agent" class="myButton1">Como Negocio o Fundacion</button></li>
        <li><button id="mod-bus" class="myButton1">Como Agente Lean</button></li>
    </ul>
    <br>
    <br>
    <div><p style="color: red"><?php  echo $error; ?></p></div>
    <div><p style="color: green"><?php echo $success; ?></p></div>
</div>

<div class="footer1">
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


<div id="myModal1" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
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
                <input type="hidden" value="individual" name="type" class="myButton1" />
                <input type="submit" value="Registrarse" name="register" class="myButton1" />
            </div>
            <hr>
        </form>
    </div>

</div>

<div id="myModal2" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <form action="" method="post" onsubmit="return ValidationEvent()">
            <h3>Registro de Agente LEAN</h3>
            <hr>
            <div><p style="color: red"><?php  echo $error; ?></p></div>
            <div><p style="color: green"><?php echo $success; ?></p></div>
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
                <input type="hidden" value="agent" name="type" class="myButton1" />
                <input type="submit" value="Registrarse" name="register" class="myButton1" />
            </div>
            <hr>
        </form>
    </div>

</div>

<div id="myModal3" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <form action="" method="post" onsubmit="return ValidationEvent()">
            <h3>Registro Negocio o Fundacion</h3>
            <div><p style="color: red"><?php  echo $error; ?></p></div>
            <div><p style="color: green"><?php echo $success; ?></p></div>
            <hr>
            <ul id="row26">
                <li><label for="Correo">Correo</label><input id="email" name="email" type="email" placeholder="Correo" required></li>
                <li><label for="Contraseña">Contraseña</label><input name="password" type="password" placeholder="Contraseña" required minlength="6"></li>
            </ul>
            <ul id="row26">
                <li><label for="Nombre">Nombre</label><input type="text" name="fname" placeholder="Nombre" required ></li>
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

            <div class="fieldgroup">
                <input checked="checked" type="radio"  name="business_type" value="1"> Tipo de negocio 1 <br>
                <input type="radio"  name="business_type" value="2"> Tipo de negocio 2 <br>
                <input  type="radio" name="business_type" value="3"> Tipo de negocio 3 <br>

            </div>

            <div class="registrarse">
                <input type="hidden" value="business" name="type" class="myButton1" />
                <input type="submit" value="Registrarse" name="register" class="myButton1" />
            </div>
            <hr>
        </form>
    </div>

</div>




</body>

<script>
    // Get the modal
    var modal1 = document.getElementById('myModal1');
    var modal2 = document.getElementById('myModal2');
    var modal3 = document.getElementById('myModal3');

    // Get the button that opens the modal
    var btn1 = document.getElementById("mod-ind");
    var btn2 = document.getElementById("mod-bus");
    var btn3 = document.getElementById("mod-agent");

    // Get the <span> element that closes the modal
    var span1 = document.getElementsByClassName("close")[0];
    var span2 = document.getElementsByClassName("close")[1];
    var span3 = document.getElementsByClassName("close")[2];

    // When the user clicks the button, open the modal
    btn1.onclick = function() {
        modal1.style.display = "block";
    };
    btn2.onclick = function() {
        modal2.style.display = "block";
    };
    btn3.onclick = function() {
        modal3.style.display = "block";
    };

    // When the user clicks on <span> (x), close the modal
    span1.onclick = function() {
        modal1.style.display = "none";
    };
    span2.onclick = function() {
        modal2.style.display = "none";
    };
    span3.onclick = function() {
        modal3.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target === modal1) {
            modal1.style.display = "none";
        }
        if (event.target === modal2) {
            modal2.style.display = "none";
        }
        if (event.target === modal3) {
            modal3.style.display = "none";
        }

    };

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