<?php
    $a = new GBD("localhost", "sggveterinaria", "root", "");

    $cliente=Sesion::leer("usuario");
    $objetoUsuario=$a->findByOne("usuario",["codUsuario"=>$cliente]);
    $codUsuario=$objetoUsuario[0]->getCodUsuario();
    $nombre=$objetoUsuario[0]->getNombre();
    $ape1=$objetoUsuario[0]->getApe1();
    $ape2=$objetoUsuario[0]->getApe2();
    $fechaNac=$objetoUsuario[0]->getFechaNacimiento();
    $telefono=$objetoUsuario[0]->getTelefono();
    $email=$objetoUsuario[0]->getEmail();

?>







<div class="datospersonales">
    <h1>Datos Personales</h1>
    <hr>

    <form action="" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo $codUsuario?>" disabled>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" placeholder="nombre" value="<?php echo $nombre?>" disabled>
        <label for="ape1">Apellido 1</label>
        <input type="text" name="ape1" id="ape1" placeholder="apellido 1" value="<?php echo $ape1?>" disabled>
        <label for="ape2">Apellido 2</label>
        <input type="text" name="ape2" id="ape2" placeholder="apellido 2" value="<?php echo $ape2?>" disabled>
        <label for="fechaNac">F.Nacimiento</label>
        <input type="date" name="fechaNac" id="fechaNac" value="<?php echo $fechaNac?>" disabled>
        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" id="telefono" placeholder="example:676353532" value="<?php echo $telefono?>" disabled>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="example@example.com" value="<?php echo $email?>" disabled>
    </form>
</div>