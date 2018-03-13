<?php

    error_reporting(E_ALL);

    class DB extends SQLite3
    {
        
        function openDB()
        {
            //On ouvre la database
            echo "echo opening db";
            $db = new SQLite3('testLogin.db');

            return $db;
        }
     
                
        //fonction pour se connecter
        function logIn($db,$id, $password){

            echo "Debut logIn\n";

            //On va chercher la liste des identifiants et mot de passe pour v�rifier l'identit� de l'utilisateur
            $request = "SELECT id, motdepasse??? FROM MA_TABLE";
            $result = $db->exec($request);
            var_dump($result->fetchArray());

            //On ins�re les r�sultats de la requ�te dans un array
            $array_result[] = $row;
            while ($row = mysql_fetch_array($result)) {
                $new_array[$row['id']] = $row;
                $new_array[$row['password']] = $row;
            }

             //Comparaison de la liste utilisateur avec les identifiants et password existant
            foreach($array_result as $array)
            {
                if($idLogin == $array['id'] && $passwordLogin == $array['password'])
                {
                    echo "True";
                    return true;
                }
            }

            //On ferme la base de donn�e
            mysql_close($db);
            echo "False";
            return false;
        }
        
        //fonction d'inscription
        function signIn($db, $id, $password){

            echo "Debut signIn\n";
            $request = "INSERT INTO Utilisateurs (id_utilisateur, mdp_utilisateur, mail_utilisateur, nom_utilisateur, prenom_utilisateur) VALUES ('0001', 'azerty', 'Seguard', 'Théo', 'ilesttropfort@beaugosse.com');";
            $db->exec($request);

        }

        //Fonction pour g�n�rer un nouveau mdp
        function sendGeneratedPassword($email){

            echo "Debut sendGeneratedPassword\n";

            //g�n�rer un nouveau mdp...
     //        $generatedPassword = generatePassword();
     //        //Mettre � jour le nouveau mdp
     //        $request = "UPDATE Utilisateur SET password='.$generatedPassword.' WHERE email='.$email.'";
     //        $db->exec($request);
     //       
             //Conception du mail
            $message = 'Votre nouveau mot de passe est: '. $generatedPassword;

            // Dans le cas o� nos lignes comportent plus de 70 caract�res, nous les coupons en utilisant wordwrap()
            $message = wordwrap($message, 70, "\r\n");

            // Envoi du mail
            mail('baguette666@gmail.com', 'G�n�ration de mot de passe', $message);

        }

        function generatePassword(){

            echo "Debut generatePassword\n";
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';

            for ($i = 0; $i < 6; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
        
            echo $randomString;
            return $randomString;
        }

    }