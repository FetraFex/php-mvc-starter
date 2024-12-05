<?php
session_start();
if (isset($_GET["action"])) {
    if ($_GET["action"] == "login") {
        include("views/login-view.php");
    } else if ($_GET["action"] == "login-membre") {
        if (isset($_POST["btnLogin"])) {
            require_once("controllers/membre.php");
            $m = new membre();
            $m->connecter($_POST["pseudo"], $_POST["pass"]);
        }
    } else if ($_GET["action"] == "register") {
        include("views/register-view.php");
    } else if ($_GET["action"] == "register-membre") {
        if (isset($_POST["btnRegister"])) {

            require_once("controllers/membre.php");
            $m = new membre();
            $m->enregistrer($_POST["nom"], $_POST["prenom"], $_POST["pseudo"], $_POST["email"], $_POST["pass1"], $_POST["pass2"]);
        }
    } else if ($_GET["action"] == "accueil") {
        if (isset($_SESSION["pseudo"]) && isset($_SESSION["nom"]) && isset($_SESSION["prenom"]) && isset($_SESSION["email"]) && isset($_SESSION["pass"])) {
            include("views/accueil-view.php");
        } else {
            header("location:index.php");
        }
    } else if ($_GET["action"] == "logout") {
        session_destroy();
        header("location:index.php");
    } else if ($_GET["action"] == "list") {
        require_once("models/membre_model.php");
        $mm = new membre_model();
        include("views/list-view.php");
    } else if ($_GET["action"] == "profil") {
        require_once("models/membre_model.php");
        $mm = new membre_model();
        include("views/profil-view.php");
    } else if ($_GET["action"] == "update") {
        require_once("models/membre_model.php");
        $mm = new membre_model();
        $myinfo = $mm->selectOne($_SESSION["pseudo"]);
        include("views/update-view.php");
    } else if ($_GET["action"] == "update-membre") {
        if (isset($_POST["btnChangeInfo"])){
            require_once("controllers/membre.php");
            $m = new membre();
            $m->modifierInfo($_POST["nom"], $_POST["prenom"], $_POST["pseudo"], $_SESSION["idMembre"]);
        }
    } 
    else if ($_GET["action"] == "update-perso") {
        if (isset($_POST["btnChangeInfoPers"])){
            require_once("controllers/membre.php");
            $m = new membre();
            $m->modifierInfoPerso($_SESSION["pseudo"], $_POST["pass"], $_POST["email"], $_POST["newpass1"], $_POST["newpass2"], $_SESSION["idMembre"]);
        }
    }
} else {
    include("views/home-view.php");
}
