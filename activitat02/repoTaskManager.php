<?php

## Funció connecta
function OpenConn()
{
    $servername="localhost";
    $username="xavi";
    $password="admin";
    $dbname="tasques";
    

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Ha fallat la conexió: " . $conn->connect_error);
    }
    return $conn;
}
$conn = OpenConn();

##funció SQLite

function OpenConnSQLite(){
    $arxiudb= "tasques.db";
    $conn=newSQLite3($arxiudb);

    if(!$conn){
        die("Error en la connexió de la base de dades SQLite");
    }

    $conn->exec("CREATE TABLE IF NOT EXISTS tasques(
                    ID INTEGER PRIMARY KEY AUTOINCREMENT,
                    nom TEXT,
                    contingut TEXT,
                    estat TEXT DEFAULT 'Incomplet')");
    return $conn;
}

#funció escollir BBDD

function escull($tipusdb){
    if ($tipusdb=='sqlite') {
        return OpenConnSQLite();
    } 
    elseif ($tipusdb=='mysql'){
        return OpenConn();
    }
    else {
        die("Opció de base de dades no vàlida, revisa la sintàxi.");
    } 
}

## Funció inserta
function inserta($conn, $tipusdb){

    $nom=readline("inserta el nom de la tasca: ");
    $contingut=readline("inserta el contingut de la tasca: ");

    if ($tipusdb== "mysql") {
    $sql = "INSERT INTO tasques.tasques (nom, contingut) 
    VALUES ('$nom', '$contingut')";
    } 
    else { 
        $sql = "INSERT INTO tasques (nom,contingut) VALUES ('$nom', '$contingut')";
    }
    if (mysqli_query($conn, $sql)===TRUE){
        echo "tasca afegida correctament.\n";
    }
    else{
        echo"Error al afegir la tasca, revisa la sintaxi: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn);
}

## Funció mostra per ID
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
            echo "estat: " . $tasca['estat']. "\n";
        } else {
            echo "No s'ha trobat cap tasca amb aquesta ID.\n";
        }
    }

## mostra tot 
function mostraTot($conn,$tipusdb){
    $sql = "SELECT * FROM tasques";
    $resultat = mysqli_query($conn, $sql);
    echo "Llista de tasques:\n";
    if ($tipusdb=='mysql') {
        while ($fila = mysqli_fetch_assoc($resultat)) {
            echo "{$fila['ID']} - {$fila['nom']} - {$fila['contingut']} - {$fila['estat']}\n";
        }    
    }
    else {
        while ($fila=$resultat->fetch_array(SQLITE3_ASSOC)) {
            echo "{$fila['ID']} - {$fila['nom']} - {$fila['contingut']} - {$fila['estat']}\n";   
        }
    }
   
    }    
}

#Funció completa
function completa($conn){
    if(!$conn){
        die("Error de conexió: ". mysqli_connect_error());
    }
    $id_completa = readline("ID de la tasca que has completat: ");

    $sql_completa = "UPDATE tasques.tasques SET estat = 'Completat' WHERE ID=$id_completa";

    if($conn->query($sql_completa) === TRUE){
        echo "Tasca completada amb èxit\n";
    } else{
        echo "Error al completar la tasca " . $conn->error. "\n";
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

#funcio ajuda
function ayuda() {
    echo "mostra: Cerca la tasca a través de la seva ID o les mostra totes.\n";
    echo "agrega: Afageix una tasca a la llista.\n";
    echo "completa: Marca una tasca com a finalitzada.\n";
    echo "esborra: Elimina una tasca.\n";
    echo "ajuda: Mostra les comandes que es mostren.\n";
}

?>