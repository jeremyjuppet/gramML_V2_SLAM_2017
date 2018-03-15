<!DOCTYPE html>

<?php
    include 'src\lib\lib.php';
    $listeExos = listeExoEleve();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>MenuProf</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="src/img/gramml_balises.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header class="header">
            <div>
                <a href="index.php">
                <img src="src/img/user.png" alt="user" align="right" style="margin-top:5px; margin-right:15px; width:40px;height:40px;-webkit-filter: drop-shadow(0px 0px 5px #222 );filter: drop-shadow(0px 0px 5px #222);">
                </a>
            </div>
            <?php
            
                include 'DBHandler.php';
                echo $_SESSION['identifiant'];
            
            ?>
        </header>
        
         <div id="navbar">
            <div id="listeexercices">
                <h1>Exercices</h1>
                <ul>
                    
                    <?php
                       echo $listeExos;
                    ?>
                </ul>
            </div>
             
             <div id="listeclasses">
                <h1>Classes</h1>
                <ul>
                    <li>Classe </li>
                </ul>
            </div>
          
        </div> 
        
        <div id="page">
            <div id="exo">
                <?php $id =$_GET['exo_id'];?>
                <form id='exo_form' > <!--action='src/script/envoiExo.php'method='post'-->
                <div class="header_exo">
                    <?php
                    $infoExo = getAllInfoExoByIdEleve($id);
                    ?>
                    <h1 name="nom_exercice" id="nomExo"><?=$infoExo['nomExercice']?></h1>    
                </div>
                   
                    
                     <h2>Consigne :</h2>
                        <div class="consigne" name="enonce" cols="50" row="5">
                            <p class="Enonce_phrase"><?=$infoExo['enonce'];?></p>
                        </div>
                        <div class="consigne" name="phrase_base" id="phrase_base" cols="50" row="5">
                            <p class="Enonce_phrase"><?=$infoExo['phrase'];?></p>
                        </div>
                     
                     <h2>Réponse :</h2>                    
                        <textarea name="response" id="phrase_codee" rows="15" cols="100%" value="Taper votre réponse ici."></textarea>
                        <br/>		 
                        <button type="button" class="prev_button" onclick="analyse();">Prévisualiser la phrase</button>
                        <input type="submit" class="prev_button" value="Valider l'exercice"/>
                        <br/>
					
                </form> 
                
                        <script type="text/javascript"><!--
							
                           function replaceAll(str, find, replace) {
                             return str.replace(new RegExp(find, 'gi'), replace);
                           }


                           var nouveauDiv = null;

                           function ajouteElement(type,contenu,idParent,idAfter,Id) {
                             var parent = null;

                             nouveauDiv = document.createElement(type);
                             nouveauDiv.setAttribute('id',id);
                             nouveauDiv.innerHTML = contenu;

                             parent = document.getElementById(idParent);
                             parent.insertBefore(nouveauDiv);

                           }
                           function defStyle(id,style){
                           }

                           function popIn(texte)
                           {



                           }

                           function popOut()
                           {


                           }

                           function action_sur_groupe_id(id){
                                   var groupe_parent;

                                   var groupe = document.getElementById(id);
                                   //alert(groupe.innerHTML);
                                   // if ( groupe.parentNode == document )
                                   { 
                                           groupe_parent = groupe.parentElement;
                                           //alert(groupe_parent.innerHTML);
                                   }
                                   //else alert('nodeType : '+groupe_parent.nodeType);
                           }


                           function grammlToCssEncode(phrase)
                                   {

                                   var tabConv=[
                                   ['<sujet>','<div class="fS" >'],
                                   ['</sujet>','</div>'],
                                   ['<verbe>','<div class="fV">'],
                                   ['</verbe>','</div>'],
                                   ['<attribut>','<div class="fAtt">'],
                                   ['</attribut>','</div>'],	
                                   ['<CV>','<div class="fCV">'],
                                   ['</CV>','</div>'],	
                                   ['<CP>','<div class="fCP">'],
                                   ['</CP>','</div>'],	
                                   ['<CVD>','<div class="fCVD">'],
                                   ['</CVD>','</div>'],	
                                   ['<CVI>','<div class="fCVI">'],
                                   ['</CVI>','</div>'],	
                                   ['<sub>','<div class="nPSub">'],
                                   ['</sub>','</div>'],	
                                   ['<>','<div class="f">'],
                                   ['</>','</div>'],	
                                   ['<>','<div class="f">'],
                                   ['</>','</div>']
                                   ];

                                   var tailleTabConv= tabConv.length;
                                   //alert(tailleTabConv);
                                   for( var i=0;i<tailleTabConv;i++)
                                   {
                                   //alert('tabConv'+i+'1: '+tabConv[i][1]);
                                   phrase = replaceAll(phrase,tabConv[i][0],tabConv[i][1]);
                                   //alert(phrase);
                                   }


                                   return phrase;
                                   }

                           function analyse()
                            {

                             var phrase_base = document.getElementById("phrase_base").value;
                             var phrase_codee = document.getElementById("phrase_codee").value;

                             phrase_codee= grammlToCssEncode(phrase_codee);
                             //alert(phrase_codee);
                             if (document.getElementById)
                               {
                                   document.getElementById("phrase_analyse").innerHTML = phrase_codee;
                               document.getElementById("phrase").innerHTML = phrase_base;
                                   document.getElementById("analyseHTML").innerHTML = phrase_codee;

                               }
                             else if (document.all) 
                               {
                               document.all["phrase_analyse"].innerHTML = phrase_codee;
                                   document.all["phrase"].innerHTML = phrase_base;
                                   document.all["analyseHTML"].innerHTML = phrase_codee;

                               }

                             donneIdToDomChild(parentRacine);


                             }


                           </script> <!--script -->
                        
                        <p id="phrase_analyse" class="visualisation">Prévisualisation</p>
              
					
				
            </div>
        </div>
        
      <script>
            var parentRacine = document.getElementById('phrase_analyse'),
                result = document.getElementById('phrase');

            parentRacine.addEventListener('mouseover', function(e) {
                result.innerHTML = " : " + e.target.className;
            });


                parentRacine.addEventListener('click', function(e) {
                        action_sur_groupe_id(e.target.id);
                });


                function donneIdToDomChild(racineLocale){

                        var child = racineLocale.firstChild; 

                while (child) {

                    if (child.nodeType === Node.ELEMENT_NODE) { 
                        //alert('html : '+child.firstChild.data+'//'+child.innerHTML);

                                        if(child.childNodes.length>1){
                                        //alert('childNode.length>1 !! '+child.lastChild.innerHTML+
                                        //'!!'+child.lastChild.nodeName+' classe : '+child.lastChild.getAttribute('class'));
                                        }
                                } else { 
                       // alert('text : '+child.data);
                                }

                    child = child.nextSibling; 

                }
                //travelTree(racineLocale,0);

                document.getElementById("analyseHTML").innerHTML = 	document.getElementById("phrase_analyse").innerHTML;



                }
                /*
                        var currentElementChild=currentElement.childNodes[i];

                if (currentElementChild.nodeType === Node.ELEMENT_NODE) {
                                alert('innerHTML :'+currentElementChild.innerHTML);
                                alert('classe :'+currentElementChild.getAttribute('class'));

                          // Recursively traverse the tree structure of the child node
                          currentElementChild=currentElement.childNodes[i];
                          classe=currentElementChild.firstChild.getAttribute('class');
                          contenuBalise=currentElementChild.innerHTML;
                */

                function travelTree(root,depth){
                        var borne = root.childNodes.length;
                        //alert('depth : '+depth);
                        depth++;
                        var j=0;
                        for (var i = 0; i<borne; i++) {
                                if( root.childNodes.item(i).nodeType === Node.ELEMENT_NODE) {
                                        var idValue='D'+(depth-1)+'_I'+j;
                                        //alert('bf setId id '+idValue+': '+root.childNodes.item(i).innerHTML);
                                        root.childNodes.item(i).setAttribute('id', idValue);
                                        j++;
                                        }
                           //alert('bf recurse : '+root.childNodes.item(i).innerHTML);
                                travelTree(root.childNodes.item(i),depth);
                                //alert('after recurse :'+root.childNodes.item(i));
                                }
        } 
    </script>
         <script>
                   
        var btn_Add = document.getElementById('btn_add');

        btn_Add.addEventListener('click', () => {
            document.location.href="interface_menu_eleve.php?exo_id=0";
        });
        
        </script>
        
        
    <!--script -->
        
    </body>
</html>
