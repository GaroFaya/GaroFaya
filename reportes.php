<?php
include 'conexion.php'; // Incluye el archivo de conexión

// Consulta SQL para obtener todos los usuarios
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

// Verifica si hay resultados
if ($result->num_rows > 0) {
    // Mostrar los datos en una tabla HTML
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Sexo</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Usuario</th>
                <th>Clave</th>
                <th>Celular</th>
                <th>Plan</th>
                <th>Tipo de Plan</th>
                <th>Estado</th>
            </tr>";

    // Mostrar los datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nombres"] . "</td>
                <td>" . $row["apellidos"] . "</td>
                <td>" . $row["sexo"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["direccion"] . "</td>
                <td>" . $row["usuario"] . "</td>
                <td>" . $row["clave"] . "</td>
                <td>" . $row["celular"] . "</td>
                <td>" . $row["plan"] . "</td>
                <td>" . $row["tipo_plan"] . "</td>
                <td>" . $row["estado"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay usuarios registrados.";
}

// Cerrar la conexión
$conn->close();
?>
