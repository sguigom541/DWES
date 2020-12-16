<?php
date_default_timezone_set("Europe/Madrid");
$gbd = new GBD("localhost", "sggveterinaria", "root", "");

$ahora = new DateTime();
//echo $ahora->format('Y-m-d');
$fechaFormateada = $ahora->format('Y-m-d');

// se valida el formulario
$valida = new Validacion();
if (isset($_POST['enviar'])) {
    $valida->Requerido("codUsuario");
    $valida->Requerido("codMascota");
    $valida->Requerido("nombreMascota");
    $valida->validaFecha("fechaNac");
    $valida->Requerido("especie");
    $valida->Requerido("genero");
    /*if($_POST['especie']=="pe01" || $_POST['especie']=="ga01"){
        $valida->Requerido("chip");
        $valida->Requerido("parteCuerpo");
    }*/
    if ($valida->ValidacionPasada()) {
        if ($_POST['especie'] == "pe01" || $_POST['especie'] == "ga01") {
            if (!empty($_POST['chip'])) {
               
                $gbd->add("mascota", [
                    "codMascota" => $_POST['codMascota'], "nombreMascota" => $_POST["nombreMascota"],
                    "fechaNac" => $_POST['fechaNac'], "codEspecie" => $_POST['especie'], "codGenero" => $_POST['genero'], "codUsuario" => $_POST['codUsuario']
                ]);
                $gbd->add("mascotatienechip", ["codMascota" => $_POST['codMascota'], "codChip" => $_POST['chip'],"fechaImplantacion"=>$fechaFormateada, "codParteCuerpo" => $_POST['parteCuerpo']]);
                header('location:?veterinario=adminMascotas');
            } else {
                $gbd->add("mascota", [
                    "codMascota" => $_POST['codMascota'], "nombreMascota" => $_POST["nombreMascota"],
                    "fechaNac" => $_POST['fechaNac'], "codEspecie" => $_POST['especie'], "codGenero" => $_POST['genero'], "codUsuario" => $_POST['codUsuario']
                ]);
                header('location:?veterinario=adminMascotas');
            }
        }
        //animal dif de perro o gato
        else {
            $gbd->add("mascota", [
                "codMascota" => $_POST['codMascota'], "nombreMascota" => $_POST["nombreMascota"],
                "fechaNac" => $_POST['fechaNac'], "codEspecie" => $_POST['especie'], "codGenero" => $_POST['genero'], "codUsuario" => $_POST['codUsuario']
            ]);
            header('location:?veterinario=adminMascotas');
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Mascota</title>
    <script src="./script/crearMascota.js"></script>
</head>

<body>
    <div class="form_register">
        <h1>Registro Mascota</h1>
        <hr>
        <form action="" method="POST">
            <label for="codUsuario">Dueño</label>
            <input type="text" name="codUsuario" id="codUsuario" value="<?php if (!empty($_GET['idUsuario'])) {
                                                                            echo $_GET['idUsuario'];
                                                                        } ?>" placeholder="introduzca el dueño de la mascota">
            <input type="button" value="buscar Dueño" id="show-modalUsuario">
            <p><?php echo $valida->ImprimirError("codUsuario") ?></p>
            <label for="codigoMascota">Mascota</label>
            <input type="text" name="codMascota" id="codMascota" value="<?php if (!empty($_POST['codMascota'])) {
                                                                            echo $_POST['codMascota'];
                                                                        }
                                                                        ?>">
            <p><?php echo $valida->ImprimirError("codMascota") ?></p>
            <label for="nombreMascota">Nombre Mascota</label>
            <input type="text" name="nombreMascota" id="nombreMascota" value="<?php if (isset($_POST['nombreMascota'])) {
                                                                                    echo $_POST['nombreMascota'];
                                                                                }
                                                                                ?>">
            <p><?php echo $valida->ImprimirError("nombreMascota") ?></p>
            <label for="fechaNac">F.Nacimiento</label>
            <input type="date" name="fechaNac" id="fechaNac" value="<?php if (!empty($_POST['fechaNac'])) {
                                                                        echo $_POST['fechaNac'];
                                                                    }
                                                                    ?>">
            <p><?php echo $valida->ImprimirError("fechaNac") ?></p>
            <label for="especie">Especie</label>
            <select name="especie" id="especie">
                <option value="" selected>Ninguno</option>
                <?php
                $arrayEspecie = $gbd->getAll("especie");
                foreach ($arrayEspecie as $clave) {
                    echo '<option  value="' . $clave->getCodEspecie() . '">' . $clave->getNombre() . '</option>';
                }
                ?>

            </select>
            <p><?php echo $valida->ImprimirError("especie") ?></p>
            <div id="chip" style="display: none;">
                <label for="chip">¿Desea ponerle el chip a su mascota?</label>
                <p>Introduzca el código del chip</p>
                <input type="text" name="chip" id="chip">
                <p><?php echo $valida->ImprimirError("chip") ?></p>
                <label for="parteCuerpo">Parte Cuerpo</label>
                <select name="parteCuerpo" id="parteCuerpo">
                    <option value="" selected>Ninguno</option>
                    <?php
                    $arrayParteCuerpoChip = $gbd->getAll("partecuerpochip");
                    foreach ($arrayParteCuerpoChip as $clave) {
                        echo '<option  value="' . $clave->getCodParteCuerpo() . '">' . $clave->getLugarImplantacion() . '</option>';
                    }
                    ?>
                </select>
                <p><?php echo $valida->ImprimirError("parteCuerpo") ?></p>
            </div>
            <label for="genero">Sexo</label>
            <select name="genero" id="genero">
                <option value="" selected>Ninguno</option>
                <?php
                $arrayGenero = $gbd->getAll("genero");
                foreach ($arrayGenero as $clave) {
                    echo '<option  value="' . $clave->getCodGenero() . '">' . $clave->getNombre() . '</option>';
                }
                ?>
            </select>
            <p><?php echo $valida->ImprimirError("genero") ?></p>
            <input type="submit" value="Crear Mascota" name="enviar" class="btn_add">
        </form>
    </div>
    <!-- div modal de los usuarios-->
    <div id="divModal" class="modalContainer">
        <div class="modal-content">
            <button id="cerrarModal">Cerrar</button>
            <table class="paleBlueRows">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Nombre</th>
                        <th>apellido 1</th>
                        <th>apellido 2</th>
                        <th>telefono</th>
                        <th>Seleccionar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $usuario = $gbd->getAll("usuario", ['codUsuario', 'nombre', 'ape1', 'ape2', 'telefono', 'email', 'codRol']);
                    foreach ($usuario as $clave) {
                        echo '<tr>';
                        echo '<td>' . $clave->getCodUsuario() . '</td>';
                        echo '<td>' . $clave->getNombre() . '</td>';
                        echo '<td>' . $clave->getApe1() . '</td>';
                        echo '<td>' . $clave->getApe2() . '</td>';
                        echo '<td>' . $clave->getTelefono() . '</td>';
                        echo '<td>';
                        echo '<a class="link_edit" href="?veterinario=crearMascota&idUsuario=' . $clave->getCodUsuario() . '">Seleccionar</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>