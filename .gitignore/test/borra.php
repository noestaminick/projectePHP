<?php
function borra($conn){
    if (!$conn){
        die("Error de conexió: ". mysqli_connect_error());
    }    

    $sql= "SELECT *FROM tasks"; 
    $result= mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        echo "selecciona el client que vols borrar:\n";
        $tasks=array();
        while($row=mysqli_fetch_assoc($result)){
        $tasks[]=$row;
        echo count($tasks) . ".ID: " . $row['task_id'] . ", Nombre: " .$row['task_name'] ."\n";
        }
        
        $choice=readline("");
    }
}
?>