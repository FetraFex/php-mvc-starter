<?php
class message_model{
    private $bd;
    public function __construct(){
        try {
            $this->bd = new PDO("mysql:host=localhost;dbname=tatasiaka", "root", "");
        } catch (Exception $e) {
            die("Erreur de connexion au serveur: " . $e->getMessage());
        }
    }

    public function sendMessage($contenu, $idsend, $idreceive, $date){
        $req = $this->bd->prepare("INSERT INTO message(contenu, idSend, idReceive, date) VALUES (?,?,?,?)");
        $req->execute([$contenu, $idsend, $idreceive, $date]);
    }

    public function getMessage($idSend, $idreceive){
        $req = $this->bd->prepare("SELECT * FROM message WHERE idSend=? AND idReceive=? OR idSend=? AND idReceive=?");
        $req->execute([$idSend, $idreceive, $idreceive, $idSend]);
        return $req->fetchAll(PDO::FETCH_OBJ);

    }

}

?>