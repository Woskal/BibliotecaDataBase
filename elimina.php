<?php
session_start();

require 'config/database.php';

$id = $conn->real_escape_string($_POST['id']);

$sql = "DELETE FROM libro WHERE id=$id";
if ($conn->query($sql)) {

    $dir = "portadas";
    $portada = $dir . '/' . $id . '.jpg';

    if (file_exists($portada)) {
        unlink($portada);
    }

    $_SESSION['color'] = "success";
    $_SESSION['msg'] = "Libro eliminado";
} else {
    $_SESSION['color'] = "danger";
    $_SESSION['msg'] = "Error al eliminar el Libro";
}

header('Location: index.php');
