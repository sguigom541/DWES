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
    private static function ExisteUsuario(string $usuario,string $contrasena=null)
    {
        $gbd=new GBD("localhost","sggveterinaria","root","");
        $personas=$gbd->getAll("usuario");
        $decrypt=Funcion::encrypt($contrasena);

        for ($i=0;$i<count($personas);$i++)
        {
            if($personas[$i]->getCodUsuario()==$usuario && is_null($contrasena)?true:$personas[$i]->getPass()==$decrypt )
            {
                return true;
            }
        }
        return false;
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