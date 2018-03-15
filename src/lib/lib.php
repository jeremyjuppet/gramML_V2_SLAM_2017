<?php
$basedir = 'C:\Users\vpoujade\Documents\www';
$db= new SQLite3($basedir.'\src\db\gramml.db');
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
                            
                             $listeExos .= "<a href='interface_menu_prof.php?exo_id=$pkExercice'><li>";
                             $listeExos .= "$nomExercice</li></a>";
                        }
    return $listeExos;
}

function getAllInfoExoById($id){

    if($id == 0)
    {
        $professeur = 0;
        $typeEx=0;
        $section=0;
        $enonce="";
        $phrase="";
        $classe=0;
        $level=0;
        $correction=0;
        $nomExercice = "Insérer nom";
        $infoExo= array(
            "nomExercice" =>$nomExercice, 
            "level" =>$level,
            "classe" =>$classe,
            "enonce" =>$enonce,
            "phrase" =>$phrase,
            "section" =>$section,
            "typeEx" =>$typeEx,
            "professeur" =>$professeur,
            "correction" =>$correction
        );

        return $infoExo;
    }
    
    $exById=getExoByID($id);
    
    while ($row = $exById->fetchArray(SQLITE3_ASSOC )) {
        $pkExercice = $row['pk_exercice'];
        $nomExercice = $row['nom_exercice'];
        $level = $row['fk_niveau'];
        $classe = $row['fk_classe'];
        $enonce = $row['enonce'];
        $phrase = $row['phrase'];
        $section = $row['fk_section'];
        $typeEx = $row['fk_typeExercice'];
        $professeur = $row['fk_professeur'];
        $correction = $row['fk_correction'];
    }
    $infoExo= array(
        "nomExercice" =>$nomExercice, 
        "level" =>$level,
        "classe" =>$classe,
        "enonce" =>$enonce,
        "phrase" =>$phrase,
        "section" =>$section,
        "typeEx" =>$typeEx,
        "professeur" =>$professeur,
        "correction" =>$correction
    );
    return $infoExo;
      //echo '<input type="text" placeholder="'."$nomExercice | id : $pkExercice ".'"/>';   
}

/**
 * Fonction qui efface un exo.
 * @author Théo Ségard
 */
function deleteExo($id)
{
    GLOBAL $db;
    $query = "DELETE FROM exercices WHERE pk_exercice = $id;";
    $id = intval($id);
    if($db->exec($query) != TRUE)
    {
        echo "<h1 style='color: red; font-weight: bold;'>ERREUR requête delete pour l'id : $id</h1>";
    }
}

/**
 * Fonction qui créé un exo.
 * @author Théo Ségard
 * @param $db la classe base de donnée
 * @param $db la classe base de donnée
 * @param $nomExo nom de l'exo
 * @param $enonce enone de l'exo
 * @param $correction la correction de l'exo
 * @param $phrase_base la phrase d'expemple de l'exo
 */
function insertExo($nomExo, $enonce, $correction, $phrase_base)
{
    GLOBAL $db;
    $query2 = 'INSERT INTO Corrections(correction) VALUES("'.$correction.'");';
    if($db->exec($query2) != TRUE)
    {
        echo "<h1 style='color: red; font-weight: bold;'>ERREUR requête insert pour Corrections</h1>";
    }
    var_dump($correction);
    $result = $db->query('SELECT pk_correction FROM Corrections WHERE correction = "'.$correction.'";');       
    while($donnee = $result->fetchArray())
    {
        $pk_correction = $donnee['pk_correction'];
    }
    $query = "INSERT INTO Exercices(nom_exercice, enonce, fk_correction, phrase) VALUES('$nomExo','$enonce', $pk_correction, '$phrase_base' );";
    if($db->exec($query) != TRUE)
    {
        echo "<h1 style='color: red; font-weight: bold;'>ERREUR requête insert pour table exercices</h1>";
    }
    
}
?>