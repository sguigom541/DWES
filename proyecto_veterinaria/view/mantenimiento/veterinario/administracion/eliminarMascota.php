<?php
$gbd = new GBD("localhost", "sggveterinaria", "root", "");

if(!empty($_POST)){
    $gbd->delete("mascota",[$_POST['idMascota']]);
    header('location:?veterinario=adminMascotas');
}


if (empty($_REQUEST['idMascota'])) {
    header('location:?veterinario=adminMascotas');
} else {
    $idMascota = $_REQUEST['idMascota'];
    $mascota = $gbd->findById("mascota", [$idMascota]);
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
            <p>Username: <span><?php echo $mascota[0]->getCodMascota() ?></span></p>
            <p>Nombre: <span><?php echo $mascota[0]->getNombreMascota() ?></span></p>

            <form action="" method="POST">
                <input type="hidden" name="idMascota" value="<?php echo $idMascota;?>">
                <a href="?veterinario=adminMascotas" class="btn_cancelar">Cancelar</a>
                <input type="submit" value="Aceptar" class="btn_ok">
            </form>
        </div>

    </section>

</body>

</html>