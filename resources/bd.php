<?php

function openDB()
{

    $servername = "localhost:8889";
    $username = "root";
    $password = "root";
    $conn = new PDO("mysql:host=$servername;dbname=dwes_ord_2; charset=UTF8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
}

function closeDB()
{

    return null;
}

function selectAllCursos()
{
    $conn = openDB();

    $sentencia = $conn->prepare('select * from curso');
    $sentencia->execute();
    $respuesta = $sentencia->fetchAll();
    $conn = closeDB();
    return $respuesta;
}
function selectAllUsuarios()
{
    $conn = openDB();

    $sentencia = $conn->prepare('select * from usuario');
    $sentencia->execute();
    $respuesta = $sentencia->fetchAll();
    $conn = closeDB();
    return $respuesta;
}

function selectCursoById($id)
{
    $conn = openDB();

    $sentencia = $conn->prepare('SELECT * FROM curso WHERE id=:id');
    $sentencia->bindParam(':id', $id);

    $sentencia->execute();
    $respuesta = $sentencia->fetch(); //Convertimos en array la respuesta

    $conn = closeDB();
    return $respuesta;
}

function insertCursos($nombre, $codigo, $descripcion, $usuario_username)
{
    // Comentem el ID perque al auto assignarse no hem de declarar-lo
    try {
        $conn = openDB();

        $sentencia = $conn->prepare("INSERT INTO curso VALUES (null, :codigo, :nombre, :descripcion, :usuario_username)");
        $sentencia->bindParam(':codigo', $codigo);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':descripcion', $descripcion);
        $sentencia->bindParam(':usuario_username', $usuario_username);

        $sentencia->execute();
        $conn = closeDB();
        $_SESSION['mensaje'] = "Registro insertado correctamente";
    } catch (PDOException $p) {
        $_SESSION['error'] = $p->getCode() . ' ' . $p->getMessage();
    }
}

function deleteCursosById($id)
{
    $conn = openDB();

    $sentencia = $conn->prepare("DELETE FROM curso WHERE id=:id");
    $sentencia->bindParam(':id', $id);

    $sentencia->execute();

    $conn = closeDB();
}

function updateCurso($id, $nombre, $codigo, $descripcion, $usuario_username)
{
    try {
        $conn = openDB();

        $sentencia = $conn->prepare('UPDATE curso SET codigo=:codigo, nombre=:nombre, descripcion=:descripcion, usuario_username=:usuario_username WHERE id=:id');
        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':codigo', $codigo);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':descripcion', $descripcion);
        $sentencia->bindParam(':usuario_username', $usuario_username);
        $sentencia->execute();

        $conn = closeDB();
        $_SESSION['mensaje'] = "Registro actualizado correctamente";
    } catch (PDOException $p) {
        $_SESSION['error'] = $p->getCode() . ' ' . $p->getMessage();
    }
}
