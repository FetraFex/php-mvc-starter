<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tatasiak.mg</title>
    <link rel="stylesheet" href="http://localhost/Rencontre/publics/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/Rencontre/publics/css/accueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
    body,
    html {
        margin: 0;
        padding: 0;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .navbar {
        flex: 0 0 auto;
        margin-bottom: 0;
    }

    .full-height {
        flex: 1 0 auto;
        overflow: hidden;
    }

    .full {
        height: 100%;
        position: relative;

    }

    .padding-x {
        padding: 0 3%;
    }

    .leftcard {
        display: flex;
        align-items: center;
        padding: 10px 0;
        gap: 20px;
    }

    .publier {
        background-color: white;
        padding: 1% 2%;
        border-radius: 12px;
        width: 80%;
    }

    .addimage {
        width: 100%;
        padding: 12px 0;
        border-radius: 8px;
        border: none;
        font-weight: bold;
    }

    .pub{
        width: 100%;
        padding: 12px 0;
        border-radius: 8px;
        border: none;
        font-weight: bold;
    }
</style>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Tatasiaka</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Accueil</a></li>
                <li><a href="http://localhost/Rencontre/membre/liste">Membre</a></li>
                <li><a href="#">Message</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://localhost/Rencontre/membre/mon_profil/"><?= $_SESSION["pseudo"] ?></a></li>
                <li><a href="http://localhost/Rencontre/membre/deconnexion/">Se deconnecter </a></li>
            </ul>
        </div>
    </nav>

    <div class="full-height bg-danger">
        <div class="row full">
            <div class="col-sm-3 bg-warning full padding-x">
                <div class="container bg-danger leftcard" style="width: 80%;">
                    <i class="fa fa-home fa-2x"></i>
                    <h4>Accueil</h4>
                </div>
                <div class="container bg-danger leftcard" style="width: 80%;">
                    <i class="fa fa-user-friends fa-2x"></i>
                    <h4>Amis</h4>
                </div>
                <div class="container bg-danger leftcard" style="width: 80%;">
                    <i class="fa fa-users fa-2x"></i>
                    <h4>Groupes</h4>
                </div>
                <div class="container bg-danger leftcard" style="width: 80%;">
                    <i class="fa fa-save fa-2x"></i>
                    <h4>Enregistrements</h4>
                </div>
                <div class="container bg-danger leftcard" style="width: 80%;">
                    <i class="fa fa-star fa-2x"></i>
                    <h4>Favoris</h4>
                </div>
            </div>
            <div class="col-sm-6 bg-success full centre">
                <div class="container publier">
                    <form action="http://localhost/Rencontre/publication/publier" method="post">
                        <div style="display:flex;">
                            <img src="http://localhost/Rencontre/publics/image/default-profile.png" alt="" class="img img-responsive" style="width:50px;">
                            <textarea name="descri" id="" style="flex:1 auto; border-radius:50px;padding:0 15px;"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <button class="addimage"><input type="file" name="pubimg" id=""></button>
                            </div>
                            <div class="col-sm-8">
                                <button class="pub" type="submit">Publier</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-3 bg-success full">

            </div>
        </div>
    </div>

    <script src="http://localhost/Rencontre/publics/js/bootstrap.js"></script>
</body>

</html>