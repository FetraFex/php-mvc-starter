<?php
    class publication_model{
        private $bd;
        public function __construct(){
            try {
                $this->bd = new PDO("mysql:host=localhost;dbname=tatasiaka", "root", "");
            } catch (Exception $e) {
                die("Erreur de connexion au serveur: " . $e->getMessage());
            }
        }

        public function post($pseudo, $descri, $imgsrc, $date){
            $req = $this->bd->prepare("INSERT INTO publication(auteur, descri, img_src, date) VALUES(?,?,?,?)");
            $req->execute([$pseudo, $descri, $imgsrc, $date]);
        }

        public function getPosts(){
            $req = $this->bd->query("SELECT * FROM publication");
            return $req->fetchAll(PDO::FETCH_OBJ);
        }
}
?>