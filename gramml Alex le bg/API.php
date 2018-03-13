<?php
    
    error_reporting(E_ALL);
    
//    include 'DBHandler.php';
    require_once('DBHandler.php');
    
    echo "Debut API.php\n";

    //R�cup�ration variable de connexion
    $idLogin = $_POST["idLogin"];
    $passwordLogin = $_POST["passwordLogin"];
    
    //Appel fonction connexion depuis la classe
    $DataB = new DB('testLogin.db');
//    logIn($db, $idLogin, $passwordLogin);
    
    //Appel fonction inscription
//    signIn($db, $idSignIn, $passwordSignIn);
    
    //Appel fonction pour g�n�rer un nouveau mot de passe
//    sendGeneratedPassword();
    
//    generatePassword();
    $datab = $DataB->openDB();
    $DataB->signIn($datab, $idLogin, $passwordLogin);