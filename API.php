<?php
    
    error_reporting(E_ALL);
    
    require_once('DBHandler.php');
    
    //Recuperation variable de connexion
    $idLogin = $_POST["idLogin"];
    $passwordLogin = $_POST["passwordLogin"];
    
    //Recuperation variable d'inscription
    $idSignin = $_POST["idSignin"];
    $passwordSignin = $_POST["passwordSignin"];
    $prenomSignin = $_POST["prenomSignin"];;
    $nomSignin = $_POST["nomSignin"];;
    $emailSignin = $_POST["emailSignin"];;
    
    //Appel et ouverture de la db
    $DataB = new DB();
    $db = $DataB->openDB('testLogin.db');
	
    //Appel fonction connexion depuis la classe
//    $DataB->logIn($db, $idLogin, $passwordLogin);
    //Appel fonction inscription
//    $DataB->signIn($db, $idSignin, $passwordSignin, $prenomSignin, $nomSignin, $emailSignin);//$db, $idSignIn, $passwordSignIn
    
    //Appel fonction pour generer un nouveau mot de passe
//    $DataB->sendGeneratedPassword();
    
    //Appel de la fonction pour creer un nouveau mdp et l attribuer a la variable newMDP
//    $newMDP = $DataB->generatePassword();
	
	//Appel fonction pour faire un UPDATE de la db avec le nouveau mdp et l'envoyer par mail a l utilisateur
//    $DataB->sendGeneratedPassword($db, 'baguette666@gmail.com', $newMDP);//, $idLogin, $passwordLogin
