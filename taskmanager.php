<?php
include 'OpenConn.php';
include 'borra.php';
include 'inserta.php';
include 'mostra.php';

$conexio=OpenConn();

echo "Selecciona una opció:\n";
echo "1. Veure usuaris\n";
echo "2. Agregar usuaris\n";
echo "3. Borrar usuaris\n";

$opcio=readline("Opció: ");

switch($opcio){
    case '1':
        $usuaris=mostra($conexio);
        break;
    case '2':
        $usuaris=inserta($conexio); 
        break;
    case '3':
        $usuaris=borra($conexio);   
        break;
}
?>