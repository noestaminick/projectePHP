<?php

if (php_sapi_name()!="cli"){
    echo "Executa l'aplicació a través del CLI\n";
    die();
}

include 'repoTaskManager.php';
$conexio=OpenConn();

$options=getopt('s:h');

function ayuda() {
    echo "IMPORTANT: A l'hora d'escriure la comanda has de tenir en compte les majúscules i les minúscules.\n";
    echo "mostra: Cerca la tasca a través de la seva ID o les mostra totes.\n";
    echo "agrega: Afageix una tasca a la llista.\n";
    echo "completa: Marca una tasca com a finalitzada.\n";
    echo "esborra: Elimina una tasca.\n";
    echo "ajuda: Mostra les comandes que es mostren.\n";
}

if ($argc<2 || isset($options["h"])) {
 ayuda();
 exit(1);
}

$command = $options['s'];
$comandofinal = strtolower($command);

switch($comandofinal){
    case 'mostra':
        mostra($conexio);
        break;
    case 'agrega':
        inserta($conexio); 
        break;
    case 'completa':
        completa($conexio);   
        break;
    case 'esborra':
        borra($conexio);
    default:
        ayuda();
        break;
}
?>