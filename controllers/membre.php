<?php
class membre
{
    public function cree_un_compte()
    {
        include("views/register-view.php");
    }

    public function se_connecter()
    {
        include("views/login-view.php");
    }

    public function accueil()
    {
        if (isset($_SESSION["pseudo"])) {
            include("views/accueil-view.php");
        } else {
            header("location:http://localhost/Rencontre/");
        }
    }

    public function liste()
    {
        require_once("models/membre_model.php");
        $mm = new membre_model();
        include("views/list-view.php");
    }

    public function mon_profil()
    {
        $id = $_SESSION["idMembre"];
        require_once("models/membre_model.php");
        $mm = new membre_model();
        $myinfo = $mm->getProfil($id);
        include("views/update-view.php");
    }

    public function deconnexion()
    {
        session_destroy();
        header("location:http://localhost/Rencontre/");
    }

    public function enregistrer()
    {
        $nom = htmlspecialchars(trim($_POST["nom"]));
        $prenom = htmlspecialchars(trim($_POST["prenom"]));
        $pseudo = htmlspecialchars(trim($_POST["pseudo"]));
        $email = htmlspecialchars(trim($_POST["email"]));
        $pass1 = htmlspecialchars(trim($_POST["pass1"]));
        $pass2 = htmlspecialchars(trim($_POST["pass2"]));
        if ($nom != "" && $prenom != "" && $pseudo != "" && $email != "" && $pass1 != "" && $pass2 != "") {
            require_once("models/membre_model.php");
            $mm = new membre_model();
            if ($mm->verifyPseudo($pseudo) == 0) {
                if ($mm->verifyEmail($email) == 0) {
                    if ($pass1 == $pass2) {
                        $pass1 = sha1($pass1);
                        $mm->save($nom, $prenom, $pseudo, $email, $pass1);
                        $_SESSION["nom"] = $mm->selectOne($pseudo)[0]->nom;
                        $_SESSION["prenom"] = $mm->selectOne($pseudo)[0]->prenom;
                        $_SESSION["pseudo"] = $mm->selectOne($pseudo)[0]->pseudo;
                        $_SESSION["email"] = $mm->selectOne($pseudo)[0]->email;
                        $_SESSION["pass"] = $mm->selectOne($pseudo)[0]->pass;
                        $_SESSION["idMembre"] = $mm->selectOne($pseudo)[0]->idMembre;
                        header("location:http://localhost/Rencontre/membre/accueil/");
                    } else {
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

    public function connecter()
    {
        $pseudo = htmlspecialchars(trim($_POST["pseudo"]));
        $pass = htmlspecialchars(trim($_POST["pass"]));

        if ($pseudo != "" && $pass != "") {
            require_once("models/membre_model.php");
            $mm = new membre_model();

            if ($mm->verifyPseudo($pseudo)) {
                if (sha1($pass) == $mm->selectOne($pseudo)[0]->pass) {
                    $_SESSION["nom"] = $mm->selectOne($pseudo)[0]->nom;
                    $_SESSION["prenom"] = $mm->selectOne($pseudo)[0]->prenom;
                    $_SESSION["pseudo"] = $mm->selectOne($pseudo)[0]->pseudo;
                    $_SESSION["email"] = $mm->selectOne($pseudo)[0]->email;
                    $_SESSION["pass"] = $mm->selectOne($pseudo)[0]->pass;
                    $_SESSION["idMembre"] = $mm->selectOne($pseudo)[0]->idMembre;
                    header("location:http://localhost/Rencontre/membre/accueil/");
                } else {
                    echo "MDP incorrect";
                }
            } else {
                echo "Ce compten'existe pas";
            }
        } else {
            echo "Veuillez remplir tous les champs";
        }
    }

    public function modifierInfo()
    {
        $nom = htmlspecialchars(trim($_POST["nom"]));
        $prenom = htmlspecialchars(trim($_POST["prenom"]));
        $pseudo = htmlspecialchars(trim($_POST["pseudo"]));
        $id = $_SESSION["idMembre"];

        if ($nom != "" && $prenom != "" && $pseudo != "") {
            require_once("models/membre_model.php");
            $mm = new membre_model();
            if ($mm->verifyPseudo($pseudo) == 0) {
                $mm->updateInfo($nom, $prenom, $pseudo, $id);
            } else {
                echo "Ce pseudo a été déjà pris";
            }
            $_SESSION["nom"] = $nom;
            $_SESSION["prenom"] = $prenom;
            $_SESSION["pseudo"] = $pseudo;
            header("location:http://localhost/Rencontre/membre/mon_profil/");
        }
    }

    public function modifierInfoPerso()
    {


        $email = htmlspecialchars(trim($_POST["email"]));
        $pass = htmlspecialchars(trim($_POST["pass"]));
        $newpass1 = htmlspecialchars(trim($_POST["newpass1"]));
        $newpass2 = htmlspecialchars(trim($_POST["newpass2"]));
        $id = $_SESSION["idMembre"];
        $pseudo = $_SESSION["pseudo"];

        if ($email != "" && $pass != "" && $newpass1 != "" && $newpass2 && $id != "") {
            require_once("models/membre_model.php");
            $mm = new membre_model();
            if (sha1($pass) == $mm->selectOne($pseudo)[0]->pass) {
                if ($newpass1 == $newpass2) {
                        $mm->updatePerso($email, sha1($newpass1), $id);
                        header("location:http://localhost/Rencontre/membre/mon_profil/");
                } else {
                    echo "Les nouveaux mot de passe ne sont pas identiques";
                }
            } else {
                echo "Vous n'avez pas l'autorisation de modifier les informations";
            }
        } else {
            echo "Veuillez remplir tous les champs";
        }
    }
}
