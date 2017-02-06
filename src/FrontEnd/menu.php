<?php
include_once 'C:\xampp/htdocs/PYSOIL/src/FrontEnd/Base.php';
session_start();
$usuario = FabricaEntidad::entidadUsuario();
$usuario = $_SESSION['usuarioLogeado'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tesis</title>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <header>
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo center">Sistema de registro y control</a>
                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li><a href="recurso/asignar.php">Recursos</a>
                    </li>
                    <li><a href="servicios/index.php">Servicios</a>
                    </li>
                    <li>
                        <a href="index.php">Salir</a>
                    </li>


                </ul>
            </div>
        </nav>

    </header>

    <section class="container section white">
        <div class="row col s12">
            <div class="center waves-color-demo ">
                <br>
                <br>
                <br>
                <br>
                <p>

                </p>
                <p>
                    <a href="recurso/asignar.php" class="waves-effect waves-red btn-large waves-color-demo">Recursos</a>

                </p>
                <p>
                    <a href="servicios/index.php" class="waves-effect waves-red btn-large waves-color-demo">servicios</a>

                </p>
                <p>
                    <?php
                    if(isset($usuario)){
                    if($usuario->getTipo() =='ADMINISTRADOR' ){
                    ?>


                <a href="registroUsuario.php" class="waves-effect waves-red btn-large waves-color-demo">Registrar Usuario nuevo</a>
                <?php

                }
                }?>
                </p>

                <p>
                    <?php
                    if(isset($usuario)){
                        if($usuario->getTipo() !='ADMINISTRADOR' ){
                            ?>


                            <a href="index.php.php" class="waves-effect waves-red btn-large waves-color-demo">Salir</a>
                        <?php

                        }
                    }?>
                </p>
                <br>
                <div style="color: blue;">
                    <?php if (isset($_GET[ "registrado"]))
                    {
                        if ($_GET[ "registrado"]=="si" ){
                            echo '*usuario registrado con exito*';
                        }else{
                            echo '*Error al regitrar usuario*';
                        }
                    } ?>

                </div>
                <br>
                <br>
            </div>
        </div>
    </section>


    <footer class="page-footer">
        <div class="container">
            <div class="row center">
                <div class="col l12 s12">
                    <h5 class="white-text">Gleidis</h5>
                    <p class="grey-text text-lighten-4">Tesis registro y control.</p>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container center">
                © 2015 Copyright
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>