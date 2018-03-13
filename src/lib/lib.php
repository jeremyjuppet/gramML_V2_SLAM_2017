<?php
$db= new SQLite3('src\db\gramml.db');
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
    GLOBAL $db;
    $requeteShow = "SELECT nom_exercice FROM Exercices";
    $requeteShowList= $db->query($requeteShow);
    return $requeteShowList;
}
function getAllEx(){
        GLOBAL $db;
	$req= "SELECT * FROM Exercices";
	$t = $db->query($req);
	return $t;
}
function insertEx(){
   GLOBAL $db; 
   $requete="INSERT INTO Exercices(nom_exercice,fk_niveau,fk_classe,enonce,fk_section,fk_typeExercice,fk_professeur) VALUES ('Exercice1',1,2,'Différentes consignes vous seront exposé au fur et a mesure de votre avancement.',6,8,3);";
   $db->query($requete);
   
}
//pour test
function insertLec(){
   GLOBAL $db;
   $requete="INSERT INTO Lecons (nom_lecon,lecon) VALUES ('Tutoriel','Leçon 1');";
   $db->query($requete);
   
}
function getAllLecon(){
        GLOBAL $db;
	$req= "SELECT * FROM Lecons";
	$t = $db->query($req);
	return $t;
}
function getExoByID($id){
	GLOBAL $db;
        $req= "SELECT * FROM Exercices WHERE pk_exercice=$id";
	$t = $db->query($req);
	return $t;
}

function listeExo(){
    $allEx=getAllEx();
    $listeExos = "";
    while ($row = $allEx->fetchArray(SQLITE3_ASSOC )) {
                            $nomExercice = $row['nom_exercice'];
                            $pkExercice = $row['pk_exercice'];
                            
                             $listeExos .= "<li><a href='interface_menu_prof.php?exo_id=$pkExercice'>";
                             $listeExos .= "id: $pkExercice | $nomExercice";
                             $listeExos .= "</li></a>";
                        }
    return $listeExos;
}

function getAllInfoExoById($id){
    
    $exById=getExoByID($id);
    
    while ($row = $exById->fetchArray(SQLITE3_ASSOC )) {
        $pkExercice = $row['pk_exercice'];
        $nomExercice = $row['nom_exercice'];
        $level = $row['fk_niveau'];
        $classe = $row['fk_classe'];
        $enonce = $row['enonce'];
        $section = $row['fk_section'];
        $typeEx = $row['fk_typeExercice'];
        $professeur = $row['fk_professeur'];
    }
    $infoExo= array(
        "nomExercice" =>$nomExercice, 
        "level" =>$level,
        "classe" =>$classe,
        "enonce" =>$enonce,
        "section" =>$section,
        "typeEx" =>$typeEx,
        "professeur" =>$professeur,
        //"phrase" =>$phrase
    );
    return $infoExo;
      //echo '<input type="text" placeholder="'."$nomExercice | id : $pkExercice ".'"/>';   
}
?>