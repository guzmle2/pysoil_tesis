<?php
include_once 'C:\xampp/htdocs/PYSOIL/src/FrontEnd/Base.php';

$daoM = FabricaDao::obtenerDaoMedidor(FabricaEntidad::entidadMedidor());

session_start();

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
            <h4>Detalle Medidor</h4>
            <div class="row">
                <form action="_busquedaParametroBean.php" method="post">
                    <div class="col s4">
                        <select class="browser-default" name="parametro" required>
                            <option value="">Seleccione la busqueda</option>
                            <option value="nic">Numero de contrato</option>
                            <option value="serial">serial</option>
                            <option value="fechaRecibido" >Fecha (YYYY-MM-DD)</option>
                            <option value="numero" >numero</option>
                        </select>

                        <input required name="valor" placeholder="Ingrese valor de busqueda"  type="text" class="validate">
                    </div>
                    <div class="row">

                        <button class="waves-effect waves-red btn-large waves-color-demo" type="submit" name="action">Buscar!
                            <i class="mdi-content-send right"></i>
                        </button>
                    </div>
                </form>
            </div>

            <?php if(isset($_GET['valor'])){

                $orden = $daoM->consultarXParametro($_GET['parametro'],$_GET['valor']);
                ?>

                <table class="striped centered responsive-table">
                    <thead>
                    <tr class="centered">
                        <th data-field="num">N°</th>
                        <th data-field="NIC">NIC</th>
                        <th data-field="numero">Numero</th>
                        <th data-field="marca">Marca</th>
                        <th data-field="Serial">Serial</th>
                        <th data-field="os">Os</th>
                        <th data-field="fecharecibido"> Fecha Recibido</th>
                        <th data-field="observacion">Observacion</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $orden->getId();?> </td>
                            <td><?php echo $orden->getNic();?> </td>
                            <td><?php echo $orden->getNumero();?> </td>
                            <td><?php echo $orden->getMarca();?> </td>
                            <td><?php echo $orden->getSerial();?> </td>
                            <td><?php echo $orden->getOs();?> </td>
                            <td><?php echo $orden->getFechaRecibido();?> </td>
                            <td><?php echo $orden->getObservacion();?> </td>

                            <td>
                                <?php if($orden->getNic() == null){?>
                                    <a href="asignarMedidor.php?id=<?php echo $orden->getId();?>">Asignar!</a>
                                <?php } ?>

                            </td>

                            <?php
                            if(isset($_SESSION['usuarioLogeado'])){
                                if($_SESSION['usuarioLogeado']->getTipo() == 'ADMINISTRADOR'){
                                    ?>
                                    <td>
                                        <a href="_eliminarMedidorBean.php?id=<?php echo $orden->getId();?>">Eliminar!</a>
                                    </td>
                                <?php
                                }
                            }
                            ?>
                            <td>
                                <a href="agregarMedidor.php?id=<?php echo $orden->getId();?>">Editar!</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

            <?php }else{

                $medidor = $daoM->obtenerTodos()
                ?>

                <table class="striped centered responsive-table">
                    <thead>
                    <tr class="centered">
                        <th data-field="num">N°</th>
                        <th data-field="NIC">NIC</th>
                        <th data-field="numero">Numero</th>
                        <th data-field="marca">Marca</th>
                        <th data-field="Serial">Serial</th>
                        <th data-field="Diametro">Diametro</th>
                        <th data-field="os">Os</th>
                        <th data-field="fecharecibido"> Fecha Recibido</th>
                        <th data-field="observacion">Observacion</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach( $medidor as $orden):
                        ?>
                        <tr>
                            <td><?php echo $orden->getId();?> </td>
                            <td><?php echo $orden->getNic();?> </td>
                            <td><?php echo $orden->getNumero();?> </td>
                            <td><?php echo $orden->getMarca();?> </td>
                            <td><?php echo $orden->getSerial();?> </td>
                            <td><?php echo $orden->getDiametro();?> </td>
                            <td><?php echo $orden->getOs();?> </td>
                            <td><?php echo $orden->getFechaRecibido();?> </td>
                            <td><?php echo $orden->getObservacion();?> </td>

                    <td>
                        <?php if($orden->getNic() == null){?>
                            <a href="asignarMedidor.php?id=<?php echo $orden->getId();?>">Asignar!</a>
                        <?php } ?>

                    </td>
                            <?php
                            if(isset($_SESSION['usuarioLogeado'])){
                                if($_SESSION['usuarioLogeado']->getTipo() == 'ADMINISTRADOR'){
                                    ?>
                                    <td>
                                        <a href="_eliminarMedidorBean.php?id=<?php echo $orden->getId();?>">Eliminar!</a>
                                    </td>
                                <?php
                                }
                            }
                            ?>
                            <td>
                                <a href="agregarMedidor.php?id=<?php echo $orden->getId();?>">Editar!</a>
                            </td>
                        </tr>


                    <?php endforeach;
                    ?>
                    </tbody>
                </table>

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