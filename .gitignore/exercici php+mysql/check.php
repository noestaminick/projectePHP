<?php
// Datos de conexión a la base de datos
$host = 'localhost';
$usuario = 'xavi';
$password = 'admin';
$base_de_datos = 'clients';
$table='clients';

// Conexión a la base de datos
$conexion = new mysqli($host, $usuario, $password, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Operación de lectura (SELECT)
$sql_select = "SELECT id, nom, poblacio FROM clients";
$resultado_select = $conexion->query($sql_select);

echo "Lista de Usuarios:\n";
while ($fila = $resultado_select->fetch_assoc()) {
    echo "{$fila['id']} - {$fila['nom']} - {$fila['poblacio']}\n";
}

// Operación de inserción (INSERT)
$nom = readline("Introduce el nom del nuevo usuario: ");
$poblacio = readline("Introduce el poblacio del nuevo usuario: ");

$sql_insert = "INSERT INTO clients (nom, poblacio) VALUES ('$nom', '$poblacio')";
if ($conexion->query($sql_insert) === TRUE) {
    echo "Usuario agregado correctamente.\n";
} else {
    echo "Error al agregar usuario: " . $conexion->error . "\n";
}

// Operación de actualización (UPDATE)
$id_a_actualizar = readline("Introduce el ID del usuario a actualizar: ");
$nuevo_nombre = readline("Introduce el nuevo nom: ");
$nuevo_email = readline("Introduce el nuevo poblacio: ");

$sql_update = "UPDATE clients SET nom='$nuevo_nombre', poblacio='$nuevo_email' WHERE id=$id_a_actualizar";
if ($conexion->query($sql_update) === TRUE) {
    echo "Usuario actualizado correctamente.\n";
} else {
    echo "Error al actualizar usuario: " . $conexion->error . "\n";
}

// Operación de eliminación (DELETE)
$id_a_borrar = readline("Introduce el ID del usuario a borrar: ");

$sql_delete = "DELETE FROM clients WHERE id=$id_a_borrar";
if ($conexion->query($sql_delete) === TRUE) {
    echo "Usuario eliminado correctamente.\n";
} else {
    echo "Error al eliminar usuario: " . $conexion->error . "\n";
}

// Cerrar conexión
$conexion->close();
?>
