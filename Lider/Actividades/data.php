<?php
// Conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
$database = "PROJECT_MANAGAMENT";

// Crear la conexión
$conn = new mysqli($host, $user, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de las actividades
$sql = "SELECT id, actividad, fecha_inicio, fecha_fin FROM reportes";
$result = $conn->query($sql);

// Crear un array para almacenar los datos
$data = [];

// Obtener los datos y agregarlos al array
while ($row = $result->fetch_assoc()) {
    $data[] = [
        'id' => $row['id'],
        'actividad' => $row['actividad'],
        'fecha_inicio' => $row['fecha_inicio'],
        'fecha_fin' => $row['fecha_fin']
    ];
}

// Convertir el array en formato JSON y enviarlo como respuesta
echo json_encode($data);

// Cerrar la conexión
$conn->close();
?>
