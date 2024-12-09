<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/Rencontre/publics/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/Rencontre/publics/css/register.css">
</head>

<body>
    <div class="container">
        <form action="http://localhost/Rencontre/membre/enregistrer" method="post" enctype="multipart/form-data">
            <h1>Inscription</h1>
            <div class="form-group">
                <label>Nom</label>
                <input type="text" class="form-control" name="nom">
            </div>
            <div class="form-group">
                <label>Prénom</label>
                <input type="text" class="form-control" name="prenom">
            </div>
            <div class="form-group">
                <label>Pseudo</label>
                <input type="text" class="form-control" name="pseudo">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Votre mot de passe</label>
                <input type="password" class="form-control" name="pass1">
            </div>
            <div class="form-group">
                <label for="pwd">Confirmer votre mot de passe</label>
                <input type="password" class="form-control" name="pass2">
            </div>
            <div class="form-group">
                <label for="pdp"></label>
                <input type="file" class="form-control" name="pdp">
            </div>

            <button type="submit" class="btn btn-default" name="btnRegister">S'inscrire</button>
        </form>
    </div>
</body>

</html>