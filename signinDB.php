<?php

    error_reporting(E_ALL);
    
    require_once('DBHandler.php');
        
    //Recuperation variable d'inscription
    $idSignin = $_POST["idSignin"];
    $passwordSignin = $_POST["passwordSignin"];
    $prenomSignin = $_POST["prenomSignin"];;
    $nomSignin = $_POST["nomSignin"];;
    $emailSignin = $_POST["emailSignin"];;
    
    //Appel d'une nouvelle classe DB contenant toutes nos fonctions concernant la connexion et l'inscription
    $DataB = new DB();
    //Recupération du nom de la db a ouvrir
    $nomDB = $DataB->nomDB;
    //Appel de la fonction open pour se connecter a la db
    $db = $DataB->openDB($nomDB);
	
    //Appel fonction inscription
    if(isset($idSignin) && isset($passwordSignin) && isset($prenomSignin) && isset($nomSignin) && isset($emailSignin)){
    
        //On va appeler la fonction signIn de la classe DB a travers $DataB
        $DataB->signIn($db, $idSignin, $passwordSignin, $prenomSignin, $nomSignin, $emailSignin);
        
    }
    //Traitement du cas ou l'inscription est un echec car l'une des varaibles est vide
    else{
        
        //Redirection sur l'inscription
        header('Location: interface_inscription.php');
        
        //Affichage de toutes les variables dans la console php pour vérifier le contenu des variables
        error_log("signinDB.php: Erreur login",0);
        error_log("signinDB.php: var idSignin = ".$idSignin,0);
        error_log("signinDB.php: var passwordSignin = ".$passwordSignin,0);
        error_log("signinDB.php: var prenomSignin = ".$prenomSignin,0);
        error_log("signinDB.php: var nomSignin = ".$nomSignin,0);
        error_log("signinDB.php: var emailSignin = ".$emailSignin,0);
        
    }