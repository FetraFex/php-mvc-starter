<?php
    class publication{
        public function publier(){
            $ima_src = htmlspecialchars(trim($_POST["pubimg"]));
            $descri = htmlspecialchars(trim($_POST["descri"]));
            
            if($descri != ''){
                require_once("models/publication_model.php");
                $mm = new publication_model();
            }
        }
    }