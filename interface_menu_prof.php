<!DOCTYPE html>

<?php
    include 'src\lib\lib.php';
    $listeExos = listeExo();
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
                <a href="interface_index.php">
                <img src="src/img/user.png" alt="user" align="right" style="margin-top:5px; margin-right:15px; width:40px;height:40px;-webkit-filter: drop-shadow(0px 0px 5px #222 );filter: drop-shadow(0px 0px 5px #222);">
                </a>
            </div>
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
                    <li>Classe 1</li>
                    <li>Classe 2</li>
                    <li>Classe 3</li>
                    <li>Classe 4</li>
                    <li>Classe 5</li>
                </ul>
            </div>
          
        </div> 
        
        <div id="page">
            <div id="exo">
                    <form id='exo_form' method='post'>
                        <div class="header_exo">
                        <?php
                        
                        $id =$_GET['exo_id'];
                        $infoExo = getAllInfoExoById($id);?>
                        <input type="text" placeholder= <?=$id.$infoExo['nomExercice']?> />
                        </div>
                    </form>
                     
                     <h2>Consigne :</h2>
                     <textarea name="consigne" cols="50" row="5"><?=$infoExo['enonce'];?></textarea>
					   <textarea id="phrase_base" cols="50" row="5"><!--todo : phrase de base : infoExo['phrase']--></textarea>
                     
                     <h2>Correction :</h2>
                     
                     <textarea id="phrase_codee" rows="15" cols="100%">&lt;cp&gt;Depuis le haut jusqu'en bas&lt;/cp&gt;, &lt;sujet&gt;les souris&lt;/sujet&gt; &lt;verbe&gt;chassent&lt;/verbe&gt; &lt;cv&gt;les chats &lt;sub&gt;&lt;sujet&gt;qui&lt;/sujet&gt; &lt;verbe&gt;mangent&lt;/verbe&gt; &lt;cv&gt;du fromage&lt;/cv&gt;&lt;/sub&gt;&lt;/cv&gt;</textarea>
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
        </script> <!--script -->
        
    </body>
</html>
