<?php include $_SERVER['DOCUMENT_ROOT'] . '/DWES/UF1_ORD2_Pau_Gonzalez/plantilla_base.php' ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/DWES/UF1_ORD2_Pau_Gonzalez/resources/bd.php' ?>

<?php startblock('titulo') ?>
Cursos
<?php endblock() ?>
<?php startblock('principal') ?>

<div class="container-fluid mt-5">
    <?php require_once './partials/mensajes.php' ?>

    <?php
    $cursos = selectAllCursos();
    ?>
    <div class="container">

        <div class="card-body border border-primary">
            <a href="altaCurso.php">
                <button class="btn btn-primary">NUEVO CURSO</button>
            </a>
        </div>
    </div>
</div>

<div class="container-fluid ">
    <?php
    if (count($cursos) == 0) { ?>
        <div class="container">
            <div class="card-header bg-primary titular"> Lista de cursos</div>
            <!-- Si la session existe cargar los datos, de lo contrario mostrar el menasje -->
            <div class="card-body border border-primary">
                <div class="alert alert-info alert-dismissible fade show " role="alert">
                    <strong>No hay ningun curso!</strong> Pulsa en "NUEVO CURSO" para crear uno.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <!-- Contenido de las tablas -->
        <div class="container">
            <div class="card mt-2">
                <div class="card-header bg-primary titular">Datos Curso</div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <!-- Mostramos la cabecera de la tabla -->
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Usuario</th>
                                <th>Gestion</th>
                                <th>Borrar</th>

                            </tr>
                        </thead>
                        <tbody>
                            <!-- Mostramos los botones para cada ciudad -->
                            <?php
                            foreach ($cursos as $cursos) { ?>
                                <tr class="col col-12">
                                    <td><?php echo $cursos['codigo'] ?></td>
                                    <td><?php echo $cursos['nombre'] ?></td>
                                    <td><?php echo $cursos['descripcion'] ?></td>
                                    <td><?php echo $cursos['usuario_username'] ?></td>
                                    <td>
                                        <form action="editCurso.php" method="POST">
                                            <button type="submit" class="btn btn-info" name="modificar" value="<?php echo $cursos["id"] ?>">Modificar</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="cursosController.php" method="POST">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal<?php echo $cursos["id"] ?>">
                                                Borrar
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modal<?php echo $cursos["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Seguro que quieres borrar?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="borrar" class="btn btn-danger" value="<?php echo $cursos["id"] ?>">Borrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Fem un listen al controller amb el name borrar que cridi al metode borrar de bd -->
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php } ?>
        </div>
        <?php endblock() ?>