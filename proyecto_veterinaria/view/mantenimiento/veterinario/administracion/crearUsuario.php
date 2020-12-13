<?php
$a = new GBD("localhost", "sggveterinaria", "root", "");

//validamos el registro
$valida = new Validacion();
if (isset($_POST['enviar'])) {
    $valida->Requerido('username');
    $valida->Requerido('password');
    $valida->Dni('dni');
    $valida->Requerido('nombre');
    $valida->Requerido('ape1');
    $valida->Requerido('ape2');
    $valida->Requerido('fechaNac');
    $valida->Requerido('telefono');
    $valida->Email('email');
    if ($valida->ValidacionPasada()) {

        //comprobamos que no exista un codUsuario o correo en el sistema
        $array = $a->comprobacionUsuario("usuario", $_POST['username'], $_POST['email']);
        if ($array == null) {
            $a->add("usuario", [
                "codUsuario" => $_POST['username'], "pass" => md5($_POST['password']), "dni" => $_POST['dni'], "nombre" => $_POST['nombre'],
                "ape1" => $_POST['ape1'], "ape2" => $_POST['ape2'], "fechaNac" => $_POST['fechaNac'], "telefono" => $_POST['telefono'], "email" => $_POST['email'], "imagenUsuario" => "", "codRol" => $_POST['rol']
            ]);
            header('location:?veterinario=adminUsuarios');
        }
    }
}

?>

<div class="form_register">
    <h1>Registro Usuario</h1>
    <hr>

    <form action="" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="username">
        <p><?php echo $valida->ImprimirError("username") ?></p>
        <label for="password">Contraseña</label>
        <input type="text" name="password" id="password" placeholder="password">
        <p><?php echo $valida->ImprimirError("password") ?></p>
        <label for="dni">dni</label>
        <input type="text" name="dni" id="dni" placeholder="dni">
        <p><?php echo $valida->ImprimirError("dni") ?></p>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" placeholder="nombre">
        <p><?php echo $valida->ImprimirError("nombre") ?></p>
        <label for="ape1">Apellido 1</label>
        <input type="text" name="ape1" id="ape1" placeholder="apellido 1">
        <p><?php echo $valida->ImprimirError("ape1") ?></p>
        <label for="ape2">Apellido 2</label>
        <input type="text" name="ape2" id="ape2" placeholder="apellido 2">
        <p><?php echo $valida->ImprimirError("ape2") ?></p>
        <label for="fechaNac">F.Nacimiento</label>
        <input type="date" name="fechaNac" id="fechaNac">
        <p><?php echo $valida->ImprimirError("fechaNac") ?></p>
        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" id="telefono" placeholder="example:676353532">
        <p> <?php echo $valida->ImprimirError("telefono") ?></p>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="example@example.com">
        <p><?php echo $valida->ImprimirError("email") ?></p>
        <label for="rol">Tipo Usuario</label>
        <select name="rol" id="rol">
            <?php
            $arrayRol = $a->getAll("rol");
            foreach ($arrayRol as $clave) {
                echo '<option  value="'.$clave->getCodRol().'">'.$clave->getNombre().'</option>';
            }
            ?>
        </select>
        <input type="submit" value="Crear Usuario" name="enviar" class="btn_save">
    </form>
</div>