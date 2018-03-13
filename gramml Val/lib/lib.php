<?php
$db= new SQLite3('..\gramml.db');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function showListEx(){
    $requeteShow = "SELECT nom_exercice FROM Exercices";
    $requeteShowList= $GLOBALS["db"]->query($requeteShow);
    return $requeteShowList;
}
//getallex
function getAllEx($db){
	$req= "SELECT * FROM Exercices";
	$t = $db->query($req);
	return $t;
}
function insertEx($db){
	$nom='Exercice1';
	$niveau=1;
	$classe=2;
	$enonce='Différentes consignes vous seront exposé au fur et a mesure de votre avancement.';
	$section=6;
	$type_Ex=8;
	$professeur=3;
	$requete="INSERT INTO Exercices(nom_exercice,fk_niveau,fk_classe,enonce,fk_section,fk_typeExercice,fk_professeur) VALUES ($nom,$niveau,$classe,$enonce,$section,$type_Ex,$professeur);";
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

?>