<?php include $_SERVER['DOCUMENT_ROOT'] . '/DWES/UF1_ORD2_Pau_Gonzalez/resources/bd.php' ?>

<?php
//Delete
if (isset($_POST['borrar'])) {
    $id = $_POST['borrar'];
    deleteCursosById($id); //Esborrem la ciutat
    header('Location: cursos.php');
    exit();
}
// Alter
else if (isset($_POST['modificacionCurso'])) {
    $id = $_POST['idCurso'];
    $codigo = $_POST['codigoCurso'];
    $nombre = $_POST['nombreCurso'];
    $descripcion = $_POST['descCurso'];
    $usuario_username = $_POST['userCurso'];
    updateCurso($id, $nombre, $codigo, $descripcion, $usuario_username);
    header('Location: cursos.php');
    exit();
}
// Insert
else if (isset($_POST['altaForm'])) {

    $codigo = $_POST['codigoCurso'];
    $nombre = $_POST['nombreCurso'];
    $descripcion = $_POST['descCurso'];
    $usuario_username = $_POST['userCurso'];
    insertcursos($nombre, $codigo, $descripcion, $usuario_username);
    if (isset($_SESSION['error'])) {
        header('Location: altaCurso.php');
    } else {
        header('Location: cursos.php');
    }
    exit();
}
?>