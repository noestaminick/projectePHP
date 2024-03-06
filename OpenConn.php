<?php
function OpenConn()
{
    $servername="localhost";
    $username="xavi";
    $password="admin";
    $dbname="clients";
    $table="clients";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Ha fallat la conexió: " . $conn->connect_error);
    }
    return $conn;
}
$conn = OpenConn();
?>