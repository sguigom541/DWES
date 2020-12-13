<?php
    $gbd=new GBD("localhost", "sggveterinaria", "root", "");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
</head>
<body>
    <section id="container-lista">
        <h1>Lista de usuarios</h1>
        <a href="?veterinario=crearUsuario" class="btn_new">Crear Usuario</a>
        <table>
            <tr>
                <th>Username</th>
                <th>Nombre</th>
                <th>apellido 1</th>
                <th>apellido 2</th>
                <th>telefono</th>
                <th>email</th>
                <th>rol</th>
                <th>Acciones</th>
            </tr>
            <?php
               $usuario= $gbd->getAll("usuario",['codUsuario','nombre','ape1','ape2','telefono','email','codRol']);
               foreach ($usuario as $clave) {
                   echo '<tr>';
                   echo '<td>' . $clave->getCodUsuario() . '</td>';
                   echo '<td>' . $clave->getNombre() . '</td>';
                   echo '<td>' . $clave->getApe1(). '</td>';
                   echo '<td>' . $clave->getApe2(). '</td>';
                   echo '<td>' . $clave->getTelefono(). '</td>';
                   echo '<td>' . $clave->getEmail(). '</td>';
                   echo '<td>' . $clave->getCodigoRol(). '</td>';
                   echo '<td>';
                        echo '<a class="link_edit" href="?veterinario=editarUsuario&idUsuario=' . $clave->getCodUsuario() . '">Editar</a>';
                        
                        if($clave->getCodigoRol()==1){
                            echo '|';
                            echo '<a class="link_delete" href="?veterinario=eliminarUsuario&idUsuario=' . $clave->getCodUsuario() . '&rol=' . $clave->getCodUsuario() . '">Borrar</a>';
                        }
                        
                       
                   echo '</td>';
                   echo '</tr>';
               }
            ?>
        
        </table>
    </section>
</body>
</html>