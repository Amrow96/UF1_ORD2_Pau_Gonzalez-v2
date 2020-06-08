<?php include './plantilla_base.php';
include './cursosController.php';
if (isset($_SESSION['curso'])) {
    $curso = $_SESSION['curso'];
} else {
    $curso['codigoCurso'] = "";
    $curso['nombreCurso'] = "";
    $curso['descCurso'] = "";
    $curso['userCurso'] = "";
}
$usuarios = selectAllUsuarios();
?>
<?php startblock('titulo') ?>Alta Curso<?php endblock() ?>

<?php startblock('principal') ?>
<div class="container">
    <?php require_once './partials/mensajes.php' ?>

    <div class="card">
        <div class="card-header bg-primary titular">Curso</div>
        <div class="card-body">
            <!--Selector del metode-->
            <form action="cursosController.php" method="post">
                <!-- Codigo Curso -->
                <div class="form-group row">
                    <label class="col-2">Codigo Curso</label>
                    <div class="col-10">
                        <input class=" form-control" type="number" id="codigoCurso" name="codigoCurso" maxlength="11" placeholder="Introduce el codigo del curso" value="<?php echo $curso['codigoCurso'] ?>"> </div>
                </div>
                <!--Nombre Curso-->
                <div class="form-group row">
                    <label class="col-2">Nombre</label>
                    <div class="col-10">
                        <input class=" form-control" type="text" id="nombreCurso" name="nombreCurso" maxlength="45" placeholder="Introduce el nombre del curso" value="<?php echo $curso['nombreCurso'] ?>">
                    </div>
                </div>
                <!--Descripcion Curso-->
                <div class="form-group row">
                    <label class="col-2">Descripción</label>
                    <div class="col-10">
                        <input class=" form-control" type="text" id="descCurso" name="descCurso" maxlength="45" placeholder="Introduce la descripción del curso" value="<?php echo $curso['descCurso'] ?>">
                    </div>
                </div>

                <!--Usuario Curso-->
                <div class="form-group row">
                    <label class="col-2">Nombre de usuario</label>
                    <div class="col-10">
                        <select name="userCurso" class=" form-control" id="userCurso">
                            <?php
                            foreach ($usuarios as $usuario) {
                                //Muestra y selecciona el usuario que tenemos por defecto
                                if ($usuario['username'] == $curso['userCurso']) {
                                    //selected
                                    echo "<option value=\"" . $usuario['username'] . "\" selected> " . $usuario['nom'] . " </option>";
                                } else {
                                    //normal
                                    echo "<option value=\"" . $usuario['username'] . "\"> " . $usuario['nom'] . " </option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!--Botón Submit-->
                <div class="form-group">
                    <input class="form-control btn btn-outline-primary col-2 offset-2" type="submit" value="GUARDAR" name="altaForm">
                    <a href="cursos.php" class="form-control btn btn-outline-secondary col-2 ml-4">CANCELAR</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endblock() ?>