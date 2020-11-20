<?php
    function crearExamen($Array)
    {
        
        foreach ($Array as $clave => $valor) 
        {
            echo "<div id=". $valor->ordenPregunta ." class='pregunta'>";
                echo '<h4>' .$valor->ordenPregunta.'.- '.$valor->enunciado.'</h4>';
                echo '<ul>';    
                    echo '<li><input type="radio" name="respuesta'.$valor->ordenPregunta.'" value="'.$valor->respuesta1[0].'"/><label for="radio">'.$valor->respuesta1.'</label></li>';
                    echo '<li><input type="radio" name="respuesta'.$valor->ordenPregunta.'" value="'.$valor->respuesta2[0].'"/><label for="radio">'.$valor->respuesta2.'</label></li>';
                    echo '<li><input type="radio" name="respuesta'.$valor->ordenPregunta.'" value="'.$valor->respuesta3[0].'"/><label for="radio">'.$valor->respuesta3.'</label></li>';
                    echo '<li><input type="radio" name="respuesta'.$valor->ordenPregunta.'" value="'.$valor->respuesta4[0].'"/><label for="radio">'.$valor->respuesta4.'</label></li>';
                echo '</ul>';
            echo "</div>";
        }
    }

    

?>