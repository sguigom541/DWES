<?php
class Usuario
{
    private $codUsuario;
    private $pass;
    private $dni;
    private $nombre;
    private $ape1;
    private $ape2;
    private $fechaNac;
    private $telefono;
    private $email;
    private $imagenUsuario;
    private $codRol;

    /**
     * @return String retorna el código del usuario
     */
    public function getCodUsuario(){
        return $this->codUsuario;
    }
    /**
     * @param $newCodUsuario establece el código del usuario
     */
    public function setCodUsuario($newCodUsuario){
        $this->codUsuario=$newCodUsuario;
    }

    /**
     * @return String retorna la contraseña del usuario
     */
    public function getPass(){
        return $this->pass;
    }
    /**
     * @param $newPass establece la contraseña del usuario
     */
    public function setPass($newPass){
        $this->pass=$newPass;
    }

    /**
     * @return String retorna el dni del usuario
     */
    public function getDni(){
        return $this->dni;
    }
    /**
     * @param $newDni establece el dni del usuario
     */
    public function setDni($newDni){
        $this->dni=$newDni;
    }

    /**
     * @return String retorna el nombre del usuario
     */
    public function getNombre(){
        return $this->nombre;
    }
    /**
     * @param $newNombre establece el nombre del usuario
     */
    public function setNombre($newNombre){
        $this->nombre=$newNombre;
    }

    /**
     * @return String retorna el primer apellido del usuario
     */
    public function getApe1(){
        return $this->ape1;
    }
    /**
     * @param $newApe1 establece el primer apellido del usuario
     */
    public function setApe1($newApe1){
        $this->codUsuario=$newApe1;
    }

    /**
     * @return String retorna el segundo apellido del usuario
     */
    public function getApe2(){
        return $this->ape2;
    }
    /**
     * @param $newApe2 establece el segundo apellido del usuario
     */
    public function setApe2($newApe2){
        $this->ape2=$newApe2;
    }

    /**
     * @return Date retorna la fecha de nacimiento del usuario
     */
    public function getFechaNacimiento(){
        return $this->fechaNac;
    }
    /**
     * @param $newFechaNac establece la fecha de nacimiento del usuario
     */
    public function setFechaNacimiento($newFechaNac){
        $this->fechaNac=$newFechaNac;
    }

    /**
     * @return String retorna el teléfono del usuario
     */
    public function getTelefono(){
        return $this->telefono;
    }
    /**
     * @param $newTelefono establece el teléfono del usuario
     */
    public function setTelefono($newTelefono){
        $this->telefono=$newTelefono;
    }

    /**
     * @return String retorna el email del usuario
     */
    public function getEmail(){
        return $this->email;
    }
    /**
     * @param $newEmail establece el email del usuario
     */
    public function setEmail($newEmail){
        $this->email=$newEmail;
    }

    /**
     * @return String retorna el la url donde se encuentra ubicada la imagen del usuario
     */
    public function getImgUsuario(){
        return $this->imagenUsuario;
    }
    /**
     * @param $newImgUsuario establece la url donde se encuentra ubicada la imagen del usuario
     */
    public function setImgUsuario($newImgUsuario){
        $this->imagenUsuario=$newImgUsuario;
    }

    /**
     * @return String retorna el código del rol al que pertenece el usuario
     */
    public function getCodigoRol(){
        return $this->codRol;
    }
    /**
     * @param $newCodigoRol establece el código del rol al que pertenece el usuario
     */
    public function setCodigoRol($newCodigoRol){
        $this->codRol=$newCodigoRol;
    }
}
?>