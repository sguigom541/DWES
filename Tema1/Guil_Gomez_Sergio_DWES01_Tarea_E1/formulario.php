<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <?php
        require_once 'cabecera.php';
        
    ?>
    <link rel="stylesheet" href="estilos/estilos.css">
</head>
<body>
    <?php
          include 'funciones.inc.php';
          foreach ($G as $key ) {
               # code...
          }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" name="formulario" method="get">

          <div class="fieldset">
               <fieldset>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" placeholder="Escriba su nombre" value="<?php if (isset ($_GET['nombre'])) echo $_GET['nombre'];?>"/>
                    <?php
                    
                    if (isset($_GET['enviar']) && empty($_GET['nombre']))
                    {
                         echo "<span style='color:red'> &lt;-- Debe introducir un nombre!!</span>";
                    }
                    else if(isset($_GET['enviar']) && !validarnombre($_GET['nombre']))
                    {
                         echo "<span style='color:red'> &lt;-- Debe introducir un nombre correcto!!</span>";
                    }
                         
                    
                    ?><br/>

                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" placeholder="Escriba sus apellidos" value="<?php if (isset ($_GET['apellidos'])) echo $_GET['apellidos'];?>"/>
                    <?php
                    if (isset($_GET['enviar']) && empty($_GET['apellidos']))
                    {
                         echo "<span style='color:red'> &lt;-- Debe introducir los apellidos!!</span>";
                    }
                    else if(isset($_GET['enviar']) && !validarnombre($_GET['nombre'])) // se usa la función validarnombre() y si no concuerda con el filtro se muestra un error
                    {
                         echo "<span style='color:red'> &lt;-- Debe introducir los apellidos correctamente!!</span>";
                    }
                         
                    
                    ?><br/>

                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Introduzca su email" value="<?php if (isset ($_GET['email'])) echo $_GET['email'];?>"/>
                    <?php
                    if (isset($_GET['enviar']) && empty($_GET['email']))
                    {
                         echo "<span style='color:red'> &lt;-- Debe introducir un email por favor!!</span>";
                    }
                    else if(isset($_GET['enviar']) && !emailvalido($_GET['email']))   
                    {
                         echo "<span style='color:red'> &lt;-- Debe introducir un formato de email correcto por favor!!</span>";
                    } 

                    ?><br/>

                    <label for="telefono">Teléfono</label>
                    <input type="text" name="telefono" placeholder="Introduzca teléfono de contacto" value="<?php if (isset ($_GET['telefono'])) echo $_GET['telefono'];?>"/>
                    <?php
                    if (isset($_GET['enviar']) && empty($_GET['telefono']))
                    {
                         echo "<span style='color:red'> &lt;-- Debe introducir un email por favor!!</span>";
                    }
                    else if(isset($_GET['enviar']) && !validartelefono($_GET['telefono']))   
                    {
                         echo "<span style='color:red'> &lt;-- Debe introducir un formato de teléfono correcto por favor!!</span>";
                    } 

                    ?><br/>

                    <label for="webPreferida">Web Preferida</label>
                    <input type="text" name="webPreferida" placeholder="Introduzca su web preferida" value="<?php if (isset ($_GET['webPreferida'])) echo $_GET['webPreferida'];?>">
                    <?php
                    if (isset($_GET['enviar']) && empty($_GET['webPreferida']))
                    {
                         echo "<span style='color:red'> &lt;-- Debe introducir un email por favor!!</span>";
                    }
                    else if(isset($_GET['enviar']) && !validaURL($_GET['webPreferida']))   
                    {
                         echo "<span style='color:red'> &lt;-- Debe introducir un formato de URL correcta por favor!!</span>";
                    } 

                    ?><br/>

                    <label for="fechaNac">Fecha de nacimiento</label>
                    <input type="date" name="fechaNac" value="<?php if (isset ($_GET['fechaNac'])) echo $_GET['fechaNac'];?>"/>
                    <?php
                    if (isset($_GET['enviar']) && empty($_GET['fechaNac']))
                    {
                         echo "<span style='color:red'> &lt;-- Debe introducir una fecha de nacimiento por favor!!</span>";
                    }
                    

                    ?><br/>

                    <label for="lugNac">Lugar de nacimiento</label>
                    <input type="text" name="lugNac" placeholder="Introduzca su lugar de nacimiento" value="<?php if (isset ($_GET['lugNac'])) echo $_GET['lugNac'];?>"/>
                    <?php
                    if (isset($_GET['enviar']) && empty($_GET['lugNac']))
                         echo "<span style='color:red'> &lt;-- Debe introducir un lugar de nacimiento!!</span>"
               ?><br/>
               </fieldset>

               <fieldset>
                    <legend>Elija un sexo</legend>
                    <input type="radio" name="sexo" value="hombre" 
                    <?php 
                    if(isset($_GET['sexo']) && $_GET['sexo']=="hombre")
                    { 
                         echo 'checked="checked"';

                    } 
                    ?>
                    />
                    <label for="hombre">Hombre</label>

                    <input type="radio" name="sexo" value="mujer" 
                    <?php 
                    if(isset($_GET['sexo']) && $_GET['sexo']=="mujer")
                    { 
                         echo 'checked="checked"';

                    } 
                    ?>/>
                    <label for="mujer">Mujer</label>
               </fieldset>

               <fieldset>
                    <legend>Módulos de 1ºDAW</legend>
                    
                    <?php
                    if (isset($_GET['enviar']) && empty($_GET['modulos']))
                         echo "<span style='color:red'> &lt;-- Debe escoger al menos uno!!</span>" //si no se ha seleccionado ningún módulo salta un error
                    ?>
                    <input type="checkbox" name="modulos[]" value="PROG" <?php
                         if(isset($_GET['modulos']) && in_array("PROG",$_GET['modulos']))
                              echo 'checked="checked"'; //si dentro del array módulos[] existe dwes automáticamente el checkbox se selecciona
                    ?>/>
                    <label for="prog">Programación</label>

                    <input type="checkbox" name="modulos[]" value="BD" <?php
                         if(isset($_GET['modulos']) && in_array("BD",$_GET['modulos']))
                              echo 'checked="checked"';
                    ?>/>
                    <label for="bd">Bases de datos</label>

                    <input type="checkbox" name="modulos[]" value="LMSGI"
                    <?php
                         if(isset($_GET['modulos']) && in_array("LMSGI",$_GET['modulos']))
                              echo 'checked="checked"';
                    ?>/>
                    <label for="lmsgi">Lenguaje de Marcas</label>

                    <input type="checkbox" name="modulos[]" value="ENDES"
                    <?php
                         if(isset($_GET['modulos']) && in_array("ENDES",$_GET['modulos']))
                              echo 'checked="checked"';
                    ?>/>
                    <label for="endes">Entornos de Desarrollo</label>

               </fieldset>

               <fieldset>
                    <legend>Módulos de 2ºDAW</legend>
                    <?php
                    if (isset($_GET['enviar']) && empty($_GET['modulos2']))
                         echo "<span style='color:red'> &lt;-- Debe escoger al menos uno!!</span>" //si no se ha seleccionado ningún módulo salta un error
                    ?>
                    <input type="checkbox" name="modulos2[]" value="DAWEB"
                    <?php
                         if(isset($_GET['modulos2']) && in_array("DAWEB",$_GET['modulos2']))
                              echo 'checked="checked"';
                    ?>/>
                    <label for="daweb">Despliegue De Aplicaciones Web</label>

                    <input type="checkbox" name="modulos2[]" value="DWEC"
                    <?php
                         if(isset($_GET['modulos2']) && in_array("DWEC",$_GET['modulos2']))
                              echo 'checked="checked"';
                    ?>/>
                    <label for="dwec">Desarrollo Web en Entorno Cliente</label>

                    <input type="checkbox" name="modulos2[]" value="DWES"
                    <?php
                         if(isset($_GET['modulos2']) && in_array("DWES",$_GET['modulos2']))
                              echo 'checked="checked"';
                    ?>/>
                    <label for="dwes">Desarrollo Web en Entorno Servidor</label>

                    <input type="checkbox"name="modulos2[]" value="DIWEB"
                    <?php
                         if(isset($_GET['modulos2']) && in_array("DIWEB",$_GET['modulos2']))
                              echo 'checked="checked"';
                    ?>/>
                    <label for="diweb">Diseño de Interfaces Web</label>

               </fieldset>

               <fieldset>
                    <legend> Conocimientos previos</legend>
                    <label for="html">HTML</label>
                    <input type="range" name="html" min="1" max="10" value="<?php if (isset ($_GET['html'])) echo $_GET['html'];?>"/><br/>

                    <label for="mysql">MySQL</label>
                    <input type="range" name="mysql" min="1" max="10" value="<?php if (isset ($_GET['mysql'])) echo $_GET['mysql'];?>"/><br/>

                    <label for="ingles">Inglés</label>
                    <input type="range" name="ingles" min="1" max="10" value="<?php if (isset ($_GET['ingles'])) echo $_GET['ingles'];?>"/><br/>

                    <label for="php">PHP</label>
                    <input type="range" name="php" min="1" max="10" value="<?php if (isset ($_GET['php'])) echo $_GET['php'];?>"/><br/>

                    <label for="javascript">JavaScript</label>
                    <input type="range" name="javascript" min="1" max="10" value="<?php if (isset ($_GET['javascript'])) echo $_GET['javascript'];?>"/><br/>

                    <label for="experiencia">Experiencia en programación web </label><br/>
                    <textarea name="experiencia"  cols="30" rows="10" maxlength="300" placeholder="describa su experiencia en programación web" ><?php if (isset ($_GET['experiencia'])) echo $_GET['experiencia'];?></textarea>
                    <?php
                    if (isset($_GET['enviar']) && empty($_GET['experiencia']))
                         echo "<span style='color:red'> &lt;-- Debe decir su experiencia!!</span>" //si no se ha seleccionado ningún módulo salta un error
                    ?><br/>
                    
               </fieldset>

               <fieldset>
                    <label for="sueldo">Sueldo</label>
                    <input type="text" name="sueldo" step="0.01" min="0" value="<?php if (isset ($_GET['sueldo'])) echo $_GET['sueldo'];?>">
                    <?php
                    if (isset($_GET['enviar']) && empty($_GET['sueldo']))
                    {
                         echo "<span style='color:red'> &lt;-- Debe introducir un sueldo!!</span>";
                    }
                    else if(isset($_GET['enviar']) && !validasueldo($_GET['sueldo']))
                    {
                         echo "<span style='color:red'> &lt;-- Debe introducir un sueldo válido con dos decimales máximo!!</span>";
                    }
                    ?><br/>
                    
                    <label for="sueldoEsperado">Sueldo Esperado</label>
                    <input type="text" name="sueldoesperado" step="0.01" min="0" value="<?php if (isset ($_GET['sueldoesperado'])) echo $_GET['sueldoesperado'];?>">
                    <?php
                    if (isset($_GET['enviar']) && empty($_GET['sueldoesperado']))
                    {
                         echo "<span style='color:red'> &lt;-- Debe introducir un sueldo!!</span>";
                    }
                    else if(isset($_GET['enviar']) && !validasueldo($_GET['sueldoesperado']))
                    {
                         echo "<span style='color:red'> &lt;-- Debe introducir un sueldo válido con dos decimales máximo!!</span>";
                    }
                    ?><br/>
               </fieldset>
               
               <input type="submit" name="enviar" value="enviar datos"/>

               <input type="reset" value="Limpiar"/>
          </div>  
    </form>

    
    <?php
    require_once "funciones.inc.php";
     if (!empty($_GET['nombre']) && !empty($_GET['apellidos']) && !empty($_GET['email']) && !empty($_GET['telefono']) && !empty($_GET['webPreferida']) &&
          !empty($_GET['webPreferida']) && !empty($_GET['fechaNac']) && !empty($_GET['lugNac']) && validarnombre($_GET['nombre']) && emailvalido($_GET['email'])  
          && validartelefono($_GET['telefono']) && validaURL($_GET['webPreferida']) &&  validasueldo($_GET['sueldo']) && validasueldo($_GET['sueldoesperado']) && isset($_GET['enviar'])) 
     {
          $nombre = $_GET['nombre'];
          $apellidos = quitarEspacios($_GET['apellidos']);
          $email= $_GET['email'];
          $telefono= $_GET['telefono'];
          $webPrefe=$_GET['webPreferida'];
          $anio= devuelveEdad($_GET['fechaNac']);
          $lugNac=htmlspecialchars($_GET['lugNac']);
          $conocimientoHTML= $_GET['html'];
          $conocimientoMySQL= $_GET['mysql'];
          $conocimientoIngles= $_GET['ingles'];
          
          if(empty($_GET['modulos2']))
          {
               $modulosFaltantes=null;
          }
          else{
               $modulosFaltantes=$_GET['modulos2'];
          }
          $conocimientoPHP= $_GET['php'];
          $conocimientoJavaScript= $_GET['javascript'];
          $experiencia= $_GET['experiencia'];
          $sueldo= $_GET['sueldo'];
          $sueldoEsperado= $_GET['sueldoesperado'];

          print "$nombre es";
          if(isset($GET_['sexo']) && $GET_['sexo']=="hombre")
          {
               echo "un hombre";
          }
          if(isset($_GET['sexo']) && $_GET['sexo']=="mujer")
          {
               echo " una mujer";
          }
          
          print " natural de $lugNac, con $anio años al que le gusta navegar en la web $webPrefe".","."<br/>";


          print "ha aprobado todos los módulos de 1º pero le quedan ";
          if (!empty($modulosFaltantes))
          {
               foreach ($modulosFaltantes as $modulo) 
               {
                    print $modulo.",";
               }
          }
          print "de 2º";
          print "Tiene unos conocimientos notables de ";
          if ($conocimientoHTML>6)
          {
          echo $conocimientoHTML="HTML".",";
          }
          if($conocimientoMySQL>6)
          {
          echo $conocimientoMySQL="MySQL".",";
          }
          if($conocimientoIngles>6)
          {
               echo $conocimientoIngles="INGLES".",";
          }
          if($conocimientoPHP>6)
          {
               echo $conocimientoPHP="PHP".",";
          }
          if($conocimientoJavaScript>6)
          {
               echo $conocimientoJavaScript="JavaScript".",";
          }
     
          
          print " y una experiencia laboral en $experiencia"."<br/>";
          print "su sueldo actual es $sueldo pero le gustaría llegar a cobrar $sueldoEsperado";
     }
    ?>
    <?php
          require_once 'pie.php';
    ?>
     