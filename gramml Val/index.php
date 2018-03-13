<?php
include 'lib/lib.php';
$db = new SQLite3('gramml.db');
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <form action="content\exercice.php" method="post">
            <button type="submit">Exercice</button>
        </form>
        
        <form action="content\currentEx.php" method="post">
            <button type="submit">Exercice en cours</button>
        </form>
        
        <form action="content\lesson.php" method="post">
            <button type="submit">Leçon</button>
        </form>
        
        <form action="content\cible.php" method="post">
        <p>
            <input type="text" name="prenom" />
            <input type="submit" value="Valider" />
        </p>
        </form>
        <?php        
        ?>
    </body>
</html>
