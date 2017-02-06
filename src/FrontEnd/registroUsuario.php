<?php
if(isset($_SESSION))
{
    session_destroy();
}
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
        </div>
    </nav>

</header>

<section class="container section white">
    <div class="row">
        <div class="col s6 offset-s3">
            <div style="color: red;">
                <?php if (isset($_GET[ "errorusuario"]))
                {
                    if ($_GET[ "errorusuario"]=="si" )
                    { echo '*Clave incorrecta*';
                    }
                }
                ?>
                <div style="color: blue;">
                    <?php if (isset($_GET[ "usuarionuevo"]))
                    {
                        if ($_GET[ "usuarionuevo"]=="si" )
                        {
                            echo '*Ingrese con su nueva clave*';
                        }
                        if ($_GET[ "usuarionuevo"]=="no" )
                        {
                            echo '*Usuario no existe en el sistema*';
                        }
                    } ?>
                </div>

            </div>

            <form action="_registroBean.php" method="post" >

                <div class="contenedorLogin waves-color-demo">
                    <h4 style="color:black;" align="center">Registro de usuario</h4>
                    <br>
                    <div class="row ">
                        <div class="input-field">
                            <input id="nombre" type="text" class="validate" length="10" name="nombre" required>
                            <label for="nombre">Nombre</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="input-field col s6">
                            <input id="login" type="text" class="validate" length="10" name="login" required>
                            <label for="login">Login</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="" type="password" class="validate" length="10" name="clave" required>
                            <label for="clave">Clave</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="input-field col s6">
                            <select class="browser-default" name="tipo" required>
                                <option value="" selected>Seleccione tipo usuario</option>
                                <option value="USUARIO">USUARIO</option>
                                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                            </select>
                        </div>
                        <div class="input-field col s6">
                            <input id="cedula" type="text" class="validate" length="10" name="cedula" required>
                            <label for="cedula">Cedula</label>
                        </div>
                    </div>


                    <div class="col s2 offset-s4">
                        <button class="waves-effect waves-red btn-large waves-color-demo" type="submit" name="action">Agregar
                            <i class="mdi-alert-warning right"></i>
                        </button>
                    </div>
                </div>
            </form>


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