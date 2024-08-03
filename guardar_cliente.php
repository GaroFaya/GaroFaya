<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Mostrar errores para ayudar a depurar
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificar si la solicitud es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $peso = isset($_POST['peso']) ? $_POST['peso'] : null;
    $talla = isset($_POST['talla']) ? $_POST['talla'] : null;
    $isotipo = isset($_POST['isotipo']) ? $_POST['isotipo'] : null;
    $edad = isset($_POST['edad']) ? $_POST['edad'] : null;
    $actividad_fisica = isset($_POST['actividad_fisica']) ? $_POST['actividad_fisica'] : null;
    $indice_masa = isset($_POST['indice_masa']) ? $_POST['indice_masa'] : null;
    $indice_grasa = isset($_POST['indice_grasa']) ? $_POST['indice_grasa'] : null;

    // Verificar si todos los datos están presentes
    if ($peso && $talla && $isotipo && $edad && $actividad_fisica && $indice_masa && $indice_grasa) {
        // Obtener el ID del usuario correspondiente
        // Aquí debes implementar la lógica para obtener el ID del usuario adecuado
        $id_usuario = 1; // Por ejemplo, un valor temporal fijo

        // Verificar que el usuario exista antes de insertar
        $query = "SELECT id FROM usuarios WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Preparar la inserción en la tabla cliente
            $sql = "INSERT INTO cliente (id_usuario, peso, talla, isotipo, edad, actividad_fisica, indice_masa, indice_grasa)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            // Preparar la declaración
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                // Vincular parámetros
                $stmt->bind_param("iddsdsdd", $id_usuario, $peso, $talla, $isotipo, $edad, $actividad_fisica, $indice_masa, $indice_grasa);

                // Ejecutar la declaración
                if ($stmt->execute()) {
                    echo "Registro exitoso";
                } else {
                    echo "Error al registrar: " . $stmt->error;
                }
                // Cerrar la declaración
                $stmt->close();
            } else {
                echo "Error al preparar la declaración: " . $conn->error;
            }
        } else {
            echo "El usuario no existe.";
        }
    } else {
        echo "Datos incompletos en el formulario.";
    }
} else {
    echo "El formulario no fue enviado.";
}

// Cerrar la conexión
$conn->close();
?>
