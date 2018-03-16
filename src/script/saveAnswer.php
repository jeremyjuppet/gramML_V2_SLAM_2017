<?php
include "..\lib\lib.php";

//main
$id = $_POST['id'];
$correction = $_POST['reponse'];

$id = intval($id);

saveAnswerExo($id, $correction);
header('Location: ..\..\interface_menu_eleve.php');

?>