<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $conn = mysqli_connect('db', 'root', 'test', 'dbname');

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : '';
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($conn, $_POST['apellido']) : '';

    if (!empty($nombre) && !empty($apellido)) {
        $query = "INSERT INTO Person (name, apellido) VALUES ('$nombre', '$apellido')";
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