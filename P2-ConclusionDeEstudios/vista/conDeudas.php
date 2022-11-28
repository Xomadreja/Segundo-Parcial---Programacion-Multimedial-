<h1>PROCESO RECHAZADO</h1>
<h2>La persona tiene deudas</h2>
<?php
$idProceso=$_SESSION['idProceso'];
include("../modelo/procesoClase.php");
$pro = new Proceso ($idProceso,"","","","","","","","");
$res2=$pro->rechazarProceso();
?>