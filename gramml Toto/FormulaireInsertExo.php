<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title>Formulaire - créer exercice</title>
    </head>
    <body>
        <form id="exo_form" method="post" action="envoiExo.php">
                     <div class="header_exo">
                         <input type="text" name="nom_exercice" placeholder="Nom de l'exercice"/>
                     </div>
                     
                     <h2>Consigne :</h2>
                     <textarea name="enonce" cols="50" row="5"></textarea>
                     <textarea name="phrase_base" id="phrase_base" cols="50" row="5"></textarea>
                     
                     <h2>Correction :</h2>
                     
                     <textarea name="correction" id="phrase_codee" rows="15" cols="100%">&lt;cp&gt;Depuis le haut jusqu'en bas&lt;/cp&gt;, &lt;sujet&gt;les souris&lt;/sujet&gt; &lt;verbe&gt;chassent&lt;/verbe&gt; &lt;cv&gt;les chats &lt;sub&gt;&lt;sujet&gt;qui&lt;/sujet&gt; &lt;verbe&gt;mangent&lt;/verbe&gt; &lt;cv&gt;du fromage&lt;/cv&gt;&lt;/sub&gt;&lt;/cv&gt;</textarea>
                     <br/>
					 
                     <button type="button" class="prev_button" onclick="analyse();">Prévisualiser la phrase</button>
                     
                     <input type="submit" value="Valider l'exercice"/>
					   
                     
                     <br/>
					
					</form> 
  
    </body>
</html>