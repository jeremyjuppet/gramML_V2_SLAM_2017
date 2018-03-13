<?php
include'style.css';
$db= new SQLite3('..\gramml.db');
include '..\lib\lib.php';
?>


<html>
<head>
		<meta charset="UTF-8">
       <title>Exercice</title>
		<link rel="stylesheet" type="text/css" href="style.css">
</head>
        <body>
			
            <h1>Liste des leçons</h1>
            <form  class="h1" method="post" action="" style="text-align:center;" >
                    <input type="hidden" name="nameEx" value= <?php insertLec($db);?> >
                    <input type="submit" name="Submit" value="Envoyer">
                </form>
            <?php
                $allLec=getAllLecon($db);
				
				
                echo "<table border=1 cellpadding=3 cellspacing=1>
				<thead>
					<tr>
						<td><b>Nom Lecon</b></td>
						<td><b>Lecon</b></td>
						
					</tr>
				</thead>";
                while ($row = $allLec->fetchArray(SQLITE3_ASSOC )) {
                    $nom = $row['nom_lecon'];
					$lecon = $row['lecon'];
					
                    echo "<tr>
					<td>$nom</td>
					<td>$lecon</td>
					</tr>";
				}
				
                echo "</table>";
		echo '	<footer style="background:#ccc;position:absolute;bottom:0;width:100%;padding-top:50px;height:50px;">
                            <button>
                                    <a style="text-decoration:none;color: black" href="..\index.php">Page précédente</a>
                            </button>
                        </footer>';
            
            ?>
        </body>
</html>
