<?php session_start(); ?>
<?php include './plantilla_base.php';
include './cursosController.php';

$usuarios = selectAllUsuarios();
?>
<?php startblock('titulo') ?>Alta Curso<?php endblock() ?>

<?php startblock('principal') ?>
<div class="container">
    <div class="card">
        <div class="card-header bg-primary titular">Alta Curso</div>
        <div class="card-body">
            <!--Selector del metode-->
            <form action="cursosController.php" method="post">
                <!--Identificador Curso-->
                <!-- <div class="form-group row">
                    <label class="col-2">Identificador</label>
                    <div class="col-10">
                        <input class=" form-control" type="number" id="idCurso" name="idCurso" maxlength="11" placeholder="Introduce el id" value="<?php echo $ciudad['id'] ?>"> </div>
                </div> -->

                <!-- Codigo Curso -->
                <div class="form-group row">
                    <label class="col-2">Codigo Curso</label>
                    <div class="col-10">
                        <input class=" form-control" type="number" id="codigoCurso" name="codigoCurso" maxlength="11" placeholder="Introduce el id de la ciudad" value="<?php echo $ciudad['codigo'] ?>"> </div>
                </div>
                <!--Nombre Curso-->
                <div class="form-group row">
                    <label class="col-2">Nombre</label>
                    <div class="col-10">
                        <!-- TODO: s'han de guardar les variables a la sessió i desde el controlador guardarles -->
                        <input class=" form-control" type="text" id="nombreCurso" name="nombreCurso" maxlength="45" placeholder="Introduce el id de la ciudad" value="<?php echo $ciudad['nombre'] ?>">
                    </div>
                </div>
                <!--Descripcion Curso-->
                <div class="form-group row">
                    <label class="col-2">Descripción</label>
                    <div class="col-10">
                        <!-- TODO: s'han de guardar les variables a la sessió i desde el controlador guardarles -->
                        <input class=" form-control" type="text" id="descCurso" name="descCurso" maxlength="45" placeholder="Introduce la descripción del curso" value="<?php echo $ciudad['descripcion'] ?>">
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
                                if ($usuario['username'] == $curso['usuario_username']) {
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
                <div class="form-group row">
                    <input class="form-control btn btn-outline-primary col-2 offset-2" type="submit" value="AÑADIR" name="altaForm">
                    <input class="form-control btn btn-outline-secondary col-2 ml-4" type="submit" value="CANCELAR">
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php endblock() ?>