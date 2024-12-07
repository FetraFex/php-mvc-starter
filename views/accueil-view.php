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
        overflow: hidden;
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
        padding: 3% 2%;
        border-radius: 12px;
        width: 95%;
    }

    .addimage {
        width: 100%;
        padding: 15px 0;
        border-radius: 8px;
        border: none;
        font-weight: bold;

    }

    .pub {
        width: 100%;
        padding: 15px 0;
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
                <li><a href="http://localhost/Rencontre/message/">Message</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://localhost/Rencontre/membre/mon_profil/"><?= $_SESSION["pseudo"] ?></a></li>
                <li><a href="http://localhost/Rencontre/membre/deconnexion/">Se deconnecter </a></li>
            </ul>
        </div>
    </nav>

    <div class="full-height bg-danger" style="padding:2%">
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
            <div class="col-sm-6 bg-success full">
                <div class="container publier">
                    <form action="http://localhost/Rencontre/publication/publier" method="post">
                        <div style="display:flex;">
                            <div>
                                <img src="http://localhost/Rencontre/publics/image/default-profile.png" alt="" class="img img-responsive" style="width:65px;">
                            </div>
                            <textarea name="descri" id="" style="flex:1 auto;border-radius:20px;padding:20px 15px;"></textarea>
                        </div>
                        <div class="row" style="margin-top:20px;">
                            <div class="col-sm-4">
                                <button class="addimage"><input type="file" name="pubimg" id=""></button>
                            </div>
                            <div class="col-sm-8">
                                <button class="pub" type="submit">Publier</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container publier" style="flex: 1 auto;background:white; margin-top:20px;height:64vh;overflow-y:scroll;overflow-x:hidden;">
                    <div style="margin-bottom: 50px;">
                        <div>
                            <div style="display:flex; gap:20px">
                                <img src="http://localhost/Rencontre/publics/image/default-profile.png" alt="" class="img img-responsive" style="width:65px;">
                                <div style="line-height:0px">
                                    <h4>Pseudo</h4>
                                    <p>le: 06/12/2024</p>
                                </div>
                            </div>
                        </div>
                        <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam aliquam sunt nulla perferendis quaerat at neque sequi minima debitis recusandae Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea alias magni architecto cupiditate excepturi doloribus optio. Hic possimus recusandae nostrum.</div>
                        <div class="container" style="width:100%">
                            <img src="http://localhost/Rencontre/publics/image/default-profile.png" alt="" style="object-fit: contains;width:100%">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 bg-success full">
                <div class="container bg-danger" style="width: 100%;">
                    <h4>Accueil</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum rerum eligendi eaque maiores molestiae labore, quaerat, dolorum consequuntur ut aspernatur perferendis dolore ab similique, cupiditate id architecto voluptas nam eveniet. Harum possimus est hic exercitationem nobis, consequatur repellendus quisquam! Quibusdam?</p>
                </div>
                <div class="container" style="border-radius:30px; background-color:white; height:66vh;overflow-y:hidden;width:100%;margin-top:10%">
                    <h4>Membres</h4>
                    <div style="overflow-y:scroll;height:100%">
                        <div style="display:flex;align-items:center">
                            <img src="http://localhost/Rencontre/publics/image/default-profile.png" alt="" class="img img-responsive" style="width:65px;">
                            <h4 style="margin-left:7%">Pseudo</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="http://localhost/Rencontre/publics/js/bootstrap.js"></script>
</body>

</html>