<?php
function borra($conn){
    if (!$conn){
        die("Error de conexió: ". mysqli_connect_error());
    }    

    $id_borrar = readline("ID del client a borrar: ");

    $sql_borrar = "DELETE FROM clients.clients WHERE ID=$id_borrar";
    
    if($conn->query($sql_borrar) === TRUE){
        echo "Client eliminat amb èxit\n";
    } else{
        echo "Error al eliminar l'usuari: " . $conn->error. "\n";
    }
    
    mysqli_close($conn);  
}
?>