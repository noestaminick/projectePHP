<?php
include 'repoTaskmanager.php';
function menu(){
    
do{
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
            mostra($conexio);
            break;
        case '2':
            inserta($conexio); 
            break;
        case '3':
            completa($conexio);   
            break;
        case '4':
            borra($conexio);
            break;
        case '5':
            die("Adéu.\n");
        default:
            echo"Opció invàlida, torna a provar.\n";
        }
    }while($opcio!='5');
}
menu();
?>