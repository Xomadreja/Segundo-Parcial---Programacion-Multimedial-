<?php
class Proceso{
    private $id;
    private $id_persona;
    private $ci;
    private $nomDoc;
    private $carrera;
    private $fechaIni;
    private $fechaFin;
    private $estado;
    public function __construct($i,$idp,$ci,$n,$ca,$fi,$ff,$e){
        $this->id=$i;
        $this->id_persona=$idp;
        $this->ci=$ci;
        $this->nomDoc=$n;
        $this->carrera=$ca;
        $this->fechaIni=$fi;
        $this->fechaFin=$ff;
        $this->estado=$e;
    }
    public function grabarProceso(){
        include("conexion.php");
        $consulta = $conexion->query("insert into proceso_verificacion(id_persona,ci,nomDoc,carrera,fechaIni,fechaFin,estado)
        values('$this->id_persona','$this->ci','$this->nomDoc','$this->carrera','$this->fechaIni','$this->fechaFin','$this->estado')");
        return ($consulta);
    }
    public function actualizarProceso(){
        include("conexion.php");
        $consulta = $conexion->query("update proceso_verificacion set carrera='$this->carrera' where id_persona='$this->id_persona' and fechaIni='$this->fechaIni'");
        return ($consulta);
    }
    public function aceptarProceso(){
        include("conexion.php");
        $fechaFin=date("Y-m-d H:i:s");
        $consulta = $conexion->query("update proceso_verificacion set estado='aceptado', fechaFin='$fechaFin' where id='$this->id'");
        return ($consulta);
    }
    public function rechazarProceso(){
        include("conexion.php");
        $fechaFin=date("Y-m-d H:i:s");
        $consulta = $conexion->query("update proceso_verificacion set estado='rechazado', fechaFin='$fechaFin' where id='$this->id'");
        return ($consulta);
    }
   

   
}
?>