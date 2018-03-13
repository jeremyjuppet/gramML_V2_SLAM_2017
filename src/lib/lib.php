<?php
$db= new SQLite3('..\gramml.db');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function debug($variable){
    echo "var dump : \n";
    var_dump($variable);
    echo "\n print_r : \n";
    print_r($variable);
    echo "\n printf : \n";
    printf($variable);
    echo "\n echo : \n";
    echo $variable;
}
function showListEx(){
    $requeteShow = "SELECT nom_exercice FROM Exercices";
    $requeteShowList= $GLOBALS["db"]->query($requeteShow);
    return $requeteShowList;
}
function getAllEx($db){
	$req= "SELECT * FROM Exercices";
	$t = $db->query($req);
	return $t;
}
function insertEx($db){
   $requete="INSERT INTO Exercices(nom_exercice,fk_niveau,fk_classe,enonce,fk_section,fk_typeExercice,fk_professeur) VALUES ('Exercice1',1,2,'Différentes consignes vous seront exposé au fur et a mesure de votre avancement.',6,8,3);";
   $db->query($requete);
   
}
//pour test
function insertLec($db){
   $requete="INSERT INTO Lecons (nom_lecon,lecon) VALUES ('Tutoriel','Leçon 1');";
   $db->query($requete);
   
}
function getAllLecon($db){
	$req= "SELECT * FROM Lecons";
	$t = $db->query($req);
	return $t;
}
function getExoByID($db, $id){
	$req= "SELECT * FROM Exercices WHERE pk_exercice=$id";
	$t = $db->query($req);
	return $t;
}

?>