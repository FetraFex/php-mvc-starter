<?php
class membre_model{
    private $bd;
    public function __construct(){
        try {
            $this->bd = new PDO("mysql:host=localhost;port=3307;dbname=tatasiaka", "root", "");
        } catch (Exception $e) {
            die("Erreur de connexion au serveur: " . $e->getMessage());
        }
    }

    public function save($nom, $prenom, $pseudo, $email, $pass){
        $req = $this->bd->prepare("INSERT INTO membre(nom, prenom, pseudo, email, pass) VALUES (?,?,?,?,?)");
        $req->execute([$nom, $prenom, $pseudo, $email, $pass]);
    }

    public function verifyPseudo($pseudo) {
        $req = $this->bd->prepare("SELECT * FROM membre WHERE pseudo=?");
        $req->execute([$pseudo]);
        return $req->rowCount();
    }

    public function verifyEmail($email){
        $req = $this->bd->prepare("SELECT * FROM membre WHERE email=?");
        $req->execute([$email]);
        return $req->rowCount();
    }

    public function deleteMembre($id){
        $req = $this->bd->prepare("DELETE * FROM membre FROM idMembre=?");
        $req->execute([$id]);
    }

    public function selectAll(){
        $req = $this->bd->query("SELECT * FROM membre");
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateInfo($nom, $prenom, $pseudo, $email, $id){
        $req = $this->bd->prepare("UPDATE membre SET nom=?, prenom=?, pseudo=?, email=? WHERE idMembre=?");
        $req->execute([$nom, $prenom, $pseudo, $email, $id]);
    }
}
?>