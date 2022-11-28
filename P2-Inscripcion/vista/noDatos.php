<h1>PROCESO RECHAZADO</h1>
<?php
$idProceso=$_SESSION['idProceso'];
include("../modelo/procesoClase.php");
$pro = new Proceso ($idProceso,"","","","","","","");
$res2=$pro->rechazarProceso();
?>