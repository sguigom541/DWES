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
               $mascota2=$gbd->getAllMascotas();
               foreach ($mascota2 as $clave) {
                   echo '<tr>';
                   echo '<td>' . $clave['codMascota'] . '</td>';
                   echo '<td>' . $clave['nombreMascota']. '</td>';
                   echo '<td>' . $clave['fechaNac']. '</td>';
                   echo '<td>' . $clave['especie']. '</td>';
                   echo '<td>' . $clave['genero']. '</td>';
                   echo '<td>' . $clave['codUsuario']. '</td>';
                   echo '<td>';
                        echo '<a class="link_edit" href="?veterinario=editarMascota&idMascota=' . $clave['codMascota'] . '">Editar</a>';
                        echo '|';
                        echo '<a class="link_delete" href="?veterinario=eliminarMascota&idMascota=' . $clave['codMascota'] . '">Borrar</a>';
                   echo '</td>';
                   echo '</tr>';
               }
            ?>

        </table>
    </section>
</body>

</html>