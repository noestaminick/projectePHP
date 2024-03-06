<?php
function mostra($conn){
    $id=readline("inserta l'ID del client: (entra 0 per mostrar-los tots) ");
    if ($id > 0) {
        $sql = "SELECT * FROM clients.clients WHERE ID=$id";

        $resultat = mysqli_query($conn, $sql);

        if(mysqli_num_rows($resultat) > 0) {
            $client = mysqli_fetch_assoc($resultat);
            echo "ID: " . $client['ID']. "\n";
            echo "nom: " . $client['nom']. "\n";
            echo "poblacio: " . $client['poblacio']. "\n";
        } else {
            echo "No s'ha trobat cap client amb aquest ID.\n";
        }
    } if ($id==0) {
        $sql = "SELECT * FROM clients";
        $resultat = mysqli_query($conn, $sql);
        echo "Llista d'usuaris:\n";
        while ($fila = mysqli_fetch_assoc($resultat)) {
            echo "{$fila['ID']} - {$fila['nom']} - {$fila['poblacio']}\n";
        }
    }    
    mysqli_close($conn);
}
?>