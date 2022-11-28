<?php
    include("../controlador/seguridad.php");
    $id = $_SESSION['id'];
    $nom = $_SESSION['nombre'];
    $nomPers=$_POST['nomPers'];
    $ciPers=$_POST['ciPers'];
    $docPers=$_FILES['docPers']['name'];
    $fechaIni=date("Y-m-d H:i:s");
    $_SESSION['fecha']= $fechaIni;
    $estado='verificando';
    //echo "".$nomPers.' '.$ciPers.' '.$docPers.' '.$fechaIni.' '. $estado;
        include("../modelo/procesoClase.php");
        $pro = new Proceso ("",$id,$ciPers,$docPers,"",$fechaIni,"",$estado);
        $res2=$pro->grabarProceso();
        if($res2){
            $docbd=$_FILES['docPers']['tmp_name'];
            //echo $imabd;
            //echo 'imagenes/'.$imagePers;
            move_uploaded_file($docbd,'doc/'.$docPers);
            echo "<script>
                    alert('Se registro correctamente');
                    location.href = '../vista/motor.php?flujo=F1&proceso=P1';
                </script>";
        }
            else{
                echo "<script>
                        alert('NO Se registro correctamente, ERROR');
                        location.href = '../vista/motor.php?flujo=F1&proceso=P1';
                    </script>";

            }   
    
?>