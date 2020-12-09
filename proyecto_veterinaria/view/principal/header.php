<?php
$gbd = new GBD("localhost", "sggveterinaria", "root", "");
$empresa = $gbd->getAll("empresa");
Sesion::iniciar();
$sesion = Sesion::leer('login');
?>

<header>
    <link rel="stylesheet" href="./css/estilosCabecera.css">
    <div class="index-header">
        <div class="contenedor-logo">
            <img id="logo-header" src="./imagenes/logoVeterinaria.jpg" alt="" srcset=""/>
        </div>
        <div class="contenedor-titulo-index">
            <h1><?php echo $empresa[0]->getNombre(); ?></h1>
        </div>
        
    </div>
    <?php
        echo '<div class="datos-login">';
        echo '<div class="nombreUsuario">';
        if ($sesion != null) {
            $arrayClavePersona = [$sesion];
            $cliente = $gbd->findById("usuario", $arrayClavePersona);
            echo '<p>' . $cliente[0]->getNombre() . ', ' . $cliente[0]->getApe1() . ', ' . $cliente[0]->getApe2();
            echo '<img src="' . $cliente[0]->getImgUsuario() . '" alt="Foto del usuario"/>';
        }
        echo '</div>';
        echo '<div class="sesionUsuario">';
        if ($sesion != null) {
            $arrayClaveRol = [$cliente[0]->getCodigoRol()];
            $rol = $gbd->findById("rol", $arrayClaveRol);
            echo '<p> Rol: ' . $rol[0]->getNombre() . '</p>';

            echo '<a href="?acceso=logout">Cerrar Sesion</a>';
        } else if (!(isset($_GET['acceso']) == "login") || isset($_GET['menu']) == "inicio") {
            echo '<a href="?acceso=login">Iniciar Sesion';
        }
        echo '</div>';
        ?>
</header>
