<?php
include_once 'C:\xampp/htdocs/PYSOIL/src/FrontEnd/Base.php';
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
<header>
    <nav>
        <div class="nav-wrapper">
            <a href="../menu.php" class="brand-logo center">Sistema de registro y control</a>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><a href="asignar.php">Recursos</a>
                </li>
                <li><a href="../servicios/index.php">Servicios</a>
                </li>
            </ul>
        </div>
    </nav>

</header>

<section class="container section white">
    <div class="row col s12">
        <div class="center waves-color-demo ">
            <div class="row center">
                <p>Recursos</p>
            </div>
            <div class="row">
                <a href="asignar.php" class="waves-effect waves-red btn-large waves-color-demo"  >ASIGNAR</a>
                <a href="buscar.php" class="waves-effect waves-red btn-large waves-color-demo" >BUSCAR</a>
                <a href="agregarMedidor.php" class="waves-effect waves-red btn-large waves-color-demo" >AGREGAR</a>

                <a href="#!" class="waves-effect waves-red btn-large waves-color-demo">IMPRIMIR</a>
                <a href="../index.php" class="waves-effect waves-red btn-large waves-color-demo">REGRESAR</a>

            </div>

            <div class="center" style="color: red;">
                <?php if (isset($_GET[ "agregado"]))
                {
                    if ($_GET[ "agregado"]=="si" )
                    { echo '*El medidor fue agregado Sastisfactoriamente*';
                    }else{ echo '* El medidor no pudo ser agregado*';
                    }
                }
                ?>

            </div>
            <div class="center" style="color: red;">
                <?php if (isset($_GET[ "modificado"]))
                {
                    if ($_GET[ "modificado"]=="si" )
                    { echo '*El medidor fue modificado Sastisfactoriamente*';
                    }else{ echo '* El medidor no pudo ser modificado*';
                    }
                }
                ?>

            </div>
            <?php if(isset($_GET['id'])){
                $medidor = FabricaEntidad::entidadMedidor();
                $medidor->setId($_GET['id']);
                $dao = FabricaDao::obtenerDaoMedidor($medidor);
                $medidor = $dao->consultarXid();

                ?>

            <form action="_agregarMedidorBean.php" method="post">
                <table class="striped centered responsive-table">
                    <thead>
                    <tr class="centered">
                        <th data-field="NIC">NIC</th>
                        <th data-field="numero">Numero</th>
                        <th data-field="marca">Marca</th>
                        <th data-field="Serial">Serial</th>
                        <th data-field="Diametro">Diametro</th>
                        <th data-field="os">Os</th>
                        <th data-field="observacion">Observacion</th>
                        <th data-field="observacion">Fecha Recibido</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input  name="id"  type="hidden" value="<?php echo $medidor->getId()?>" class="validate center">
                                <input  name="nic" required type="text" value="<?php echo $medidor->getNic()?>" class="validate center">
                            </td>
                            <td>
                                <input  name="numero" disabled required type="text" value="<?php echo $medidor->getNumero()?>" class="validate center">
                                <input  name="numero"  required type="hidden" value="<?php echo $medidor->getNumero()?>" class="validate center">
                            </td>
                            <td>
                                <input  name="marca" required type="text" value="<?php echo $medidor->getMarca()?>" class="validate center">
                            </td>
                            <td>
                                <input  name="serial" required type="text" value="<?php echo $medidor->getSerial()?>" class="validate center">
                                <input  name="serial" type="hidden" value="<?php echo $medidor->getSerial()?>" class="validate center">
                            </td>
                            <td>
                                <input  name="diametro" required type="text" value="<?php echo $medidor->getDiametro()?>" class="validate center">
                            </td>
                            <td>
                                <input  name="os" required type="text" value="<?php echo $medidor->getOs()?>" class="validate center">
                            </td>
                            <td>
                                <input  name="observacion" required type="text" value="<?php echo $medidor->getObservacion()?>" class="validate center">
                            </td>
                            <td>
                                <input disabled name="fecha"  type="text" value="<?php echo $medidor->getFechaRecibido()?>" class="validate center">
                                <input name="fecha"  type="hidden" value="<?php echo $medidor->getFechaRecibido()?>" class="validate center">

                            </td>
                        </tr>
                    </tbody>
                </table>
            <br>
            <br>
            <br>
            <div class=" row center">
                <button class="waves-effect waves-red btn-large waves-color-demo" type="submit" name="action">Guardar!
                    <i class="mdi-content-send right"></i>
                </button>
            </div>
            </form>
            <?php }else{ ?>

                <form action="_agregarMedidorBean.php" method="post">
                    <table class="striped centered responsive-table">
                        <thead>
                        <tr class="centered">
                            <th data-field="numero">Numero</th>
                            <th data-field="marca">Marca</th>
                            <th data-field="Serial">Serial</th>
                            <th data-field="Diametro">Diametro</th>
                            <th data-field="os">Os</th>
                            <th data-field="observacion">Observacion</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <input required name="numero" placeholder="numero" type="text" class="validate center">
                            </td>
                            <td>
                                <input required name="marca" placeholder="marca" type="text" class="validate center">
                            </td>
                            <td>
                                <input required name="serial" placeholder="serial" type="text" class="validate center">
                            </td>
                            <td>
                                <input required name="diametro" placeholder="diametro" type="text" class="validate center">
                            </td>
                            <td>
                                <input required name="os" placeholder="O/S" type="text" class="validate center">
                            </td>
                            <td>
                                <input required name="observacion" placeholder="observacion" type="text" class="validate center">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <br>
                    <div class=" row center">
                        <button class="waves-effect waves-red btn-large waves-color-demo" type="submit" name="action">Guardar!
                            <i class="mdi-content-send right"></i>
                        </button>
                    </div>
                </form>


            <?php } ?>
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