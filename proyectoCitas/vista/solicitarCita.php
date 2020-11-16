<?php
    require_once('../control/gbd.inc.php');
    require_once '../control/funciones.inc.php';
    session_start();
    $usuario = $_SESSION['usuario'];
    $listaServicios = listaServicios();
    $arrayUsuario = leeUsuario($usuario);

    if (isset($_POST['botonHoras'])) {
        if (empty($_POST['fecha'])) {
            $error = "Debes elegir un dia";
        } else {
            $fecha = $_POST['fecha'];
            $horasLibres = horasLibres($fecha);
        }
    }

    if (isset($_POST['enviar'])) {
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $idServicio = $_POST['problema'];

        if (empty($fecha) || empty($hora)) {
            $error = "Debes introducir todos los datos!!";
        } else {

            $fechaHora = $fecha." ".$hora;
            
            grabarCitaBD($fechaHora, $usuario, $idServicio);
        }
    }




?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar Cita</title>
    <link rel="stylesheet" href="../estilos/estilos.css">


</head>

<body>

    <?php
        require_once '../vista/cabeceraCerrarSesion.php';
    ?>
    <nav>
        <ul id="button">
            <li><a href="verCitas.php">Ver Citas</a></li>
            <li><a href="solicitarCita.php">Pedir Citas</a></li>
            <li><a href="actualizarDatosUsuario.php">Actualizar Datos</a></li>
        </ul>
    </nav>
    <div id="cita">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <h3>Solicitar Cita
                <hr />
            </h3>
            <p><label for="cliente">Cliente</label>
                <input type="text" name="cliente" value="<?php
                                                            foreach ($arrayUsuario as $clave => $valor) {
                                                                echo $valor->nombre . " " . $valor->apellido1;
                                                            }
                                                            ?>" disabled /></p>

            <p><label for="curandero">Curandero</label>
                <input type="text" name="curandero" value="Barro Ramirez Perez" disabled /></p>

            <p><label for="fecha">Fecha</label>
                <input type="date" name="fecha" value="<?php if (isset ($_POST['fecha'])) echo $_POST['fecha'];?>"/></p>
            <input type="submit" name="botonHoras"/>
            <p><label for="hora">Hora</label>
                <select name="hora">
                    <?php
                        foreach ($horasLibres as $clave) {
                            echo "<option value=$clave>$clave </option>";
                        }
                    ?>
                </select>

            <p><label for="problema">¿Qué problema tiene?</label>
                <select name="problema" id="problema">

                    <?php
                    foreach ($listaServicios as $clave => $valor) {
                        echo '<option value=' . $valor->codServicio . '>' . $valor->nombre . '</option>';
                    }

                    ?>

                </select></p>

            <input type="submit" name="enviar">

        </form>

    </div>
</body>

</html>