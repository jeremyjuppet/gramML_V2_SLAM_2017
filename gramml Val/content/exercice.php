<?php
$db= new SQLite3('..\gramml.db');
include '..\lib\lib.php';
?>


<html>
<head>
        <meta charset="UTF-8">
        <title>Exercice</title>
</head>
        <body>
            <h1>Interface élèves</h1>
            <form method="post" action="" style="text-align:center;" >
                    <input type="hidden" name="nameEx" value= <?php insertEx($db);?> >
                    <input type="submit" name="Submit" value="Envoyer exercices">
            </form>
			 <form method="post" action="" style="text-align:center;" >
                    <input type="hidden" name="nameEx" value= <?php insertLec($db);?> >
                    <input type="submit" name="Submit" value="Envoyer leçons">
                </form>
            <?php
				//LECON
                $allLec=getAllLecon($db);
				
                while ($row = $allLec->fetchArray(SQLITE3_ASSOC )) {
                    $nomLecon = $row['nom_lecon'];
					$lecon = $row['lecon'];
				}
				echo "<div id='navbar'>
						<div id='listeexercices'>
							<h1>Liste leçons</h1>
							<ul>
								<li>$nomLecon</li>
								<li>$nomLecon</li>
								<li>$nomLecon</li>
								<li>$nomLecon</li>
								<li>$nomLecon</li>
							</ul>
						</div>";
				//Exercices
                $allEx=getAllEx($db);
				
				
                echo "<table border=1 cellpadding=3 cellspacing=1>
				<thead>
					<tr>
						<td><b>Nom Exercice</b></td>
						<td><b>Niveau</b></td>
						<td><b>Classe</b></td>
						<td><b>Enoncé</b></td>
						<td><b>Section</b></td>
						<td><b>Type d'exercice</b></td>
						<td><b>Professeur</b></td>
					</tr>
				</thead>";
                while ($row = $allEx->fetchArray(SQLITE3_ASSOC )) {
					$pk_Exercice = $row['pk_exercice'];
                    $nomExercice = $row['nom_exercice'];
					$level = $row['fk_niveau'];
					$classe = $row['fk_classe'];
					$enonce = $row['enonce'];
					$section = $row['fk_section'];
					$typeEx = $row['fk_typeExercice'];
					$professeur = $row['fk_professeur'];
                    
                    echo "<tr>
					<td>$nomExercice</td>
					<td>$level</td>
					<td>$classe</td>
					<td>$enonce</td>
					<td>$section</td>
					<td>$typeEx</td>
					<td>$professeur</td></tr>";
					
					
					
				}
				echo"<form method='post' action='traitement.php'>
							   <p>
								   <label for='ameliorer'>
								   <b>Enoncé</b>
								   </label>
								   <br />
								   
								   <textarea name='ameliorer' id='ameliorer' rows='10' cols='50'>";
								   echo $enonce;
								  echo "</textarea>       
							   </p>
							</form>";
				
								   
				
					
				echo "<div id='navbar'>
						<div id='listeexercices'>
							<h1>Exercices</h1>
							<ul>
								<li>$nomExercice</li>
								<li>$nomExercice</li>
								<li>$nomExercice</li>
								<li>$nomExercice</li>
								<li>$nomExercice</li>
							</ul>
						</div>";
						
                echo "</table>";
		echo '	<footer style="background:#ccc;left:0;bottom:0;width:100%;padding-top:50px;height:50px;">
                            <button>
                                    <a style="text-decoration:none;color: black" href="..\index.php">Page précédente</a>
                            </button>
                        </footer>';
            
				
			            ?>
						echo "<div id='navbar'>
						<div id='listeexercices'>
							<h1>Exercices</h1>
							<ul>
								<li><?php$nomExercice?></li>
								<li>$nomExercice</li>
								<li>$nomExercice</li>
								<li>$nomExercice</li>
								<li>$nomExercice</li>
							</ul>
						</div>";
        </body>
</html>
