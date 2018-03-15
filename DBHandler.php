<?php

    error_reporting(E_ALL);
    
    session_start();

    class DB extends SQLite3
    {        
        //Variable publique nom de la base de donnée 
        public $nomDB = 'testLogin.db';
        
        //Constructeur de la classe DB
        function __construct() {
            
        }
    
        //Fonction permettant l'ouverture de la db avec pour nom le string dans la variable $nomDB
        function openDB($nomDB)
        {
            //On ouvre la database
            echo "echo opening db";
            $db = new SQLite3($nomDB);

            return $db;
        }
     
                
        //fonction pour se connecter et faire la difference entre eleves et profs
        function logIn($db,$id, $password){

            //On va chercher la liste des identifiants et mot de passe pour verifier l'identite de l'utilisateur
            $request = "SELECT id_utilisateur, mdp_utilisateur, fk_fonction FROM Utilisateurs WHERE id_utilisateur LIKE '$id' AND mdp_utilisateur LIKE '$password';";
            $result = $db->query($request);
            $retour = $result->fetchArray();
                        
            //Condition pour verifier le niveau de droit de l'utilisateur. '0'= 0 eleves, '1' = admin, '2' = prof
            if($retour[0] == $id and $retour[1] == $password){ 
                            
                //Stockage de l'identifiant pour le transmettre a travers les differentes pages php du site
                $_SESSION['identifiant'] = $id;
                            
                //Traitement si l'utilisateur est un eleve
                if($retour[2] == '0'){
					
                    //Redirection vers l'interface eleve
                    header('Location: interface_menu_eleve.php');
                    return true;
					
                }
                //Traitement si l'utilisateur est un professeur
                else if($retour[2] == '2'){
					
                    //Redirection vers l'interface prof
                    header('Location: interface_menu_prof.php');
                    return true;

                }
                //Traitement si l'utilisateur est un admin
                else if($retour[2] == '3'){
					
                    //Redirection vers l'interface admin
                    header('Location: http://google.com');
                    return true;
					
                }
                else{
                                
                    //cas pour les autres types de comptes autre qu'admin, prof et eleves
                    return false;

                }
				
            }
            else{
                            
                error_log("DBHandler.php: Login incorrect",0);
                header('Location: index.php');
                return false;
                $_SESSION["erreurLogin"] = 1;
                            
            }
        }
        
        //fonction d'inscription
        function signIn($db, $id, $password, $prenom, $nom, $email){

            //Par defaut un utilisateur a aucun droit particulier
            $defaultFonction = '0';
			
            //On prepare notre requete sqlite3 pour l'inscription
            $request = "INSERT INTO Utilisateurs (id_utilisateur, mdp_utilisateur, nom_utilisateur, prenom_utilisateur, mail_utilisateur, fk_fonction) VALUES ('$id', '$password', '$prenom', '$nom', '$email', '$defaultFonction');";
            
            //Si la requete foctionne on renvoie true
            if($db->exec($request)===true){ 
		
                $_SESSION['identifiant'] = $id;
                header('Location: interface_menu_eleve.php');
                return true;
				
            }
            //Sinon on renvoie false
            else{
				
                return false;
				
            }

        }
		
	//Fonction creer aleatoirement une chaine de caractere qui servira de mot de passe provisoire
	function generatePassword(){

            //On liste les caracteres disponibles pour la generation d'un nouveau mdp
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            
            //On calcul la taille de la chaine de caractere
            $charactersLength = strlen($characters);
            
            //Initialisation de la variable qui va recevoir le nouveau mdp
            $randomString = '';

            //On va creer un nouveau mdp avec 6 caracteres aleatoires
            for ($i = 0; $i < 6; $i++){
                
                $randomString .= $characters[rand(0, $charactersLength - 1)];
                
            }
        
            //Retour du nouveau mdp
            return $randomString;
            
        }

        //Fonction pour envoyer le nouveau mdp et mettre a jour le mdp du compte sur la db
        function sendGeneratedPassword($db, $email, $generatedPassword){

            //Mettre a jour le nouveau mdp
            $request = "UPDATE Utilisateurs SET mdp_utilisateur='$generatedPassword' WHERE id_utilisateur LIKE '6666';";
            $db->query($request);
           
            //Conception du mail A verifier
            $to      = $email;
			$subject = 'Nouveau mot de passe';
			$message = 'Bonjour,\r\n Votre nouveau mot de passe est: $generatedPassword';
			$headers = 'From: alexandre.jean@formation-technologique.fr' . "\r\n" .
				'Reply-To: alexandre.jean@formation-technologique.fr' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();

			mail($to, $subject, $message, $headers);
        }

    }