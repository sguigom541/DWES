<?php
$gbd = new GBD("localhost", "sggveterinaria", "root", "");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de mascotas</title>
</head>

<body>
    <section id="container-lista">
        <h1>Lista de mascotas</h1>
        <a href="?veterinario=crearMascota" class="btn_new">Crear Mascota</a>
        <table>
            <tr>
                <th>Cod.Mascota</th>
                <th>Nombre</th>
                <th>Fecha Nacimiento</th>
                <th>Cod Especie</th>
                <th>Cod Genero</th>
                <th>Dueño</th>
                <th>Acciones</th>
            </tr>
            <?php
               $mascota= $gbd->getAll("mascota");
               print_r($mascota[4]);
               foreach ($mascota as $clave) {
                   echo '<tr>';
                   echo '<td>' . $clave->getCodMascota() . '</td>';
                   echo '<td>' . $clave->getNombreMascota() . '</td>';
                   echo '<td>' . $clave->getFechaNac(). '</td>';
                   echo '<td>' . $clave->getCodEspecie(). '</td>';
                   echo '<td>' . $clave->getCodGenero(). '</td>';
                   echo '<td>' . $clave->getCodUsuario(). '</td>';
                   echo '<td>';
                        echo '<a class="link_edit" href="?veterinario=editarMascota">Editar</a>';
                        echo '|';
                        echo '<a class="link_delete" href="?veterinario=eliminarMascota">Borrar</a>';
                   echo '</td>';
                   echo '</tr>';
               }
            ?>

        </table>
    </section>
</body>

</html>