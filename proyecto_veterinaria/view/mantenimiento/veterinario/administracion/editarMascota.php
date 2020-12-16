<?php
$a = new GBD("localhost", "sggveterinaria", "root", "");
//validamos el registro
$valida = new Validacion();
if (isset($_POST['actualizar'])) {
    $valida->Requerido('codMascota');
    $valida->Requerido('nombre');
    $valida->Requerido('fechaNac');
    if ($valida->ValidacionPasada()) {

        //comprobamos que no exista un codUsuario o correo en el sistema
        $array = $a->comprobacionMascotaUpdate("mascota",$_POST['nombre'], $_POST['codMascota']);
        if ($array == null) {
            $a->update("mascota",["codMascota" => $_POST['codMascota'], "nombreMascota" => $_POST['nombre'], 
            "fechaNac" => $_POST['fechaNac']],[$_POST['codMascotaComprobada']]);
            header('location:?veterinario=adminMascotas');
        }
    }
}


//mostramos los datos de la mascota
if(empty($_GET['idMascota']))
{
    header('location:?veterinario=adminMascotas');
}
$idMascota=$_GET['idMascota'];
$existe=$a->existeMascota($idMascota);
if($existe==true){
    $objetoMascota=$a->findByOne("mascota",["codMascota"=>$idMascota]);
    $codMascota=$objetoMascota[0]->getCodMascota();
    $nombre=$objetoMascota[0]->getNombreMascota();
    $fechaNac=$objetoMascota[0]->getFechaNac();
}
else{
    header('location:?veterinario=adminMascotas');
    
}
?>





?>


<div class="form_register">
    <h1>Editando Mascota</h1>
    <hr>

    <form action="" method="POST">
        <input type="hidden" name="codMascotaComprobada" value="<?php echo $idMascota?>">
        <label for="codMascota">Cod Mascota</label>
        <input type="text" name="codMascota" id="codMascota" placeholder="cod mascota" value="<?php echo $codMascota?>">
        <p><?php echo $valida->ImprimirError("codMascota") ?></p>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" placeholder="nombre" value="<?php echo $nombre?>">
        <p><?php echo $valida->ImprimirError("nombre") ?></p>
        <label for="fechaNac">F.Nacimiento</label>
        <input type="date" name="fechaNac" id="fechaNac" value="<?php echo $fechaNac?>">
        <p><?php echo $valida->ImprimirError("fechaNac") ?></p>
        <input type="submit" value="Actualizar Mascota" name="actualizar" class="btn_save">
    </form>
</div>