<?php
class GBD
{
    private $conexion;

    /**
     * Constructor donde se crea la conexión
     *
     * @param string $host url del servidor
     * @param string $basedatos nombre de la base de datos
     * @param string $usuario
     * @param string $password
     * @param string $driver driver para el servidor de base de datos
     */
    public function __construct(
        string $host,
        string $basedatos,
        string $usuario,
        string $password,
        string $driver = "mysql"
    ) {
        //Dependiendo del valor de driver construir dsn adecuado
        switch ($driver) {
            case 'mysql':
                $dsn = $driver . ":dbname=" . $basedatos . ";host=" . $host;
                break;
            case 'sqlsrv':
                $dsn = $driver . ":Database=" . $basedatos . ";server=" . $host;
                break;
            default:
                # code...
                break;
        }
        $dsn = $driver . ":dbname=" . $basedatos . ";host=" . $host;
        try {
            $this->conexion = new PDO($dsn, $usuario, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            throw new PDOException("Error en la conexión: " . $e->getMessage());
        }
    }

    /**
     * Lee todos los registros de una tabla pudiendo seleccionar los campos
     *
     * @param string $tabla nombre de la tabla
     * @param array $campos campos a leer o null para todos
     * @return array de objetos con los datos
     */
    public function getAll(string $tabla, array $campos = null)
    {
        $otroscampos = null;
        if (is_null($campos)) {
            $otroscampos = "*";
        } else {
            $otroscampos = implode(",", $campos);
        }
        $sql = "select " . $otroscampos . " from " . $tabla;
        try {
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_CLASS, $tabla);
            return $datos;
        } catch (PDOException $e) {
            throw new PDOException("Error de lectura de datos: " . $e->getMessage());
        }
    }


    /**
     * Devuelve el registro con clave primaria
     *
     * @param string $tabla
     * @param array $valoresid valores de la/s clave/s primaria/s
     * @return void
     */
    public function findById(string $tabla, $valoresid)
    {
        $sql = "select * from " . $tabla . " where ";
        $claves = $this->getPrimaryKey($tabla);
        $cuantos = count($claves);
        $condicion = "";
        for ($i = 0; $i < $cuantos; $i++) {
            if ($i < $cuantos - 1) {
                $condicion .= $claves[$i] . "=? and ";
            } else {
                $condicion .= $claves[$i] . "=?";
            }
        }

        $sql .= $condicion;
        try {
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute($valoresid);
            $datos = $consulta->fetchAll(PDO::FETCH_CLASS, $tabla);
            return $datos;
        } catch (PDOException $e) {
            throw new PDOException("Error leyendo por clave primaria: " . $e->getMessage());
        }
    }

    /**Metodo que comprueba si un usuario existe en la BD con su cod usuario o correo */
    public function comprobacionUsuario(string $tabla, string $codUsuario, string $correo)
    {

        $sql = "SELECT * from $tabla where codUsuario='" . $codUsuario . "' or email= '" . $correo . "'";
        try {
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam(1, $codUsuario);
            $consulta->bindParam(2, $correo);
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_CLASS, $tabla);
            return $datos;
        } catch (PDOException $e) {
            throw new Exception("Error leyendo en la bd:" . $e->getMessage());
        }
    }

    public function findByOne(string $tabla, $campovalor)
    {
        $sql = "select * from " . $tabla . " where " . array_keys($campovalor)[0] . " = ?";
        try {
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam(1, array_values($campovalor)[0]);
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_CLASS, $tabla);
            return $datos;
        } catch (PDOException $e) {
            throw new PDOException("Error leyendo por clave primaria: " . $e->getMessage());
        }
    }

    /**
     * Inserta una fila en una tabla
     *
     * @param string $tabla nombre de la tabla
     * @param array $valores array asociativo <campo>=><valor>
     * @return void
     */
    public function add(string $tabla, array $valores)
    {
        $campos = implode(",", array_keys($valores));
        $parametros = str_repeat("?,", count($valores));
        $parametros = rtrim($parametros, ",");
        $sql = "insert into " . $tabla . " (" . $campos . ") values (" . $parametros . ")";
        try {
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute(array_values($valores));
        } catch (PDOException $e) {
            throw new PDOException("Error insertando registro: " . $e->getMessage());
        }
    }

    /**
     * Modifica una fila
     *
     * @param string $tabla nomnre de la tabla
     * @param array $camposvalores array asociativo <campo>=><valor>
     * @param array $valoresid valores de la/s clave/s primaria/s
     * @return void
     */
    public function update(string $tabla, array $camposvalores, $valoresid)
    {
        $sql = "update $tabla set ";
        $campos = implode("=?, ", array_keys($camposvalores));
        $campos .= "=?";
        $sql .= $campos . " where ";

        $claves = $this->getPrimaryKey($tabla);
        $cuantos = count($claves);
        $condicion = "";
        for ($i = 0; $i < $cuantos; $i++) {
            if ($i < $cuantos - 1) {
                $condicion .= $claves[$i] . "=? and ";
            } else {
                $condicion .= $claves[$i] . "=?";
            }
        }
        $sql .= $condicion;
        try {
            $consulta = $this->conexion->prepare($sql);
            $valores = array_values($camposvalores);
            $parametros = array_merge($valores, array_values($valoresid));
            $consulta->execute($parametros);
        } catch (PDOException $e) {
            throw new PDOException("Error modificando fila: " . $e->getMessage());
        }
    }

    /**
     * Borra una fila de la tabla por clave primaria
     *
     * @param string $tabla nombre de la tabla
     * @param array $valoresid valores de la/s clave/s primaria/s
     * @return void
     */
    public function delete(string $tabla, array $valoresid)
    {
        $claves = $this->getPrimaryKey($tabla);
        $cuantos = count($claves);
        $condicion = "";
        for ($i = 0; $i < $cuantos; $i++) {
            if ($i < $cuantos - 1) {
                $condicion .= $claves[$i] . "=? and ";
            } else {
                $condicion .= $claves[$i] . "=?";
            }
        }
        $sql = "delete from $tabla where " . $condicion;
        try {
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute($valoresid);
        } catch (PDOException $e) {
            throw new PDOException("Error borrando fila:" . $e->getMessage());
        }
    }

    /**
     * Devuelve el campo que es clave primaria
     *
     * @param [string] $tabla nombre de la tabla
     * @return array con los nombres de la/s clave/s primaria/s
     */
    private function getPrimaryKey(string $tabla)
    {
        $sql = "SHOW KEYS FROM $tabla WHERE Key_name = 'PRIMARY'";
        $consulta = $this->conexion->query($sql);
        $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return array_column($datos, "Column_name");
    }

    /**
     * Devuelve la conexión
     *
     * @return void
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    public function existeUsuario(string $idUsuario)
    {
        $sql = "SELECT codUsuario FROM usuario WHERE codUsuario=?";
        $consulta = $this->conexion->prepare($sql);
        $existe = false;
        $consulta->bindParam(1, $idUsuario);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            $existe = true;
        }
        return $existe;
    }

    public function existeMascota(string $idMascota){
        $sql = "SELECT codMascota FROM mascota WHERE codMascota=?";
        $consulta = $this->conexion->prepare($sql);
        $existe = false;
        $consulta->bindParam(1, $idMascota);
        $consulta->execute();
        if ($consulta->rowCount() > 0) {
            $existe = true;
        }
        return $existe;
    }
    public function comprobacionUsuarioUpdate(string $tabla, string $nombre, string $codUsuario, string $correo)
    {
        $sql = "SELECT * from $tabla where (nombre='" . $nombre . "' and codUsuario!='" . $codUsuario . "') or (email='" . $codUsuario . "' and codUsuario!='" . $codUsuario . "')";
        try {
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam(1, $codUsuario);
            $consulta->bindParam(2, $correo);
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_CLASS, $tabla);
            return $datos;
        } catch (PDOException $e) {
            throw new Exception("Error leyendo en la bd:" . $e->getMessage());
        }
    }
    public function comprobacionMascotaUpdate(string $tabla, string $nombre, string $codMascota)
    {
        $sql = "SELECT * from $tabla where nombreMascota='" . $nombre . "' and codMascota!='" . $codMascota . "'";
        try {
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam(1, $codMascota);
            $consulta->bindParam(2, $nombre);
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_CLASS, $tabla);
            return $datos;
        } catch (PDOException $e) {
            throw new Exception("Error leyendo en la bd:" . $e->getMessage());
        }
    }
    public function devolverUsuario(string $codUsuario)
    {
    }
    public function getAllMascotas()
    {
        $sql = "select m.codMascota,m.nombreMascota,m.fechaNac,e.nombre as especie,g.nombre as genero,m.codUsuario from mascota m inner join especie e on m.codEspecie=e.codEspecie inner join genero g on m.codGenero=g.codGenero;";
        try {
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        } catch (PDOException $e) {
            throw new PDOException("Error de lectura de datos: " . $e->getMessage());
        }
    }

    public function getMascotasUsuario(string $usuario)
    {
        $sql="select m.codMascota,m.nombreMascota,m.fechaNac,e.nombre as especie from mascota m inner join especie e on m.codEspecie=e.codEspecie where codUsuario='" . $usuario . "';";
        try {
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        } catch (PDOException $e) {
            throw new PDOException("Error de lectura de datos: " . $e->getMessage());
        }
    }
}
