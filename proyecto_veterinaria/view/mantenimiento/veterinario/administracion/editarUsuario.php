<?php
$a = new GBD("localhost", "sggveterinaria", "root", "");
//validamos el registro
$valida = new Validacion();
if (isset($_POST['actualizar'])) {
    $valida->Requerido('username');
    $valida->Requerido('nombre');
    $valida->Requerido('ape1');
    $valida->Requerido('ape2');
    $valida->Requerido('fechaNac');
    $valida->Requerido('telefono');
    $valida->Email('email');
    if ($valida->ValidacionPasada()) {

        //comprobamos que no exista un codUsuario o correo en el sistema
        $array = $a->comprobacionUsuarioUpdate("usuario",$_POST['nombre'], $_POST['username'], $_POST['email']);
        if ($array == null) {
            $a->update("usuario",["codUsuario" => $_POST['username'], "nombre" => $_POST['nombre'],"ape1" => $_POST['ape1'],"ape2" => $_POST['ape2'], 
            "fechaNac" => $_POST['fechaNac'], "telefono" => $_POST['telefono'], "email" => $_POST['email']],[$_POST['codUsuarioComprobado']]);
            header('location:?veterinario=adminUsuarios');
        }
    }
}

//mostramos los datos al usuario
if(empty($_GET['idUsuario']))
{
    header('location:?veterinario=adminUsuarios');
}
$idUsuario=$_GET['idUsuario'];
$existe=$a->existeUsuario($idUsuario);
if($existe==true){
    $objetoUsuario=$a->findByOne("usuario",["codUsuario"=>$idUsuario]);
    $codUsuario=$objetoUsuario[0]->getCodUsuario();
    $nombre=$objetoUsuario[0]->getNombre();
    $ape1=$objetoUsuario[0]->getApe1();
    $ape2=$objetoUsuario[0]->getApe2();
    $fechaNac=$objetoUsuario[0]->getFechaNacimiento();
    $telefono=$objetoUsuario[0]->getTelefono();
    $email=$objetoUsuario[0]->getEmail();
}
else{
    header('location:?veterinario=adminUsuarios');
    
}
?>

<div class="form_register">
    <h1>Editando Usuario</h1>
    <hr>

    <form action="" method="POST">
        <input type="hidden" name="codUsuarioComprobado" value="<?php echo $idUsuario?>">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="username" value="<?php echo $codUsuario?>">
        <p><?php echo $valida->ImprimirError("username") ?></p>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" placeholder="nombre" value="<?php echo $nombre?>">
        <p><?php echo $valida->ImprimirError("nombre") ?></p>
        <label for="ape1">Apellido 1</label>
        <input type="text" name="ape1" id="ape1" placeholder="apellido 1" value="<?php echo $ape1?>">
        <p><?php echo $valida->ImprimirError("ape1") ?></p>
        <label for="ape2">Apellido 2</label>
        <input type="text" name="ape2" id="ape2" placeholder="apellido 2" value="<?php echo $ape2?>">
        <p><?php echo $valida->ImprimirError("ape2") ?></p>
        <label for="fechaNac">F.Nacimiento</label>
        <input type="date" name="fechaNac" id="fechaNac" value="<?php echo $fechaNac?>">
        <p><?php echo $valida->ImprimirError("fechaNac") ?></p>
        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" id="telefono" placeholder="example:676353532" value="<?php echo $telefono?>">
        <p> <?php echo $valida->ImprimirError("telefono") ?></p>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="example@example.com" value="<?php echo $email?>">
        <p><?php echo $valida->ImprimirError("email") ?></p>
        <input type="submit" value="Actualizar Usuario" name="actualizar" class="btn_save">
    </form>
</div>