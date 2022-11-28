<?php
    include("../controlador/seguridad.php");
    $id = $_SESSION['id'];
    $carreraPers = $_POST['carreraPers'];
    $fechaIni=$_SESSION['fecha'];
    //echo "".$nomPers.' '.$ciPers.' '.$docPers.' '.$fechaIni.' '. $estado;
        include("../modelo/procesoClase.php");
        $pro = new Proceso ("",$id,"","",$carreraPers,$fechaIni,"","","");
        $res2=$pro->actualizarProceso();
        if($res2){
            echo "<script>
                    alert('Se registro correctamente');
                    location.href = '../vista/motor.php?flujo=F1&proceso=P2';
                </script>";
        }
            else{
                echo "<script>
                        alert('NO Se registro correctamente, ERROR');
                        location.href = '../vista/motor.php?flujo=F1&proceso=P1';
                    </script>";

            }   
    
?>