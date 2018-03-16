<?php

include "..\lib\lib.php";
$id = $_POST['id'];
//main
$nomExo = $_POST['nom_exercice'];

$enonce = $_POST['enonce'];

$correction = $_POST['correction'];

$phrase_base = $_POST['phrase_base'];


insertExo($nomExo, $enonce, $correction, $phrase_base);
header('Location: ..\..\interface_menu_prof.php?exo_id=0');
?>