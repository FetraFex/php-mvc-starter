<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="publics/css/bootstrap.css">
</head>

<body>
    <div class="container">
        <form action="index.php?action=login-membre" method="post">
            <h1>Connexion</h1>
            <div class="form-group">
                <label for="pseudo">Votre pseudo</label>
                <input type="text" class="form-control" id="email" name="pseudo">
            </div>
            <div class="form-group">
                <label for="pwd">Votre mot de passe</label>
                <input type="password" class="form-control" id="pwd" name="pass"> 
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default" name="btnLogin">Se Connecter</button>
        </form>
    </div>
</body>

</html>