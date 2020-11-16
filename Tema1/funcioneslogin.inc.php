<?php


    function usuariovalido($usuario,$password)
    {
        // se declara el array
        $usuarios =array(
            "marina"=>"1234",
            "manuel"=> "0000",
            "marcos"=>"1111"
            
        );

        //recorremos el array 
        if($usuario !="" && $password !="")
        {
            foreach ($usuarios as $key => $contrasenias) 
            {
                if($usuario == $key && $password == $contrasenias)
                {

                    print "Bienvenid@ ".$usuario; 
                }
                
            }
        }
        else 
        {
            print "Error, no se ha encontrado ningún usuari@";
        }
        //también puede usarse con array_search
        /*
        if($usuario == array_search($password,$usuarios))
        {
            print "Bienvenid@ ".$usuario;
        }
        else
        {
            print "no se ha encontrado ningún usuario con esas credenciales";
        }
        */
    }