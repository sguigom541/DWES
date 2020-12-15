<?php
$gbd = new GBD("localhost", "sggveterinaria", "root", "");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Mascota</title>
</head>

<body>
    <div class="form_register">
        <h1>Registro Mascota</h1>
        <hr>
        <form action="" method="POST">
            <label for="codUsuario">Dueño</label>
            <input type="text" name="codUsuario" id="codUsuario" value="">
            <input type="button" value="buscar Dueño" id="show-modalUsuario">
            <label for="codigoMascota">Mascota</label>
            <input type="text" name="codMascota" id="codMascota" value="">
            <label for="nombreMascota">Nombre Mascota</label>
            <input type="text" name="nombreMascota" id="nombreMascota">
            <label for="fechaNac">F.Nacimiento</label>
            <input type="date" name="fechaNac" id="fechaNac">
            <label for="especie">Especie</label>
            <select name="especie" id="especie">
                <option value="" selected>Ninguno</option>

            </select>
            <div id="chip" style="display: none;">
                <label for="chip">¿Desea ponerle el chip a su mascota?</label>

            </div>
            <label for="genero">Sexo</label>
            <select name="genero" id="genero">

            </select>
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
</body>

</html>