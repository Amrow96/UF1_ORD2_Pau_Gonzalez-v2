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

    $sentencia = $conn->prepare('SELECT * FROM cursos WHERE id=:id');
    $sentencia->bindParam(':id', $id);

    $sentencia->execute();
    $respuesta = $sentencia->fetch(); //Convertimos en array la respuesta

    $conn = closeDB();
    return $respuesta;
}

function insertCursos(/*$id,*/$nombre, $codigo, $descripcion, $usuario_username)
{
    // Comentem el ID perque al auto assignarse no hem de declarar-lo
    $conn = openDB();

    $sentencia = $conn->prepare("INSERT INTO curso VALUES (/*:id,*/ :codigo, :nombre, :descripcion, :usuario_username)");
    // $sentencia->bindParam(':id', $id);
    $sentencia->bindParam(':codigo', $codigo);
    $sentencia->bindParam(':nombre', $nombre);
    $sentencia->bindParam(':descripcion', $descripcion);
    $sentencia->bindParam(':usuario_username', $usuario_username);

    $sentencia->execute();

    $conn = closeDB();
}

function deleteCursosById($id)
{
    $conn = openDB();

    $sentencia = $conn->prepare("DELETE FROM curso WHERE id=:id");
    $sentencia->bindParam(':id', $id);

    $sentencia->execute();

    $conn = closeDB();
}

function updateCurso(/*$id,*/$nombre, $codigo, $descripcion, $usuario_username)
{
    $conn = openDB();

    $sentencia = $conn->prepare('UPDATE curso SET /*id=:id,*/ codigo=:codigo, nombre=:nombre, descripcion=:descripcion, usuario_username=:usuario_username WHERE id=:id');
    // $sentencia->bindParam(':id', $id);
    $sentencia->bindParam(':codigo', $codigo);
    $sentencia->bindParam(':nombre', $nombre);
    $sentencia->bindParam(':descripcion', $descripcion);
    $sentencia->bindParam(':usuario_username', $usuario_username);
    $sentencia->execute();

    $conn = closeDB();
}
