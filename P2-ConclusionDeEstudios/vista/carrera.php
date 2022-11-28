<?php
include("../vista/adminVistaGeneral.php")
?>
<body>

    <div class='row'>
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <h1>Elije tu carrera</h1>
        <form role="form" method ="post" enctype="multipart/form-data" action="../controlador/<?php echo "c_".$pantalla ?>">
        <label for="">Carrera</label>
            <select name="carreraPers">
            <option label="Informatica">Informatica</option>
            <option label="Matematica">Matematica</option>
            <option label="Fisica">Fisica</option>
            <option label="Quimica">Quimica</option>
            </select>
            <br>
            
            <input type="submit" value="Registrar" class='btn btn-primary'>
        </form>
    </div>
    <div class="col-md-3"></div>
    </div>
</body>
<?php
require_once "footerDash.php";
?>