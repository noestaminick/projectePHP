<?php

## Funció connecta
function OpenConn()
{
    $servername="localhost";
    $username="xavi";
    $password="admin";
    $dbname="tasques";
    $table="tasques";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Ha fallat la conexió: " . $conn->connect_error);
    }
    return $conn;
}
$conn = OpenConn();

## Funció inserta
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

## Funció mostra
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

#Funcio Borra
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