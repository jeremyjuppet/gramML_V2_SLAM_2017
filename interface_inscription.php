<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
    </head>
    <body>
        <h1>Inscription:</h1>
        <form action="signinDB.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="idSignin" placeholder="Entrez votre identifiant"><br>
            <input type="password" name="passwordSignin" placeholder="Entrez votre mot de passe"><br>
            <input type="text" name="prenomSignin" placeholder="Entrez votre prénom"><br>
            <input type="text" name="nomSignin" placeholder="Entrez votre nom"><br>
            <input type="text" name="emailSignin" placeholder="Entrez votre adresse email"><br>
            <button action="submit">Se connecter</button>
        </form>
    </body>
</html>
