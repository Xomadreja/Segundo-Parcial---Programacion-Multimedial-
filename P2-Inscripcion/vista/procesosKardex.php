<?php
include("../vista/adminVistaGeneral.php")
?>
<div class='row'>
    <div class="col-md-1"></div>
    <div class="col-md-9">
        <h1>HISTORIAL DE PROCESOS</h1>
        <table class='table'>
            <thead class='table-info'>
                <tr>
                    <th scope='col'>CI</th>
                    <th scope='col'>DOCUMENTO</th>
                    <th scope='col'>CARRERA</th>
                    <th scope='col'>FECHA INI</th>
                    <th scope='col'>FECHA FIN</th>
                    <th scope='col'>ESTADO</th>
                    <th scope='col' colspan="2">CONDICION</th>
          
                </tr>
            </thead>
            <img src="" alt="">
            <tbody>
                <?php
            
                include('../modelo/conexion.php');
                $id=$_SESSION['id'];
                $f=$_SESSION['flujo'];
                $p=$_SESSION['proceso'];
                $res=$conexion->query("select * from proceso_verificacion where estado='verificando'");
                $res2=$conexion->query("select * from condicional where flujo = '$f' and proceso= '$p'");
                $condicion=mysqli_fetch_array($res2);
                $porSi =  $condicion['procesoPorSi'];
                $porNo =  $condicion['procesoPorNo'];

                while($reg=mysqli_fetch_array($res)){
                    echo "<tr>";
                    echo "<td>". $reg['ci']."</td>";
                    echo "<td> <a href = '../controlador/doc/$reg[3]' class='btn btn-info'>". $reg['nomDoc']."</a></td>";
                    echo "<td>". $reg['carrera']."</td>";
                    echo "<td>". $reg['fechaIni']."</td>";
                    echo "<td>". $reg['fechaFin']."</td>";
                    echo "<td>". $reg['estado']."</td>";
                    
                    echo "<td> <a href = 'motor.php?flujo=$f&proceso=$porSi&idProceso=$reg[0]&pagAnterior=$p' class='btn btn-success'>"."SI"."</a></td>";
                    echo "<td> <a href = 'motor.php?flujo=$f&proceso=$porNo&idProceso=$reg[0]&pagAnterior=$p' class='btn btn-danger'>"."NO"."</a></td>";
                   
                    echo "</tr>";
                }
                
                ?>
            </tbody>
        </table>
        
    </div>
    <div class="col-md-2"></div>
    </div>


<?php

require_once "footerDash.php";
?>