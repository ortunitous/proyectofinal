<?php
// Conectar a la base de datos
$servername = "localhost"; // Cambia esto si es necesario
$username = "root"; // Cambia esto si es necesario
$password = ""; // Cambia esto si es necesario
$dbname = "EncuestaProfesores";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre_estudiante = $_POST['nombre'];
$correo_institucional = $_POST['email'];
$nombre_profesor = $_POST['profesor'];
$materia = $_POST['materia'];
$calificacion_profesor = $_POST['calificacion'];
$comentarios_adicionales = $_POST['comentarios'];

// Preparar la consulta SQL para insertar los datos
$sql = "INSERT INTO EvaluacionProfesor (nombre_estudiante, correo_institucional, nombre_profesor, materia, calificacion_profesor, comentarios_adicionales) 
        VALUES ('$nombre_estudiante', '$correo_institucional', '$nombre_profesor', '$materia', '$calificacion_profesor', '$comentarios_adicionales')";

if ($conn->query($sql) === TRUE) {
    echo "¡Encuesta guardada exitosamente!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
