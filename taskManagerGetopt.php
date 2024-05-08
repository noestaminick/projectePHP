<?php

if (PHP_SAPI!="cli"){
    echo "Executa l'aplicació a través del CLI\n";
    die();
}

require 'repoTaskManager.php';
$conexio=OpenConn();

$options=getopt('s:a:c:d:h:i:');
var_dump($options);

if ($argc<2 || isset($options["h"])) {
    echo "-s: Mostra les tasques.\n";
    echo "-a: Agrega una tasca.\n";
    echo "-c: Completa una tasca.\n";
    echo "-d: Esborra una tasca.\n";
    echo "-i: Obre el menú interactiu en el CLI.\n";
    echo "-h: Mostra aquesta ajuda.\n";
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
    case 's':
        $usuaris=mostra($conexio);
        break;
    case 'a':
        $usuaris=inserta($conexio); 
        break;
    case 'c':
        $usuaris=completa($conexio);   
        break;
    case 'd':
        $usuaris=borra($conexio);
    case '5':
        die("Adéu.\n");
}
?>