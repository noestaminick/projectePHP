<?php

if (php_sapi_name()!="cli"){
    echo "Executa l'aplicació a través del CLI\n";
    die();
}

include 'repoTaskManager.php';
$conexio=OpenConn();

$options=getopt('s:h');

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