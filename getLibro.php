<?php

require 'config/database.php';

$id = $conn->real_escape_string($_POST['id']);

$sql = "SELECT id, nombre, descripcion, id_genero FROM libro WHERE id=$id LIMIT 1";
$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$libro = [];

if ($rows > 0) {
    $libro = $resultado->fetch_array();
}

echo json_encode($libro, JSON_UNESCAPED_UNICODE);
