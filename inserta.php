<?php
function inserta($conn){
    $nom=readline("inserta el nom del client: ");
    $poblacio=readline("inserta la població del client: ");

    $sql = "INSERT INTO clients.clients (nom, poblacio) 
    VALUES ('$nom', '$poblacio')";

    if (mysqli_query($conn, $sql)===TRUE){
        echo "client afegit correctament\n";
    }
    else{
        echo"Error al afegir l'usuari, revisa la sintaxi: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn);
}
?>