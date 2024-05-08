<?php

if (PHP_SAPI!="cli"){
    echo "Executa l'aplicació a través del CLI\n";
    die();
}

require 'repoTaskManager.php';
$conexio=OpenConn();

$options=getopt('s:a:c:d');
var_dump($options);

if ($args<2) {
    
}

echo chr(27).chr(91). 'H'.chr(27).chr(91).'J';
echo "Selecciona una opció:\n";
echo "1. Veure tasques\n";
echo "2. Agregar tasca\n";
echo "3. Completar tasca\n";
echo "4. Borrar tasca\n";
echo "5. Surt del programa\n";

$opcio=readline("Opció: ");

switch($opcio){
    case '1':
        $usuaris=mostra($conexio);
        break;
    case '2':
        $usuaris=inserta($conexio); 
        break;
    case '3':
        $usuaris=completa($conexio);   
        break;
    case '4':
        $usuaris=borra($conexio);
    case '5':
        die("Adéu.\n");
}
?>