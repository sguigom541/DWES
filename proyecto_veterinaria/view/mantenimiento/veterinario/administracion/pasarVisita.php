<?php
date_default_timezone_set("Europe/Madrid");
$gbd = new GBD("localhost", "sggveterinaria", "root", "");
$ahora = new DateTime();
$fechaFormateada=$ahora->format('Y-m-d H:i:s');

// se valida el formulario
    $valida=new Validacion();
    if(isset($_POST['enviar'])){
        
        $valida->Requerido("codMascota");
        $valida->Requerido("motivoVisita");
        $valida->Requerido("problemasDetectados");
        $valida->Requerido("tratamiento");
        if($valida->ValidacionPasada()){
            if($_POST['tipoVacuna']!=""){
                $gbd->add("visita",["fechaVisita"=>$fechaFormateada,"codMascota"=>$_POST['codMascota'],"motivoVisita"=>$_POST['motivoVisita'],
                "problemasDetectados"=>$_POST['problemasDetectados'],"tratamiento"=>$_POST['tratamiento'],"observaciones"=>$_POST['observaciones']]);
                $gbd->add("cartillavacunacion",["codMascota"=>$_POST['codMascota'],"fechaVacunacion"=>$fechaFormateada,"observaciones"=>$_POST['observacionesVacuna'],"codVacuna"=>$_POST['tipoVacuna']]);
                header('location:?veterinario=adminUsuarios');
            }
            else{
                $gbd->add("visita",["fechaVisita"=>$fechaFormateada,"codMascota"=>$_POST['codMascota'],"motivoVisita"=>$_POST['motivoVisita'],
                "problemasDetectados"=>$_POST['problemasDetectados'],"tratamiento"=>$_POST['tratamiento'],"observaciones"=>$_POST['observaciones']]);
                header('location:?veterinario=adminUsuarios');
            }
        }
    }
   

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasar Visita</title>
    <script src="./script/pasarVisita.js"></script>
</head>

<body>
    <div class="container_visita">
        <h2>Nueva Visita</h2>
        <hr>
        <form action="" method="POST">
            <label for="usuario">Dueño</label>
            <input type="text" name="usuario" id="" value="<?php 
            if(!empty($_GET['idUsuario']))
            {
                echo $_GET['idUsuario'];
            }
            
            ?>">
            <input type="button" value="buscar Dueño" id="show-modalUsuario">
            <label for="codMascota">Mascota</label>
            <input type="text" name="codMascota" id="codMascota" value="<?php 
            if(!empty($_GET['idUsuario']) && !empty($_GET['idMascota']))
            {
                echo $_GET['idMascota'];
            }
            ?>">
            <p><?php echo $valida->ImprimirError("codMascota") ?></p>
            <input type="button" value="Mascota" id="show-modalMascota">
            <label for="motivoVisita"> Motivo</label>
            <textarea name="motivoVisita" id="motivoVisita" cols="50" rows="10"></textarea>
            <p><?php echo $valida->ImprimirError("motivoVisita") ?></p>
            <label for="quiereVacuna">¿Quiere poner una vacuna?</label>
            <input type="checkbox" name="quiereVacuna" id="quiereVacuna">
            <div id="vacuna" style="display: none;">
                <label for="tipoVacuna">Tipo Vacuna</label>

                <select name="tipoVacuna" id="tipoVacuna">
                    <option value="" selected>Ninguno</option>
                    <?php
                    $arrayVacuna = $gbd->getAll("vacuna");
                    foreach ($arrayVacuna as $clave) {
                        echo '<option  value="' . $clave->getCodVacuna() . '">' . $clave->getNombre() . '</option>';
                    }
                    ?>

                </select>
                <label for="observacionesVacuna">¿Algún tipo de reacción?</label>
                <textarea name="observacionesVacuna" id="observacionesVacuna" cols="50" rows="10"></textarea>
            </div>
            <label for="problemasDetectados">Problemas Detectados</label>
            <textarea name="problemasDetectados" id="problemasDetectados" cols="50" rows="10"></textarea>
            <p><?php echo $valida->ImprimirError("problemasDetectados") ?></p>
            <label for="tratamiento">Tratamiento</label>
            <textarea name="tratamiento" id="tratamiento" cols="50" rows="10"></textarea>
            <p><?php echo $valida->ImprimirError("tratamiento") ?></p>
            <label for="observaciones">Otras Observaciones</label>
            <textarea name="observaciones" id="observaciones" cols="50" rows="10"></textarea>
            <input type="submit"  name="enviar"value="Pasar Visita">
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
                        echo '<a class="link_edit" href="?veterinario=pasarVisita&idUsuario=' . $clave->getCodUsuario() . '">Seleccionar</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
                </tr>
            </table>
        </div>
    </div>
    <!-- div modal de las mascotas-->
    <div id="divModalMascota" class="modalContainer">
        <div class="modal-content">
            <button id="cerrarModalMascota">Cerrar</button>
            <table class="paleBlueRows">
                <thead>
                    <tr>
                        <th>Cod Mascota</th>
                        <th>Nombre</th>
                        <th>Fecha Nacimiento</th>
                        <th>telefono</th>
                        <th>Seleccionar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($_GET['idUsuario']))
                    {
                        $dueno=$_GET['idUsuario'];
                        $arrayMascotaUsuario=$gbd->getMascotasUsuario($dueno);
                        foreach ($arrayMascotaUsuario as $clave) {
                            echo '<tr>';
                            echo '<td>' . $clave['codMascota'] . '</td>';
                            echo '<td>' . $clave['nombreMascota'] . '</td>';
                            echo '<td>' . $clave['fechaNac'] . '</td>';
                            echo '<td>' . $clave['especie'] . '</td>';
                            echo '<td>';
                            echo '<a class="link_edit" href="?veterinario=pasarVisita&idUsuario=' . $dueno . '&idMascota=' . $clave['codMascota'] . '">Seleccionar</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    }
                    
                    ?>
                </tbody>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>