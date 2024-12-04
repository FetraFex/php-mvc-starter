<?php
    class membre {
        public function enregistrer($nom, $prenom, $pseudo, $email, $pass1, $pass2){
            $nom = htmlspecialchars(trim($nom));
            $prenom = htmlspecialchars(trim($prenom));
            $pseudo = htmlspecialchars(trim($pseudo));
            $email = htmlspecialchars(trim($email));
            $pass1 = htmlspecialchars(trim($pass1));
            $pass2 = htmlspecialchars(trim($pass2));
            if ($nom != "" && $prenom != "" && $pseudo != "" && $email != "" && $pass1 != "" && $pass2 != ""){
                require_once("models/membre_model.php");
                $mm = new membre_model();
                if ($mm->verifyPseudo($pseudo) == 0){
                    if ($mm->verifyEmail($email) == 0){
                        if ($pass1 == $pass2) {
                            $pass1 = sha1($pass1);
                            $mm->save($nom, $prenom, $pseudo, $email, $pass1);
                            $_SESSION["pseudo"] = $pseudo;
                            header("location:index.php?action=accueil");
                        }else{
                            header("location:index.php?action=register&retour=pass");
                        }
                    } else {
                        header("location:index.php?action=register&retour=email");
                    }
                } else {
                    header("location:index.php?action=register&retour=pseudo");
                }
            } else {
                header("location:index.php?action=register&retour=vide");
            }
        }

        public function connecter($pseudo, $pass){
            $pseudo = htmlspecialchars(trim($pseudo));
            $pass = htmlspecialchars(trim($pass));

            if ($pseudo != "" && $pass != ""){
                require_once("models/membre_model.php");
                $mm = new membre_model();
                
                if ($mm->verifyPseudo($pseudo)){
                    echo var_dump($mm->getPseudo(($pseudo)));
                }
            }
        }
    }
?>