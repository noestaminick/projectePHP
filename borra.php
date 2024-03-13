<?php
function borra($conn){
    if (!$conn){
        die("Error de conexió: ". mysqli_connect_error());
    }    

    $id_borrar = readline("ID de la tasca a borrar: ");

    $sql_borrar = "DELETE FROM tasques.tasques WHERE ID=$id_borrar";
    
    if($conn->query($sql_borrar) === TRUE){
        echo "Tasca eliminada amb èxit\n";
    } else{
        echo "Error al eliminar la tasca " . $conn->error. "\n";
    }
    
    mysqli_close($conn);  
}
?>