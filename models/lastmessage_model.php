<?php
class lastmessage_model
{
    private $bd;
    public function __construct()
    {
        try {
            $this->bd = new PDO("mysql:host=localhost;dbname=tatasiaka", "root", "");
        } catch (Exception $e) {
            die("Erreur de connexion au serveur: " . $e->getMessage());
        }
    }

    public function hasConversation($myid)
    {
        $req = $this->bd->prepare("SELECT * FROM derniersmessages WHERE idParticipant1=? OR idParticipant2=?");
        $req->execute([$myid, $myid]);
        return $req->rowCount();
    }

    public function getConversation($myid)
    {
        $req = $this->bd->prepare("SELECT * FROM derniersmessages WHERE idParticipant1=? OR idParticipant2=? ORDER BY date DESC");
        $req->execute([$myid, $myid]);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }


    public function isCurrentConversationExist($idParticipant1, $idParticipant2)
    {
        $req = $this->bd->prepare("SELECT * FROM derniersmessages WHERE idParticipant1=? AND idParticipant2=? OR idParticipant1=? AND idParticipant2=?");
        $req->execute([$idParticipant1, $idParticipant2, $idParticipant2, $idParticipant1]);
        return $req->rowCount();
    }

    public function saveCurrentConversation($message, $idParticipant1, $idParticipant2, $date)
    {
        $req = $this->bd->prepare("INSERT INTO derniersmessages(contenu	,idParticipant1	,idParticipant2,date) VALUES (?,?,?,?)");
        $req->execute([$message, $idParticipant1, $idParticipant2, $date]);
    }

    public function updateLastMessage($idSend, $idReceive, $message, $date)
    {
        $req = $this->bd->prepare("UPDATE derniersmessages SET contenu=?, date=? WHERE idParticipant1=? AND idParticipant2=? OR idParticipant1=? AND idParticipant2=?");
        $req->execute([$message, $date, $idSend, $idReceive, $idReceive, $idSend]);
    }
}
