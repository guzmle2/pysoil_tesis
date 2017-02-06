<?php
include_once 'C:\xampp/htdocs/PYSOIL/src/FrontEnd/Base.php';
$dao = FabricaDao::obtenerDaoLlave($Llave = FabricaEntidad::entidadLlave());
$Llaves = $dao->obtenerTodos();
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
<script type="text/javascript">


    function clickAgregar() {
        var row = document.getElementById("rowToClone"); // find row to copy
        var table = document.getElementById("tableToModify"); // find table to append to
        var clone = row.cloneNode(true); // copy children too

        var InputType = clone.getElementsByTagName("input");

        for (var i = 0; i < InputType.length; i++) {
            if (InputType[i].type == 'checkbox') {
                InputType[i].checked = false;
            } else {
                InputType[i].value = '';
            }
        }
        table.appendChild(clone); // add new row to end of table

    }
</script>
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


    <div class="center" style="color: red;">
        <?php if (isset($_GET[ "asignado"]))
        {
            if ($_GET[ "asignado"]=="si" )
            { echo '*La llave  fue asignada Sastisfactoriamente*';
            }else{ echo '* La llave no pudo ser asignado*';
            }
        }
        ?>

    </div>
    <div class="center" style="color: red;">
        <?php if (isset($_GET[ "ordenExiste"]))
        {
            if ($_GET[ "ordenExiste"]=="si" )
            {
            }else{ echo '* La llave no pudo ser asignado la orden no existe*';
            }
        }
        ?>

    </div>


    <div class="row col s12">
        <div class="center waves-color-demo ">
            <div class="row center">
                <p>Recursos</p>
            </div>
            <div class="row">
                <a href="asignar.php" class="waves-effect waves-red btn-large waves-color-demo" ">ASIGNAR</a>
                <a href="buscar.php" class="waves-effect waves-red btn-large waves-color-demo">BUSCAR</a>
                <a href="agregarMedidor.php" class="waves-effect waves-red btn-large waves-color-demo">AGREGAR</a>

                <a href="#!" class="waves-effect waves-red btn-large waves-color-demo">IMPRIMIR</a>
                <a href="../index.php" class="waves-effect waves-red btn-large waves-color-demo">REGRESAR</a>

            </div>

            <div class="row">
                <div class="row">
                    <div class="input-field col s6">
                        <select class="browser-default"  onchange="location = this.value" required>
                            <option value="asignarMedidor.php" >Medidor</option>
                            <option value="asignarLlave.php" selected>Llave</option>
                            <option value="asignarRetiroMedidor.php">Retiro de medidor</option>
                        </select>
                    </div>
                </div>

                        <form action="_asignarLlaveBean.php" method="post">
                            <div class="row">
                                <div id="medidor_contrato">
                                    <div class="input-field col s4">
                                        <select class="browser-default" name="llave" required>
                                            <option value="" disabled selected>Seleccione Llave</option>
                                            <?php foreach($Llaves as $items):?>
                                                <option value="<?php echo $items->getId();?>">
                                                    <?php echo $items->getNombre() ?>
                                                </option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="input-field col s4">
                                        <input name="nic" placeholder="Numero de contrato" type="text" class="validate" />
                                    </div>
                                </div>
                                <div class="center">
                                    <button class="waves-effect waves-red btn-large waves-color-demo" type="submit" name="action">Asignar!
                                        <i class="mdi-content-send right"></i>
                                    </button>
                                </div>

                        </form>
                </div>

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