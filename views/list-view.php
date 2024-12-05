<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tatasiak.mg</title>
    <link rel="stylesheet" href="publics/css/bootstrap.css">
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Tatasiaka</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="#">Accueil</a></li>
                <li class="active"><a href="index.php?action=list">Membre</a></li>
                <li><a href="#">Publication</a></li>
                <li><a href="#">Message</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href=""><?= $_SESSION["pseudo"] ?></a></li>
                <li><a href="index.php?action=logout">Se deconnecter </a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <?php 
                $data = $mm->selectAll();
                foreach ($data as $d) {
                    echo "<div class='col-lg-2'>
                <img src='publics/image/default-profile.png' alt='' class='img img-responsive'>
                <h3>".$d->pseudo."</h3>
                <a href='index.php?action=profil&pseudo=".$d->pseudo."'>Voir profil</a>
            </div>";
                }
            ?>
            
        </div>
    </div>
    <script src="publics/js/bootstrap.js"></script>
</body>

</html>