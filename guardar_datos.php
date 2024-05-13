<?php
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

// Obtener los datos enviados por el dispositivo receptor
$temperatura = $_POST['tem'];
$humedad = $_POST['hum'];
$bombillo = $_POST['bomb'];

// Insertar los datos en la tabla 'mediciones'
$sql = "INSERT INTO datos (temperatura, humedad, bombillo) VALUES ('$temperatura', '$humedad', '$bombillo')";

if ($conn->query($sql) === TRUE) {
  echo "Datos insertados correctamente en la base de datos";
} else {
  echo "Error al insertar datos en la base de datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
