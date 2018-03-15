<?php

/**
 * Connexion à la DB.
 * @author Théo Ségard
 * @return $db la classe --> base de donnée
 */
function connexionDb()
{
    try
    {
            $db = new SQLite3('gramml.db');
            /* parametre 0666 ne marche pas ! */
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
    return $db;
}


//deleteExo.php

/**
 * Fonction qui efface un exo.
 * @author Théo Ségard
 */
function deleteExo($db, $id)
{
    $query = "DELETE FROM exercices WHERE pk_exercice = $id;";
    $id = intval($id);
    if($db->exec($query) != TRUE)
    {
        echo "<h1 style='color: red; font-weight: bold;'>ERREUR requête delete pour l'id : $id</h1>";
    }
}

//envoiExo.php

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
function insertExo($db, $nomExo, $enonce, $correction, $phrase_base)
{
    echo "fonctyion";
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

//interfaceProf.php

/**
 * Fonction qui debug le code.
 * @author Théo Ségard
 * @param $variable la variable à debugger 
 * @param $label phrase décrivant la situation
 */
        function debug($variable,$label='')
        {
            global $trace;
            global $flag_debug;
            
            if ($flag_debug==1) return;
            $trace++;
            echo "<HR/>";
            echo $trace." : $label\n<br/>";
            var_dump($variable);
            echo "<HR/>"; 
        }
        
  /**
  * Fonction qui Affiche les lignes d'un tableau.
  * @author Théo Ségard
  * @param $tab le tableau à afficher
  */
        
        function AfficheLigneTableau($tab)
        {
            foreach ($tab as $key => $value)
            {
                echo $key." : ".$value;
            }
        }
?>