<?php
function inserta($conn){
    $nom=readline("inserta el nom de la tasca: ");
    $contingut=readline("inserta el contingut de la tasca: ");

    $sql = "INSERT INTO tasques.tasques (nom, contingut) 
    VALUES ('$nom', '$contingut')";

    if (mysqli_query($conn, $sql)===TRUE){
        echo "tasca afegida correctament.\n";
    }
    else{
        echo"Error al afegir la tasca, revisa la sintaxi: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn);
}
?>