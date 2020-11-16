<?php

    function abrirconexion($ip,$usuario,$contrasenia,$bd)
    {
        $conexion=new mysqli($ip,$usuario,$contrasenia,$bd);

        $error = $conexion->connect_errno;

        if ($error != null) 
        {
           echo "<p>Error $error conectando a la base de datos: $conexion->connect_error</p>"; 
            exit();
        }
        else
        {
            return $conexion;
        }
        

       
        
    }


    function comprobarusuario2($usuario,$password,$conex)
    {
        //abrimos la conexion con el servidor
        $consulta=$conex->stmt_init();
        $sqlquery=("SELECT user, pass FROM users WHERE user=$usuario and pass=md5($password) ");
        $consulta->prepare($sqlquery);
        $consulta->execute();
       
        while($consulta->fetch()) 
        {
            
            if($consulta->affected_rows==1)
            {
                return true;
            }
            
        }

        $consulta->close();
        
        
    }

    
    function cerrarconexion($conex)
    {
        $conex->close();
    }

    function comprobarusuario($usuarioBuscar, $passwordBuscar,$conex)
    {
        

        //Creamos la conexión con la función de conectar y le damos formato de datos utf8
        $conexion =$conex;

        //Inicia la busqueda
        $consulta = $conexion->stmt_init();

        //Escribo la consulta SQL
        $sql = 'SELECT * FROM users WHERE user = ?;';

        //Preparar la consulta en el servidor MySQL
        $consulta->prepare($sql);
        $consulta->bind_param('s', $usuarioBuscar);

        //Ejecutar la consulta
        $consulta->execute();

        //Obtenemos el resultado de la consulta
        $resultado = $consulta->get_result();

        //Hacemos que el cursor apunte a la primera linea
        $acceso = $resultado->fetch_object();

        //Obtenemos los valores de la linea
        $user = $acceso -> user;
        $passwd = $acceso -> pass;

        $existeUser = false;
        //Comparamos los valores escritos con los de la base de datos
        if($user === $usuarioBuscar && $passwd ===  $passwordBuscar)
        {
            $existeUser = true;
        }

        return $existeUser;        
    }

    function telefonosUsuario($usuarioTelefono,$conex)
    {
       
        require "conexion.php";
        //Creamos la conexión con la función de conectar y le damos formato de datos utf8
        $conexion = connectDB();

        //Inicia la busqueda
        $consulta = $conexion->stmt_init();

        //Escribo la consulta SQL
        $sql = 'SELECT * FROM telefonos WHERE usuario = ?;';
        $consulta->prepare($sql);
    
        $consulta->bind_param('s', $usuarioTelefono);
    
        $consulta->execute();
        $consulta->bind_result($telefono, $usuario);

        $arraytelefonos=null;

        while($consulta->fetch())
        {
            $arraytelefonos[]=array($telefono, $usuario);
        }
        return $arraytelefonos;        
    }