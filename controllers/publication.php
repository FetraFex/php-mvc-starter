<?php
class publication
{
    public function publier()
    {
        $ima_src = htmlspecialchars(trim($_POST["pubimg"]));
        $descri = htmlspecialchars(trim($_POST["descri"]));

        if ($descri != '') {
            require_once("models/publication_model.php");
            $mm = new publication_model();
            echo $descri;
        }
    }
}

if (isset($_POST["descri"])) {
    $description = $_POST["descri"];
    $auteur = $_POST["pseudo"];
    $date = date("Y-m-d");
    $fileName = basename($_FILES['pubimg']['name']);
    $targetDir = __DIR__ . "/../publics/image/";
    $targetFilePath = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Check file type
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES['pubimg']['tmp_name'], $targetFilePath)) {
            require_once("../models/publication_model.php");
            $mm = new publication_model();
            $mm->post($auteur, $description, $fileName, $date);
            echo "Mety koa";
        }
    }
}

if (isset($_POST["getpost"])) {
    require_once("../models/publication_model.php");
    $pm = new publication_model();
    $data = $pm->getPosts();
    echo json_encode($data);
}

// if(isset($_POST["getnewpost"])) {
//     echo json_encode("Mety tsara");
// }
