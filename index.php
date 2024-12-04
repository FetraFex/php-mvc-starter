<?php
    session_start();
    if (isset($_GET["action"])){
        if ($_GET["action"] == "login"){
            include("views/login-view.php");
        } 
        else if ($_GET["action"] == "login-membre"){
            if (isset($_GET["btnLogin"])){
                require_once("controllers/membre.php");
                $m = new membre();
                $m->connecter($_POST["pseudo"],$_POST["pass"]);
            }
        }
        else if ($_GET["action"] == "register"){
            include("views/register-view.php");
        } 
        else if ($_GET["action"] == "register-membre"){
            if (isset($_POST["btnRegister"])){

                require_once("controllers/membre.php");
                $m = new membre();
                $m->enregistrer($_POST["nom"], $_POST["prenom"], $_POST["pseudo"], $_POST["email"], $_POST["pass1"], $_POST["pass2"]);
            }
        }
        else if ($_GET["action"] == "accueil"){
            if (isset($_SESSION["pseudo"])){
                include("views/accueil-view.php");
            } else {
                header("location:index.php");
            }
        } 
        else if ($_GET["action"] == "logout"){
            session_destroy();
            header("location:index.php");
        }
        else if ($_GET["action"] == "list"){
            require_once("models/membre_model.php");
            $mm = new membre_model();
            include("views/list-view.php");
        }
        else if ($_GET["action"] == "profil"){
            require_once("models/membre_model.php");
            $mm = new membre_model();
            include("views/profil-view.php");
        }
    } else {
        include("views/home-view.php");
    }

?>