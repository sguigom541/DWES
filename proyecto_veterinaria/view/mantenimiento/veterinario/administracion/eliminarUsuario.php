<?php
$gbd = new GBD("localhost", "sggveterinaria", "root", "");

if(!empty($_POST)){
    $gbd->delete("usuario",[$_POST['idUsuario']]);
    header('location:?veterinario=adminUsuarios');
}


if (empty($_REQUEST['idUsuario']) || $_REQUEST['rol']!=1) {
    header('location:?veterinario=adminUsuarios');
} else {
    $idUsuario = $_REQUEST['idUsuario'];
    $usuario = $gbd->findById("usuario", [$idUsuario]);
}


?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
</head>

<body>
    <section id="container_delete">
        <div class="data_delete">
            <h2>¿Está seguro de eliminar el siguiente registro?</h2>
            <p>Username: <span><?php echo $usuario[0]->getCodUsuario() ?></span></p>
            <p>Nombre: <span><?php echo $usuario[0]->getNombre() ?></span></p>

            <form action="" method="POST">
                <input type="hidden" name="idUsuario" value="<?php echo $idUsuario;?>">
                <a href="?veterinario=adminUsuarios" class="btn_cancelar">Cancelar</a>
                <input type="submit" value="Aceptar" class="btn_ok">
            </form>
        </div>

    </section>

</body>

</html>