<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tatasiak.mg</title>
    <link rel="stylesheet" href="http://localhost/Rencontre/publics/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/Rencontre/publics/css/update.css">
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Tatasiaka</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="#">Accueil</a></li>
                <li><a href="index.php?action=list">Membre</a></li>
                <li><a href="#">Message</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Mety</a></li>
                <li><a href="index.php?action=logout">Se deconnecter</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="container-fluid full-height">
            <div class="row full-height">
                <div class="col-md-3 bg-primary text-white full-height">
                    <img class="img img-responsive" src="http://localhost/Rencontre/publics/image/default-profile.png" alt="">
                </div>
                <div class="col-md-9 bg-success text-white full-height">
                    <form action="http://localhost/Rencontre/membre/modifierInfo/" method="post">
                    <h2>Modifier vos informations</h2>
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control" name="nom" value="<?= $myinfo[0]->nom ?>">
                        </div>
                        <div class="form-group">
                            <label>Prénom</label>
                            <input type="text" class="form-control" name="prenom" value="<?= $myinfo[0]->prenom ?>">
                        </div>
                        <div class="form-group">
                            <label>Pseudo</label>
                            <input type="text" class="form-control" name="pseudo" value="<?= $myinfo[0]->pseudo ?>">
                        </div>
                        <button type="submit" class="btn btn-default" name="btnChangeInfo">Modifier</button>
                    </form>
                    <hr>
                    <form action="http://localhost/Rencontre/membre/modifierInfoPerso" method="post">
                        <h2>Modifier vos informations personnelles</h2>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?= $myinfo[0]->email ?>">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Votre ancien mot de passe</label>
                            <input type="password" class="form-control" name="pass">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Votre nouveau mot de passe</label>
                            <input type="password" class="form-control" name="newpass1">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Confirmer votre nouveau mot de passe</label>
                            <input type="password" class="form-control" name="newpass2">
                        </div>
                        <button type="submit" class="btn btn-default" name="btnChangeInfoPers">Appliquer les Modifications</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="publics/js/bootstrap.js"></script>
</body>

</html>