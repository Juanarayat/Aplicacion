<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $conn = mysqli_connect('db', 'root', 'test', 'dbname');

    // Verificar la conexión a la base de datos
    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : '';
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($conn, $_POST['apellido']) : '';
    $edad = isset($_POST['edad']) ? mysqli_real_escape_string($conn, $_POST['edad']) : '';

    if (!empty($nombre && !empty($apellido) && !empty($edad))) {
        // Generar un ID único
        $id = rand(1, 9999);

        $query = "INSERT INTO RegistroUsuarios (id, nombre,apellido,edad) VALUES ('$id', '$nombre','$apellido','$edad')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Datos insertados correctamente.";
        } else {
            echo "Error al insertar datos: " . mysqli_error($conn);
        }
    } else {
        echo "Por favor, complete todos los campos del formulario.";
    }

    mysqli_close($conn);
} else {
    header("Location: index.php");
    exit();
}
?>