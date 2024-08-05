<?php
// Incluir el archivo de conexión
include 'conexion.php'; // Asegúrate de que la ruta sea correcta

// Consulta para obtener los datos de los usuarios
$sql = "SELECT id, nombres, apellidos, sexo, email, direccion, usuario, celular, plan, tipoPlan, estado FROM usuarios";
$result = $conn->query($sql);

// Verificar si la consulta devolvió resultados
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr>
            <th>IDENTIFICACIÓN</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Sexo</th>
            <th>Correo electrónico</th>
            <th>Dirección</th>
            <th>Usuario</th>
            <th>Celular</th>
            <th>Plan</th>
            <th>Tipo de plan</th>
            <th>Estado</th>
          </tr>";

    // Mostrar los datos en la tabla
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombres']}</td>
                <td>{$row['apellidos']}</td>
                <td>{$row['sexo']}</td>
                <td>{$row['email']}</td>
                <td>{$row['direccion']}</td>
                <td>{$row['usuario']}</td>
                <td>{$row['celular']}</td>
                <td>{$row['plan']}</td>
                <td>" . (isset($row['tipoPlan']) ? $row['tipoPlan'] : 'N/A') . "</td>
                <td>{$row['estado']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No hay usuarios registrados.";
}

// Cerrar la conexión
$conn->close();
?>
