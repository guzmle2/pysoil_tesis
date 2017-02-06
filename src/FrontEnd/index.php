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

                        <?php if (isset($_GET[ "errorIngresando"]))
                        {
                            if ($_GET[ "errorIngresando"]=="no" )
                            {
                                echo '*Error no se puede registrar*';
                            }
                        } ?>
                    </div>

                </div>
                <form action="indexBean.php" method="post" style="padding:20%;" >
                    <div class="row ">
                        <div class="input-field">
                            <input id="login" type="text" name="login" class="validate" required>
                            <label for="login">Usuario</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <input id="clave" type="password" name="clave" class="validate" required>
                            <label for="clave">Clave</label>
                        </div>
                    </div>

                    <div class="center waves-color-demo ">
                        <button class="waves-effect waves-red btn-large waves-color-demo" type="submit" name="action">OK!
                        </button>
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