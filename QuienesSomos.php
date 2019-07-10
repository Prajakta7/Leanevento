<?php

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


?>
<!DOCTYPE html>
<html>

<head>
    <title>Quienes Somos</title>
    <meta charset="utf-8">
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
            <img src="imagenes/bannerabout.jpg" alt="Banner" id="bottombanner" href="Quienes Somos.php">
            <span class="caption1">QUIENES SOMOS</span>
            <span class="under_text">HOME</span>
            <span class="under_text1">QUIENES SOMOS</span>
        </div>


        <div class="row">
            <div class="column1">

                <h2>LEAN</h2>

                <p>LEAN es una asociaciån civil sin fines de lucro conformada gor gente con gran sensibilidad
                    social, dedicada a La defensa de los derechcs humanos y la ccnsauciån de ayuda
                    humanitaria. fauoreciendo directam,ente o a Iravés de ovas asociac(ones o agrupaciones
                    provirtiales a venezolanos residentes en Espaha y a quienes viven en veneäuela</p>

                <h2> &uåles son los fines de LEAN?</h2>
                <p>LEAN esté dedicada fomentar vaicres e instaurerlos como grincipios, trabajer en formsciån
                    civica, promover defender Ias libertades individusles y IOS derechos humanos en Venezuels.
                    sensibilizar a gente 'Obre la iruortencie de conocev respetar y practical Ios principios
                    contenidcs en Ia oeclarecién universal de ceechos Hurnaros. asistir victimas de ectos
                    violentos y persecucöm favorecer la adquisiciön ce carocimiento a través de la lectura y
                    trabajar incansabkmente en 'a ayuca humanitaria como gesto de solidaridad y buena
                    voluntad</p>

                <h2>&uåles son las actividades de LEAN?</h2>
                <p>LEAN trebaia en e: deserrollo y publicacidn de estudios de investigaci&l sobre temas de
                    interés sociel, cultural, politico y ecznbmicz, prezaraci•ån de ;cnencias forcs y
                    conferencias, oresentsciån en eventos esoeciatizsdos y mesas de trebejo geticién de
                    colabctaciån a personalicades de reccrocida trayectaré, estudio de cesos de violaciån de
                    derechos humanos a través de letrados voluntarios, asistencia y representacién para la
                    defensa de les victimas de actos vioaentos y gersecuciöm lanzamientc de campa"as sobre
                    valores ci•.'icos derechos humanos, ptanificacitn y ejecucitn te programas de voluntariadc
                    para t,rintar asuda humanitana y organizaciön de charlas sobre la siluaciön economica
                    politica y social de Venezuela y temas de interes mundial,</p>


                <h2>¿QUÉ HACEMOS?</h2>
                <p> La asociación civil LEAN fue creada con el objetivo de ayudar, a través de acciones concretas, a
                    nuestros conciudadanos
                    en Venezuela ante la grave escasez de medicinas e insumos médicos en que se encuentra el país.
                    Nuestra misión consiste
                    en recolectar ayuda médico sanitaria en delegaciones en España y, a través de agentes de transporte,
                    llevarlos a
                    Venezuela para que otras asociaciones se encarguen de su distribución. De esta manera aportamos
                    nuestro granito de arena
                    ayudando a llevar asistencia humanitaria a Venezuela. Somos una asociación sin fines de lucro,
                    dedicada a la defensa de
                    los Derechos Humanos.
                </p>
            </div>
            <div class="column2">
                <h2>¿CÓMO PUEDES AYUDAR?</h2>
                <h3>PUEDES AYUDAR DE TRES FORMAS:</h3>
                <li>Dona material médico e insumos para Venezuela.</li>
                <li>A través de donaciones económicas</li>
                <li>Hazte voluntario.</li>
                <h2>¿DÓNDE ESTAMOS?</h2>
                <h2>SOMOS 17 COORDINACIONES EN ESPAÑA:</h2>

                <p>Alicante - Almería - Cataluña - Granada - Islas Canarias - Islas Baleares - León - Madrid -Málaga
                    - Salamanca - Sevilla - Valencia - Valladolid - Zaragoza - LEAN EEUU.</p>


                <h2>INSTITUCIONES y ORGANIZACIONES BENEFICIADAS EN VENEZUELA:</h2>

                <h3>Ayudamos a 11 Estados a través de 35 puntos de destino:</h3>
                <div class="column3">
                    <div class="column4">
                        <li> LEAN Anzoátegui </li>
                        <li> Funsaluz Barcelona, Valencia </li>
                        <li> Fundación La Pastillita </li>
                        <li> LEAN Aragua 1 </li>
                        <li> Parroquia Michelena </li>
                        <li> LEAN Caracas 1, 2, 3, 4, 5, 6 </li>
                        <li> Seno Salud </li>
                        <li> Somos Ayuda </li>
                        <li> FDIV </li>
                        <li> Parroq. San Fco. de Asis </li>
                        <li> ONG Pan y Vino </li>
                        <li> Fund.Denzel El Guerrero </li>
                        <li> LEAN Nueva Esparta </li>
                        <li> Parroquia San Félix </li>
                        <li> Fundación Esperanza de Vida </li>
                        <li> Caritas de Venezuela </li>
                    </div>
                    <div class="column5">
                        <li> Fund.Denzel El Guerrero </li>
                        <li> Mensajeras de la Alegría </li>
                        <li> Caritas Valle de la Pascua </li>
                        <li> Fundación La Pastillita </li>
                        <li> Caritas Diocesana</li>
                        <li> LEAN Nueva Esparta </li>
                        <li> Hogar de Niños Impedidos</li>
                        <li> AVEPEII </li>
                        <li> Casa Hogar Madre Teresa </li>
                        <li> Fund.Denzel El Guerrero </li>
                        <li> Seminario Santa Rosa de</li>
                        <li> Parroquia Michelena </li>
                        <li> Casa Aragón </li>
                        <li> Caritas Parroquial de Mérida </li>
                        <li> Asociación Dr. Paúl Moreno </li>
                        <li> FUNDAYÚDANOS </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
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




</body>

</html>