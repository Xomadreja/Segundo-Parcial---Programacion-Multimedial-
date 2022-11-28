<h1>PROCESO ACEPTADO</h1>
<h2>NO tiene deudas</h2>

<?php
$idProceso=$_SESSION['idProceso'];
include("../modelo/procesoClase.php");
$pro = new Proceso ($idProceso,"","","","","","","","");
$res2=$pro->aceptarProceso();
?>

