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
                    <th scope='col' colspan="1">Operaciones</th>
          
                </tr>
            </thead>
            <img src="" alt="">
            <tbody>
                <?php
            
                include('../modelo/conexion.php');
                $id=$_SESSION['id'];
                $f=$_SESSION['flujo'];
                $p=$_SESSION['proceso'];
                $res=$conexion->query("select * from proceso_verificacion where estado='aceptado'");
                while($reg=mysqli_fetch_array($res)){
                    echo "<tr>";
                    echo "<td>". $reg['ci']."</td>";
                    echo "<td> <a href = '../controlador/doc/$reg[3]' class='btn btn-info'>". $reg['nomDoc']."</a></td>";
                    echo "<td>". $reg['carrera']."</td>";
                    echo "<td>". $reg['fechaIni']."</td>";
                    echo "<td>". $reg['fechaFin']."</td>";
                    echo "<td>". $reg['estado']."</td>";
                    
                    echo "<td> <a href = '../facturas/factura.php?idProceso=$reg[0]' class='btn btn-success'>"."Factura"."</a></td>";

                   
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