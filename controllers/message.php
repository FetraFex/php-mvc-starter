<?php
    class message{
        public function index () {
            require_once("models/membre_model.php");
            $mm = new membre_model();
            include("views/message-view.php");
        } 

        public function send_message() {

        }
    }

    if (isset($_POST["send"])){

        echo $_POST["myid"];
        echo $_POST["id"];
        echo $_POST["message"];
        echo date("Y-m-d H:i-s");

        require_once("../models/message_model.php");
        $mm = new message_model();
        $mm->sendMessage($_POST["message"], $_POST["myid"], $_POST["id"], date("Y-m-d H:i-s"));
        echo "Mety";
    }

    if (isset($_POST["getmessage"])){
        require_once("../models/message_model.php");
        $mm = new message_model();
        $data = $mm->getMessage($_POST["myid"], $_POST["id"]);
        echo json_encode($data);
    }