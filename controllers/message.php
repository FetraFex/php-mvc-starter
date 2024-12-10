<?php
class message
{
    public function index()
    {
        require_once("models/membre_model.php");
        $mm = new membre_model();
        include("views/message-view.php");
    }

    public function send_message() {}
}

if (isset($_POST["send"])) {

    echo $_POST["myid"];
    echo $_POST["id"];
    echo $_POST["message"];
    echo date("Y-m-d H:i-s");

    require_once("../models/message_model.php");
    $mm = new message_model();
    $mm->sendMessage($_POST["message"], $_POST["myid"], $_POST["id"], date("Y-m-d H:i-s"));
    require_once("../models/lastmessage_model.php");
    $lmm = new lastmessage_model();
    if ($lmm->isCurrentConversationExist($_POST["myid"], $_POST["id"])) {
        $lmm->updateLastMessage($_POST["myid"], $_POST["id"], $_POST["message"], date("Y-m-d H:i-s"));
    } else {
        $lmm->saveCurrentConversation($_POST["message"], $_POST["myid"], $_POST["id"], date("Y-m-d H:i-s"));
    }
    echo "Mety";
}

if (isset($_POST["getmessage"])) {
    require_once("../models/message_model.php");
    $mm = new message_model();
    $data = $mm->getMessage($_POST["myid"], $_POST["id"]);
    echo json_encode($data);
}

if (isset($_POST["getConversation"])) {
    $myid = $_POST["myid"];
    require_once("../models/lastmessage_model.php");
    $lmm = new lastmessage_model();
    $data = $lmm->getConversation($myid);
   
    echo json_encode($data);
}
