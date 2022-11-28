<?php
class Proceso{
    private $id;
    private $id_persona;
    private $ci;
    private $nomDoc;
    private $carrera;
    private $fechaIni;
    private $fechaFin;
    private $deudas;
    private $estado;
    public function __construct($i,$idp,$ci,$n,$ca,$fi,$ff,$d,$e){
        $this->id=$i;
        $this->id_persona=$idp;
        $this->ci=$ci;
        $this->nomDoc=$n;
        $this->carrera=$ca;
        $this->fechaIni=$fi;
        $this->fechaFin=$ff;
        $this->deudas=$d;
        $this->estado=$e;
    }
    public function grabarProceso(){
        include("conexion.php");
        $consulta = $conexion->query("insert into proceso_verificacion(id_persona,ci,nomDoc,carrera,fechaIni,fechaFin,deudas,estado)
        values('$this->id_persona','$this->ci','$this->nomDoc','$this->carrera','$this->fechaIni','$this->fechaFin','$this->deudas','$this->estado')");
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
        $consulta = $conexion->query("update proceso_verificacion set deudas='No tiene deudas', fechaFin='$fechaFin' where id='$this->id'");
        return ($consulta);
    }
    public function aceptarCertificado(){
        include("conexion.php");
        $fechaFin=date("Y-m-d H:i:s");
        $consulta = $conexion->query("update proceso_verificacion set estado='Finalizado', fechaFin='$fechaFin' where id='$this->id'");
        return ($consulta);
    }
    public function rechazarProceso(){
        include("conexion.php");
        $fechaFin=date("Y-m-d H:i:s");
        $consulta = $conexion->query("update proceso_verificacion set deudas='Tiene Deudas', fechaFin='$fechaFin' where id='$this->id'");
        return ($consulta);
    }
   

   
}
?>