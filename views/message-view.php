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
        padding: 0 1%;
    }

    .leftcard {
        display: flex;
        align-items: center;
        padding: 10px 0;
        gap: 20px;
    }

    .message {
        background-color: white;
        padding: 3% 2%;
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

    .conversation{
        background-color: red;
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
                <li><a href="#">Accueil</a></li>
                <li><a href="http://localhost/Rencontre/membre/liste">Membre</a></li>
                <li class="active"><a href="http://localhost/Rencontre/membre/liste">Message</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://localhost/Rencontre/membre/mon_profil/" id="myid" data-myid="<?= $_SESSION["idMembre"]?>"><?= $_SESSION["pseudo"] ?></a></li>
                <li><a href="http://localhost/Rencontre/membre/deconnexion/">Se deconnecter </a></li>
            </ul>
        </div>
    </nav>

    <div class="full-height bg-danger" style="padding:2%">
        <div class="row full">
            <div class="col-sm-3 bg-warning full padding-x">
                <div class="container" style="border-radius:30px;background-color:white; height:76.5vh;overflow-y:hidden;width:100%;margin-top:10%">
                    <h4>Messages</h4>
                    <div style="overflow-y:scroll;height:73vh;" id="conversation-container">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 bg-success full" style="display:flex;flex-direction:column;">
                <div class="container message">
                    <h4 class="pseudo">Messagerie</h4>
                </div>
                <div class="container message container-message" style="height:60vh;background-color:white;border-bottom: 1px solid black;overflow-y:scroll">
 
                </div>
                <div class="container message">
                    <form action="http://localhost/Rencontre/publication/message" method="post">
                        <div style="display:flex;">
                            <textarea name="message" id="message" style="flex:1 auto;border-radius:20px;padding:20px 15px;"></textarea>
                        </div>
                    </form>
                    <div class="row" style="margin-top:20px;">
                        <div class="container" style="width:100%">
                            <button class="pub" id="send">message</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 bg-success full">
                <div class="container bg-danger" style="width: 100%;">
                    <h4>Accueil</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum rerum eligendi eaque maiores molestiae labore, quaerat, dolorum consequuntur ut aspernatur perferendis dolore ab similique, cupiditate id architecto voluptas nam eveniet. Harum possimus est hic exercitationem nobis, consequatur repellendus quisquam! Quibusdam?</p>
                </div>
                <div class="container" style="border-radius:30px; background-color:white; height:59.3vh;overflow-y:hidden;width:100%;margin-top:10%">
                    <h4>Membres</h4>
                    <div style="overflow-y:scroll;height:100%">
                        <?php
                            $data = $mm->selectAll();
                            foreach ($data as $d) {
                                if ($_SESSION["pseudo"] != $d->pseudo){
                                    echo '<div style="display:flex;align-items:center" data-id='.$d->idMembre.' >
                                            <img src="http://localhost/Rencontre/publics/image/'. $d->pdp.'" alt="" class="img img-responsive" style="object-fit:cover;width:65px;height:65px;border-radius:50%">
                                            <h4 style="margin-left:7%" class="interlocuteur">'.$d->pseudo.'</h4>
                                        </div>';
                                    }
                                } 
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="http://localhost/Rencontre/publics/js/jquery-3.7.1.min.js"></script>
    <script src="http://localhost/Rencontre/publics/js/bootstrap.js"></script>
    <script src="http://localhost/Rencontre/publics/js/sendmessage.js"></script>
    <script src="http://localhost/Rencontre/publics/js/getAllMessages.js"></script>
</body>

</html>