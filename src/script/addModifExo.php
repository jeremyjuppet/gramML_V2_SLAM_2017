<?php
include "..\lib\lib.php";

//main
$id = $_POST['id'];
$nomExo = $_POST['nom_exercice'];
$enonce = $_POST['consigne'];
$correction = $_POST['correction'];
$phrase_base = $_POST['phrase'];   

$id = intval($id);


if($id > 0){
    modifExo($id, $nomExo, $enonce, $correction, $phrase_base);
    header('Location: ..\..\interface_menu_prof.php?exo_id=0');
}
else{
    insertExo($nomExo, $enonce, $correction, $phrase_base);
    header('Location: ..\..\interface_menu_prof.php?exo_id=0');
}
?>