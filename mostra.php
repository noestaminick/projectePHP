<?php
function mostra($conn){
    $id=readline("inserta l'ID de la tasca: (entra 0 per mostrar-les totes) ");
    if ($id > 0) {
        $sql = "SELECT * FROM tasques.tasques WHERE ID=$id";

        $resultat = mysqli_query($conn, $sql);

        if(mysqli_num_rows($resultat) > 0) {
            $tasca = mysqli_fetch_assoc($resultat);
            echo "ID: " . $tasca['ID']. "\n";
            echo "nom: " . $tasca['nom']. "\n";
            echo "contingut: " . $tasca['contingut']. "\n";
        } else {
            echo "No s'ha trobat cap tasca amb aquesta ID.\n";
        }
    } if ($id==0) {
        $sql = "SELECT * FROM tasques";
        $resultat = mysqli_query($conn, $sql);
        echo "Llista de tasques:\n";
        while ($fila = mysqli_fetch_assoc($resultat)) {
            echo "{$fila['ID']} - {$fila['nom']} - {$fila['contingut']}\n";
        }
    }    
    mysqli_close($conn);
}
?>