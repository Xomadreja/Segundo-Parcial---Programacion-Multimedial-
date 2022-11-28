<?php
include("../vista/adminVistaGeneral.php")
?>
<body>

    <div class='row'>
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <h1>Llenado de Datos</h1>
        <form role="form" method ="post" enctype="multipart/form-data" action="../controlador/<?php echo "c_".$pantalla ?>">
            <label for="">Nombre</label>
            <input type="text" name="nomPers" id="nomPers" class='form-control' value=<?php echo $nom; ?> readonly>
            <br>
            <label for="">CI</label>
            <input type="text" name="ciPers" id="apellPers" class='form-control'>
            <br>
            <label for="">Historial Academico</label>
            <input type="file" name="docPers" id="imagePers" value="Examinar" class='form-control'>
            <br>
            
            <input type="submit" name="registrarCliente" value="Registrar" class='btn btn-primary'>
        </form>
    </div>
    <div class="col-md-3"></div>
    </div>
</body>
<?php
require_once "footerDash.php";
?>