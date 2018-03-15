<?php

include "..\lib\lib.php";

//main
$id = $_POST['id'];

deleteExo($id);
header('Location: ..\..\interface_menu_prof.php?exo_id=0');
?>