<?php
/**
 * función que lee la conexión de un archivo xml donde se encuentra la bd
 */
function recibeConexion()
{
    $dom = new DOMDocument; //crea objeto
    $dom->load('../control/conexion.xml'); //carga el xml
    if (@!$dom->validate()) { //comprueba si es valido
        echo "¡Este documento es inválido!\n";
        exit(0); //para la ejecucion de php
    }

    $array = explode("\n", $dom->textContent); //pasa a array la string de xml
    $datos = [];
    foreach ($array as $item) {
        if ($item != "") { //elimino los campos vacíos
            array_push($datos, trim($item)); //los añado a otro array y elimino espacios en blanco
        }
    }
    return $datos;
}



/**
 * Función que recibe los parámetros de conexión de un array y crea el pdo
 */
function conexionBD()
{
    $datosConex = [];
    $datosConex = recibeConexion();

    $servidor = $datosConex[0];
    $user = $datosConex[1];
    $pass = $datosConex[2];
    $dbname = $datosConex[3];
    try {
        $conex = new PDO('mysql:host=' . $servidor . ';' . 'dbname=' . $dbname, $user, $pass);
    } catch (PDOException $e) {
        echo 'Falló la conexión con la BD: ' . $e->getMessage();
    }

    return $conex;
}


function closeBD($conex)
{
    $conex = null;
}
/**
 * @param $username el nombre de usuario
 * @param $password la contraseña del usuario
 * @return retorna true si el usuario existe
 */
function comprobarUsuario($username, $password)
{

    $conexion = conexionBD();

    $sql = "SELECT username,pass FROM usuario WHERE username=? and pass=?";
    $consulta = $conexion->prepare($sql);

    $consulta->bindParam(1, $username);
    $consulta->bindParam(2, $password);
    $consulta->execute();
    if ($consulta->rowCount() == 1) {
        return true;
    }
}
/**
 * @param $usuario un objeto Usuario
 */
function crearUsuario($username, $password, $firstName, $lastName1, $lastName2, $email, $telefono)
{

    $conexion = conexionBD();
    $sql = "INSERT INTO usuario (username,pass,nombre,apellido1,apellido2,correoElectronico,telefono,codRol) VALUES (?,?,?,?,?,?,?,?)";

    $rol = 1;
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(1, $username);
    $consulta->bindParam(2, $password);
    $consulta->bindParam(3, $firstName);
    $consulta->bindParam(4, $lastName1);
    $consulta->bindParam(5, $lastName2);
    $consulta->bindParam(6, $email);
    $consulta->bindParam(7, $telefono);
    $consulta->bindParam(8, $rol);
    $consulta->execute();

    //comprobamos que se ha introducido bien el usuario
    if ($consulta->rowCount() == 1) {
        return true;
    }
}

/**
 * @param $usuario un objeto Usuario
 * 
 */
function modificarUsuario($usuario)
{
    $conexion = conexionBD();
    $sql = ('UPDATE usuario SET usuario = ?, contrasenia = ?, nombre = ?, apellido1 =  ?, apellido2 = ?, correo = ?, telefono = ? WHERE usuario = ? ;');
    $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $usuarioCambio);
        $consulta->bindParam(2, $contrasenia);
        $consulta->bindParam(3, $nombre);
        $consulta->bindParam(4, $apellido1);
        $consulta->bindParam(5, $apellido2);
        $consulta->bindParam(6, $correo);
        $consulta->bindParam(7, $telefono);
        $consulta->bindParam(8, $usuario);

        $consulta->execute();
}

/**
 * @param $usuario un objeto Usuario
 */
function borrarUsuario($usuario)
{
}
/**
 * @return retorna un array con los usuarios del sistema
 */
function verUsuarios()
{

    $usuarios = [];

    return $usuarios;
}
/**
 * @return retorna true si la cita que se ha escogido está libre
 */
function verCitaDisponible($cita)
{

}
function crearCita($cita)
{
}

function modificarCita($cita)
{

}

function borrarCita($cita)
{

}




function listaServicios()
{
    try {
        $servicios = [];
        $conexion = conexionBD();
        $sql = "SELECT * FROM servicio;";
        $consulta = $conexion->query($sql);


        if ($consulta != null) {
            $servicios = $consulta->fetchAll(PDO::FETCH_CLASS);
        }

        return $servicios;
    } catch (PDOException $e) {
        echo 'Falló la conexión con la BD: ' . $e->getMessage();
    }
}

/**
     * Metodo que dice que rol tiene un usuario pasado
     * 
     * @param String $usuario Nombre de usuario que le pasamos para saber que rol tiene
     * @return Array $rol Rol que tiene el usuario en la base de datos
     */
    function rolUsuario($usuario)
    {
        try 
        {
            $conexion = conexionBD();
            $sql = 'SELECT codRol FROM usuario WHERE username  = "'.$usuario.'";';
            $consulta = $conexion->query($sql);

            $rol = $consulta->fetchAll(PDO::FETCH_CLASS);
        }
        catch (PDOException $error) 
        {
            die("Error: ".$error->getMessage());
        }

        return $rol;
    }

    /**
     * Funcion que pasandole un nombre de usuario me devuelve un array con los datos del usuario
     * @param String el nombre del usuario
     * @return array retorna un array con los datos del usuario
     */
function leeUsuario($usuario)
{
    try {
        $usuarioArray = [];
        $conexion = conexionBD();
        $sql = "SELECT nombre,apellido1 FROM usuario WHERE username='" . $usuario . "'";
        $consulta = $conexion->query($sql);


        if ($consulta != null) {
            $usuarioArray = $consulta->fetchAll(PDO::FETCH_CLASS);
        }

        return $usuarioArray;
    } catch (PDOException $e) {
        echo 'Falló la conexión con la BD: ' . $e->getMessage();
    }
}
/**
 * Función que pasándole un username me devuelve las citas que tiene ese usuario
 * @param String $usuario el nombre de usuario
 * @return retorna un array con las citas del usuario
 */
function listaCitaBD($usuario)
{
    try {
        $citasCliente = [];
        $conexion = conexionBD();
        $sql = "SELECT c.fechaHora, s.nombre, s.descripcion FROM cita AS c NATURAL JOIN servicio AS s  WHERE c.username='" . $usuario . "' order by c.fechaHora desc;";
        $consulta = $conexion->query($sql);


        if ($consulta != null) {
            $citasCliente = $consulta->fetchAll(PDO::FETCH_CLASS);
        }

        return $citasCliente;
    } catch (PDOException $e) {
        echo 'Falló la conexión con la BD: ' . $e->getMessage();
    }
}


function horasOcupadasCita($fecha)
{
    try {
        $conexion = conexionBD();
        $sql = "SELECT DATE_FORMAT(fechaHora, '%H:%i') as Hora
        FROM cita where fechaHora BETWEEN '$fecha 10:00:00' AND '$fecha 20:00:00' ;";
        $consulta = $conexion->query($sql);
        $comprobacion = $consulta->fetchAll();
    } catch (PDOException $e) {
        echo 'Falló la conexión con la BD: ' . $e->getMessage();
    }
    return $comprobacion;
}


function grabarCitaBD($fechaHora, $usuario, $idServicio)
{
    try {
        $conexion = conexionBD();
        $sql = 'INSERT INTO cita (fechaHora,username,codServicio) VALUES (?, ?, ?);';
        $consulta = $conexion->prepare($sql);

        $consulta->bindParam(1, $fechaHora);
        $consulta->bindParam(2, $usuario);
        $consulta->bindParam(3, $idServicio);

        $consulta->execute();
    } catch (PDOException $e) {
        echo 'Falló la conexión con la BD: ' . $e->getMessage();
    }
}
/**
 * funcion que me devuelve un array con todas las citas del señor barro
 */
function listarCitas()
{
    try {
        $conexion = conexionBD();
        $citas=[];
        $sql = "SELECT ci.codCita, ci.fechaHora, se.nombre,se.descripcion FROM cita ci NATURAL JOIN servicio se ORDER BY ci.codCita;";
        $consulta = $conexion->query($sql);


        if ($consulta != null) {
            $citas = $consulta->fetchAll(PDO::FETCH_CLASS);
        }

        

       
    } catch (PDOException $e) {
        echo 'Falló la conexión con la BD: ' . $e->getMessage();
    }
    return $citas;
}
/**
 * Función que elimina una cita pasándole un id de cita
 * @param idCita el id de la cita
 */
function eliminarCita($idCita)
{
    
    $conexion = conexionBD();
    $consulta = $conexion->prepare('DELETE FROM cita WHERE idCita = ?');
    $consulta->bindParam(1, $idCita);
     $consulta->execute();
}
function enviaCorreo()
{

    return true;
}
