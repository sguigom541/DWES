<?php
class Login
{

    public static function Identifica(string $usuario,string $contrasena)
    {
        if(self::ExisteUsuario($usuario,$contrasena)){
            Sesion::iniciar();
            Sesion::escribir('usuario',$usuario);
            Sesion::escribir('pass',$contrasena);
            return true;
        
        }
        return false;
    }

    /**
     * Método que busca la existencia del usuario en la bd
     */
    private static function ExisteUsuario(string $codUsuario,string $contrasena=null)
    {
        $gbd=new GBD("localhost","sggveterinaria","root","");
       // $personas=$gbd->getAll("usuario");
        $decrypt=Funcion::encrypt($contrasena);
        $usuario=$gbd->findByOne("usuario",["codUsuario"=>$codUsuario]);
        $valido=false;
        if($usuario!=null)
        {
            if($usuario[0]->getCodUsuario()==$codUsuario && $usuario[0]->getPass()==$decrypt ){
               $valido=true;
            }
            else{
                $valido=false;
            }

        }

        return $valido;









        /*if(!is_null($usuario[0]->getCodUsuario() && !is_null($usuario[0]->getPass())))
        for ($i=0;$i<count($personas);$i++)
        {
            if($personas[$i]->getCodUsuario()==$usuario && (is_null($contrasena)?true:$personas[$i]->getPass()==$decrypt) )
            {
                return true;
            }
        }
        return false;*/
    }

    public static function UsuarioEstaLogueado(string $usuario,string $contrasena)
    {
        $existe=false;
        if(Sesion::existe($usuario) && Sesion::existe($contrasena))
        {
            $existe= true;
        }
        else{
            $existe=false;
        }
        return $existe;
    }
}