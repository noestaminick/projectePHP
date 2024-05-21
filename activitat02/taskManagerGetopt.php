<?php

if (php_sapi_name()!="cli"){
    echo "Executa l'aplicació a través del CLI\n";
    die();
}

include 'repoTaskManager.php';

if ($argc<2) {
    echo "En la sintaxi has d'incloure el format en el que vols guardar les dades./n";
    echo"Exemple: php repoTaskManagerGetopt.php (sqlite o mysql)./n";
    exit(1);
}

$tipusdb=strtolower($argv[1]);
$conexio=OpenConn($tipusdb);

$options=getopt('s:i:h');

if ($argc<3 || isset($options["h"])) {
 ayuda();
 exit(1);
}

$command = $options['s'];
$comandofinal = strtolower($command);
$id =isset($options['i']) ? $options['i'] :'null';

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