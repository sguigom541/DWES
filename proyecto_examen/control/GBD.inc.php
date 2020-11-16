<?php  
    require_once "../modelo/ALUMNO.php";
    require_once "../modelo/EXAMEN.php";
class BD
{
    public static function ejecutarConsulta($sql)
    {
        $dsn="mysql:host=localhost;dbname=proyectoexamen";
        $usuario = 'root';
        $contrasena = '';

        try {
			$conn = new PDO($dsn, $usuario, $contrasena);
			$resultado = null;
            if (isset($conn))
            {
                $resultado = $conn->query($sql);
            } 
		}catch (PDOException $e) {
            die("Error: " . $e->getMessage());
		}
        return $resultado;
    }

    /**
     * Función que pasándole un dni y una contraseña verifica si existe el alumno.
     * @return true si existe el alumno.
     */
    public static function verificarAlumno($dniAlumno,$pass)
    {
        $sql="SELECT * from alumno";
        $sql .= " WHERE dni='".$dniAlumno. "'";
        $sql .= "AND pass='".$pass. "'";
        $resultado=self::ejecutarConsulta($sql);
        $verificado = false;

        if(isset($resultado)) {
            $row = $resultado->fetch();
            if($row !== false)
            {
                $verificado=true;
            } 
        }
        return $verificado;
    }


    /**
     * Función que pasándole el dni del alumno me devuelve un objeto alumno.
     * 
     * @return alumno retorna un objeto de la clase ALUMNO.
     */
    public static function devolverAlumno ($dniAlumno)
    {
        $sql="SELECT * from alumno";
        $sql .= " WHERE dni='".$dniAlumno. "'";
        $resultado=self::ejecutarConsulta($sql);
        $alumno=null;

        if(isset($resultado)){
            $row=$resultado->fetch();
            $alumno=new alumno($row);
        }
        return $alumno;
    }

    /**
     * Función que pasándole el codExamen del examen me devuelve un objeto examen.
     * 
     * @return examen retorna un objeto de la clase EXAMEN.
     */
    public static function devolverExamen($codExamen){
        $sql="SELECT * from examen";
        $sql .= " WHERE codExamen='".$codExamen. "'";
        $resultado=self::ejecutarConsulta($sql);
        $examen=null;

        if(isset($resultado)){
            $row=$resultado->fetch();
            $examen=new examen($row);
        }
        return $examen;
    }
    /**
     * Función que pasándole un código de examen me devuelve true si el examen existe.
     * @return true si existe el examen.
     */
    public static function verificarExamen($codExamen)
    {
        $sql= "SELECT codExamen FROM examen ";
        $sql .= "WHERE codExamen='$codExamen'";
        $resultado = self::ejecutarConsulta($sql);
        $verificado=false;
        if(isset($resultado))
        {
            $fila=$resultado->fetch();
            if($fila !==false)$verificado=true;
        }
        return $verificado;
    }
    
    /**
     * Función que pasándole un código de examen y el dni del alumno me devuelve true si el alumno está en ese examen.
     * @return true si el alumno está en el examen.
     */
    public static function verificarExamenAlumno($codExamen,$dniAlumno)
    {
        $sql= "SELECT * FROM alumno_realiza_examen ";
        $sql .= " WHERE dni='".$dniAlumno. "'";
        $sql .= " AND codExamen='".$codExamen. "'";
        $resultado = self::ejecutarConsulta($sql);
        $verificado=false;
        if(isset($resultado))
        {
            $fila=$resultado->fetch();
            if($fila !==false)$verificado=true;
        }
        return $verificado;

    }

    public static function obtenerPreguntasExamen($codExamen)
    {
        $sql="select * from examen_tiene_pregunta ";
        $sql .= "NATURAL JOIN pregunta where codExamen='".$codExamen. "'" ;
        $sql .= "order by ordenPregunta";
        $preguntas=[];
        $resultado= self::ejecutarConsulta($sql);
        if($resultado!=null){
            $preguntas=$resultado->fetchAll(PDO::FETCH_CLASS);
        }
        return $preguntas;
    }
   
}
