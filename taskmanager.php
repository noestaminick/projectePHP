<?php

if (PHP_SAPI!="cli"){
    echo "Executa l'aplicació a través del CLI\n";
    return 0;
}

include 'repoTaskManager.php';
$conexio=OpenConn();

echo "Selecciona una opció:\n";
echo "1. Veure tasques\n";
echo "2. Agregar tasca\n";
echo "3. Borrar tasca\n";

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