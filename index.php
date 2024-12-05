<?php
    require_once("cores/root.php");

    if (!empty($_GET["action"])){
        session_start();
        root::execute($_GET["action"]);
    } else {
        include("views/home-view.php");
    }
?>