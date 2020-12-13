<?php
$gbd = new GBD("localhost", "sggveterinaria", "root", "");
$empresa = $gbd->getAll("empresa");
Sesion::iniciar();
$usuario = Sesion::leer('usuario');

?>

<header>
    <div class="header">
        <h1><?php echo $empresa[0]->getNombre(); ?></h1>
        <?php
            echo '<div class="optionsBar">';
                if($usuario!=null){
                    echo '<span>';
                    $arraypersona=[$usuario];
                    $rol=$gbd->findById("usuario",$arraypersona);
                    if($rol[0]->getCodigoRol()!=1){
                        echo '<span>Rol:admin</span>';
                    }
                    else{
                        echo '<span>Rol:usuario</span>';
                    }
                    echo '</span>';
                }
                if($usuario!=null){
                    echo '<span>|</span>';
                }
                echo '<span class="user">';
                    if($usuario!=null){
                        $arrayClavePersona=[$usuario];
                        $cliente=$gbd->findById("usuario",$arrayClavePersona);
                        echo $cliente[0]->getNombre() . ',' .$cliente[0]->getApe1() . ', '. $cliente[0]->getApe2();
                    }
                echo '</span>';
                    if($usuario!=null){
                        $arrayClavePersona=[$usuario];
                        $cliente=$gbd->findById("usuario",$arrayClavePersona);
                        echo '<img class="photouser" src="' . $cliente[0]->getImgUsuario() . '" alt="Foto del usuario"/>';
                    }
                  if($usuario!=null){
                      echo '<a href="?acceso=logout"><img class="close" src="./img/imgWeb/salir.png"></a>';
                  }else if(!(isset($_GET['acceso']) == "login") || isset($_GET['menu']) == "inicio"){
                    echo '<a href="?acceso=login"><img class="close" src="./img/imgWeb/entrar.png"></a>' ;
                  }
            echo '</div>';
        ?>   
    </div>
</header>