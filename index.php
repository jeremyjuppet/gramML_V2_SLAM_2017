<!DOCTYPE html>
<html>
    <head>
		<title>Accueil</title>
		<link href="style.css" rel="stylesheet" type="text/css">
                
    </head>
	
    <body class="indexBack">
        
        <script language="Javascript">
            
            //Fonction veverefication des champs pour s'assurer qu'ils ne sont pas vide
            function verification(){ 

                //Recuperation des valeurs des inputs
                var login = document.getElementById("idLogin").value;
                var password = document.getElementById("passwordLogin").value;
                
                //Condition si login est nul alors on affiche l'alert et on renvoit sur la meme page a travers l'include 'index.php' dans le fichier loginDB.db
                if (login==null || login=="")
                {
                    alert("Veuillez entrer votre identifiant");
                    return false;
                }
                //Condition si password est nul alors on affiche l'alert et on renvoit sur la meme page a travers l'include 'index.php' dans le fichier loginDB.db
                else if (password==null || password=="")
                {
                    alert("Veuillez entrer votre mot de passe");
                    return false;
                }
            }
            
        </script>
        
	<header>
            <div class="header">
		<br>
                <a href="index.php">Accueil</a>
		<a href="http://christopher.rolin.free.fr/img/back.jpg">???</a>
		<br>
            </div>
	</header>
		
	<form method="POST" action="loginDB.php" class="inscription" name="myForm">
            <br>
            <div class="label">
		<h1>GramML.</h1>
            </div>			
            <input type="text" id="idLogin" name="idLogin" placeholder="Identifiant" value=""><br>
            <input type="password" id="passwordLogin" name="passwordLogin" placeholder="Mot de passe" value=""><br>
            <input onclick="verification()" type="submit" value="Se Connecter"><br>
            <br/><a href="interface_inscription.php">Je m'inscris</a>
        </form>
                
	<footer>
            <a id="lien_inscription" href="interface_index.php">A Propos</a>
            
	</footer>
    </body>
</html>