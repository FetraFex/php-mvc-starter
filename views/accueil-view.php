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
                <li><a href="#">Home</a></li>
                <li class="active"><a href="#">Accueil</a></li>
                <li><a href="index.php?action=list">Membre</a></li>
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
        <form action="/action_page.php" method="post">
            <h1>Publication</h1>
            <div class="form-group">
                <label for="email">Votre adresse email</label>
                <textarea class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-warning">Publier</button>
        </form>
    </div>
    <script src="publics/js/bootstrap.js"></script>
</body>

</html>