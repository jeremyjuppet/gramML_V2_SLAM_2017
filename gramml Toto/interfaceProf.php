<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title></title>
    </head>
    <body>
        <?php
        error_reporting(E_ALL);
        
        include "lib.php";
        
        // Variables :
        $trace=0;
        $flag_debug=0;      

            /**
             * Fais une requete sql et affiche chaque nom_exercice, enonce et phrase d'exemple de la table Exercices.
             * Chaque exo et enonce s'affiche dans une balise <p> avec un id commun
             * @author Théo Ségard
             * @param $db Base de donnée
             */
            function showExos_InterfaceProf($db)
            {     
                 $i = 0;
                $result = $db->query("SELECT Exercices.pk_exercice, phrase, Exercices.nom_exercice, Exercices.enonce, Corrections.correction FROM Exercices INNER JOIN Corrections ON Exercices.fk_correction = Corrections.pk_correction;");
                while($test = $result->fetchArray())
                {
                    $id = $test['pk_exercice'];
                    
                    //Affichage des exos :
                    echo "<p id='nom_exo'>".$test['nom_exercice']."</p>";
                    echo "<p id='enonce'>".$test['enonce']."</p>";
                    echo "<p id='correction'>".$test['correction']."</p>";
                    echo "<p id='phrase_base'>".$test['phrase']."</p>";
                    
                    //Boutton effacer :
                    echo "<form action='deleteExo.php' method='POST'>
                    <input name='id' type='hidden' value='$id'> 
                    <input type='submit' class='btn btn-default' value='Effacer'>
                    </form>";                 
                    $i++;
                }
            }
            
            $db=connexionDb();
            showExos_InterfaceProf($db);
        ?>
        <form action='FormulaireInsertExo.php'>                
            <input type='submit' class='btn btn-default' value='créer un exo'>
        </form>
    </body>
</html>