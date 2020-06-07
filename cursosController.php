
<?php include $_SERVER['DOCUMENT_ROOT'] . '/DWES/UF1_ORD2_Pau_Gonzalez/resources/bd.php' ?>

<?php session_start(); ?>


<?php
//Delete
if (isset($_POST['borrar'])) {
    $id = $_POST['borrar'];
    deleteCursosById($id); //Esborrem la ciutat
    header('Location: cursos.php');
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
}
// Insert
else if (isset($_POST['altaForm'])) {
    // $id = $_POST['idCurso'];
    $codigo = $_POST['codigoCurso'];
    $nombre = $_POST['nombreCurso'];
    $descripcion = $_POST['descCurso'];
    $usuario_username = $_POST['userCurso'];
    insertcursos(/*$id,*/$nombre, $codigo, $descripcion, $usuario_username);
    header('Location: cursos.php');
}
/*
function recuperarCiutats(){
    $cursos = selectAllCursos();
    return $cursos;
}
/*
function recuperarReserves()
{
    $reserves = $_SESSION['reserves'];
    return $reserves;
}
 function altaReserva()
{
    $reserva = [];
    $reserva['nombre'] = $_POST['cbCiudad'] ? $_POST['cbCiudad'] : '';
    $reserva['nombreHotel'] = $_POST['iNombreHotel'];
    $reserva['fechaInicio'] = $_POST['iFechaInicio'];
    $reserva['fechaFin'] = $_POST['iFechaFinal'];
    $reserva['numeroPersonas'] = $_POST['iNumPersonas'];

    //Array de caracteristicas
    if (isset($_POST['caracteristicas'])) {
        $reserva['caracteristicas'] = [];
        foreach ($_POST['caracteristicas'] as $elemento) {
            array_push($reserva['caracteristicas'], $elemento);
        }
    }

    $reserva['comida'] = $_POST['comida'];
    $reserva['orientacion'] = $_POST['orientacion'];
    $reserva['observaciones'] = $_POST['texto'];
    array_push($_SESSION['reserves'], $reserva);
}
//Comprovem que haguin enviat per post el cerrar per tornar al index
// cerrar session

if (isset($_POST['cerrar'])) {
    session_unset();
    session_destroy();
    header('Location: index.php');
} // eliminar elemento
elseif (isset($_POST['posicion'])) {
    unset($_SESSION['reserves'][$_POST['posicion']]);
    $_SESSION['reserves'] = array_values($_SESSION['reserves']);
    header('Location: index.php');
}
//Escuchamos la alta de una nueva reserva
elseif (isset($_POST['altaForm'])) {
    altaReserva();
    header('Location: index.php');
}*/
?>