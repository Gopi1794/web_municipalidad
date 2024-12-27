<?php
include "conexion.php"; // Conexión a la base de datos

// Consulta SQL para obtener el conteo de usuarios por provincia
$stmt = $conexion->prepare("SELECT * FROM datos");
$stmt->execute();

// Crear un array para almacenar los resultados
$results = array();

$stmt->store_result();
$variables = array();
$meta = $stmt->result_metadata();
while ($field = $meta->fetch_field()) {
    $variables[] = &$results[$field->name];
}
call_user_func_array(array($stmt, 'bind_result'), $variables);

// Recoger los datos en el formato adecuado
while ($stmt->fetch()) {
    $row = array();
    foreach ($results as $key => $val) {
        $row[$key] = $val;
    }
    $final_results[] = $row;
}

// Devolver los datos como un JSON
echo json_encode($final_results);
?>
