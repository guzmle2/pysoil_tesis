<?php
include_once 'C:\xampp/htdocs/PYSOIL/src/FrontEnd/Base.php';
$Plomeros = FabricaEntidad::entidadPlomero();
$dao = FabricaDao::obtenerDaoPlomero($Plomeros);
$Plomeros = $dao->obtenerTodos();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tesis</title>
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <script>


        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });

    </script>
    <header>
        <nav>
            <div class="nav-wrapper">
                <a href="../menu.php" class="brand-logo center">Sistema de registro y control</a>
                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li><a href="../recurso/asignar.php">Recursos</a>
                    </li>
                    <li><a href="index.php">Servicios</a>
                    </li>
                </ul>
            </div>
        </nav>

    </header>

    <section class="container section white">
        <div class="center" style="color: red;">
            <?php if (isset($_GET[ "servicioAgregado"]))
            {
                if ($_GET[ "servicioAgregado"]=="si" )
                { echo '*Servicio Agregado Sastisfactoriamente*';
                }else{ echo '* El Servicio no pudo ser agregado*';
                }
            }
            ?>

        </div>

        <div class="center" style="color: red;">
            <?php if (isset($_GET[ "eliminado"]))
            {
                if ($_GET[ "eliminado"]=="si" )
                { echo '*Servicio se ha eliminado Sastisfactoriamente*';
                }else{ echo '* El Servicio no pudo ser eliminado*';
                }
            }
            ?>

        </div>

        <div class="center" style="color: red;">
            <?php if (isset($_GET[ "modificado"]))
            {
                if ($_GET[ "modificado"]=="si" )
                { echo '*Servicio modificado Sastisfactoriamente*';
                }else{ echo '* El Servicio no pudo modificar*';
                }
            }
            ?>

        </div>
        <div class="row col s12">
            <div class="center waves-color-demo ">
                <div class="row">
                    <a href="index.php" class="waves-effect waves-red btn-large waves-color-demo">AGREGAR</a>
                    <a href="busquedaServicio.php" class="waves-effect waves-red btn-large waves-color-demo" >BUSCAR</a>
                    <a href="#!" class="waves-effect waves-red btn-large waves-color-demo">IMPRIMIR</a>
                    <a href="../menu.php" class="waves-effect waves-red btn-large waves-color-demo">REGRESAR</a>
                    <a href="../index.php" class="waves-effect waves-red btn-large waves-color-demo">SALIR</a>
                </div>


                <div id="asignar" >

                    <div class="row" >
                        <div class="input-field col s6">
                            <select class="browser-default" name="tipoServicio" onchange="location = this.value">
                                <option value="">Tipo de servicio</option>
                                <option value="formSuspension.php">Suspension</option>
                                <option value="formSellado.php">Sellado</option>
                                <option value="formInhabilitacion.php">Inhabilitacion</option>
                                <option value="formRevision.php">Revision de cortes</option>
                                <option value="formVarios.php">Trabajos varios</option>
                                <option value="formReconexion.php">Reconexiones fuera de gestion</option>
                            </select>
                        </div>
                    </div>

                </div>



                <div id="buscar" style="display:none;">
                    <div class="row">
                        <div class="row" id="busqueda_valor">
                            <div class="col s12">

                                <div class="center">
                                    <h2>Servicios</h2>
                                    <h5>Por medio de esta opcion se Podra buscar para editar los servicios</h5>
                                </div>

                                <div class="col s4">
                                    <input placeholder="Valor de la busqueda" id="numContrato" type="text" class="validate">
                                </div>
                            </div>
                            <div class="row">
                                <a class="waves-effect waves-red btn-large waves-color-demo" onclick="">Busqueda</a>
                            </div>
                        </div>
                        <div id="busqueda_detalle">

                        </div>
                    </div>
                </div>
                <div id="agregar" style="display:none;">
                    <div class="row">
                        hola3
                    </div>
                </div>


            </div>
        </div>
        <div class="row col s12">

            <div id="herramienta_exito" style="display:none">
                <br> Herramienta Asignada con exito
                <br>
                <br>

                <br>
                <div class="row">
                    <a class="waves-effect waves-red btn-large waves-color-demo" href="index.php">Regresar</a>
                </div>
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
    <script type="text/javascript" src="../js/materialize.min.js"></script>
</body>

</html>