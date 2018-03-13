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
        <h1>Connexion:</h1>
        <form action="home.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="idLogin" placeholder="Entrez votre identifiant ou email"><br>
            <input type="password" name="passwordLogin" placeholder="Entrez votre mot de passe"><br>
            <button action="submit">Se connecter</button>
        </form>
    </body>
</html>
