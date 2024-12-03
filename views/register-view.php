<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="publics/css/bootstrap.css">
    <link rel="stylesheet" href="publics/css/register.css">
</head>

<body>
    <div class="container">
        <form action="index.php?action=register-membre" method="post">
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

            <button type="submit" class="btn btn-default" name="btnRegister">S'inscrire</button>
            <?php
            if (isset($_GET['retour'])) {
                if ($_GET["retour"] == "vide") {
                    echo "<div class='alert alert-danger'>
                    Veuillez remplir tous les champs !
                 </div>";
                }
                if ($_GET["retour"] == "pseudo") {
                    echo "<div class='alert alert-danger'>
                    Le pseudo est déja utilisé !
                 </div>";
                }
                if ($_GET["retour"] == "email") {
                    echo "<div class='alert alert-danger'>
                    Cette adresse email est déja utilisé !
                 </div>";
                }
                if ($_GET["retour"] == "pass") {
                    echo "<div class='alert alert-danger'>
                    Les mots de passe doivent être identiques !
                 </div>";
                }
            }
            ?>

        </form>
    </div>
</body>

</html>