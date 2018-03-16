<?php

    error_reporting(E_ALL);
    
    require_once('DBHandler.php');
    
    include 'index.php';
    
    $idLogin = $_POST["idLogin"];
    $passwordLogin = $_POST["passwordLogin"];
    //Appel d'une nouvelle classe DB contenant toutes nos fonctions concernant la connexion et l'inscription
    $DataB = new DB();
    //Recupération du nom de la db a ouvrir
    $nomDB = $DataB->nomDB;
    //Appel de la fonction open pour se connecter a la db
    $db = $DataB->openDB($nomDB);
	
    //Appel fonction connexion depuis la classe SI l'id et le mdp ne sont pas vide
    if(isset($idLogin) && $idLogin != '' && isset($passwordLogin) && $passwordLogin != ''){
        
        //On va appeler la fonction logIn de la classe DB a travers $DataB
        if($DataB->logIn($db, $idLogin, $passwordLogin)==false){
            
//            header('Location: index.php');
//            echo "<script type='text/javascript'>alert(Connexion impossible ! Identifiant ou mot de passe incorrect !);</script>";
                    
        }
        
    }
    //Traitement du cas si la connexion est refusé
    else if(empty($idLogin)){
                                
        //Affichage de toutes les variables dans la console php pour vérifier le contenu des variables
        error_log("loginDB.php: Erreur login",0);
        error_log("loginDB.php: var idLogin = ".$idLogin,0);
        
    }
    else if(empty($passwordLogin)){
        
        //Affichage de toutes les variables dans la console php pour vérifier le contenu des variables
        error_log("loginDB.php: Erreur login",0);
        error_log("loginDB.php: var passwordLogin = ".$passwordLogin,0);
        
    }
    else{
        
        error_log("loginDB.php: Condition non traitée",0);
        
    }