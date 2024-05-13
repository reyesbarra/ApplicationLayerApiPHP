<?php

// Permitir solicitudes desde cualquier origen
header("Access-Control-Allow-Origin: *");

// Configuración de la conexión a la base de datos MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sensores";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
  die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Consultar los datos de la tabla 'datos'
$sql = "SELECT * FROM datos";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
  $datos = array();
  while ($row = $result->fetch_assoc()) {
    $datos[] = $row;
  }
  
  // Devolver los datos como JSON
  header('Content-Type: application/json');
  echo json_encode($datos);
} else {
  echo "No se encontraron datos en la base de datos";
}

// Cerrar la conexión
$conn->close();
?>
