$(document).ready(function () {
    var publications = ""
    var idCurrentLast = 0
    $.ajax({
        url: "http://localhost/Rencontre/controllers/publication.php",
        method: "post",
        data: { getpost: "send" },
        dataType: "json",
        success: function (data) {
            for (let i = 0; i < data.length; i++) {
                // let ismine = (myid == data[i].idSend) ? 'flex-end' : 'flex-start'
                publications += "<div data-idpub='"+data[i].idPub+"' style='margin-bottom: 50px;'><div><div style='display:flex; gap:20px'><img src='http://localhost/Rencontre/publics/image/" + data[i].img_src + "' alt='' class='img img-responsive' style='width:65px;'><div style='line-height:0px'><h4>" + data[i].auteur + "</h4><p>le:"+data[i].date+"</p></div></div></div><div>"+data[i].descri+"</div><div class='container' style='width:100%'><img src='http://localhost/Rencontre/publics/image/"+data[i].img_src +"' alt='' style='object-fit: contains;width:100%'></div></div>"
            }
            $("#pub-container").html(publications)
            idCurrentLast = data[data.length-1].idPub
        },
        error: function () {
            console.log("Tsy mety");

        }

    })
    
    setInterval(function () {
        
        $.ajax({
            url: "http://localhost/Rencontre/controllers/publication.php",
            method: "post",
            data: { getpost: "send" },
            dataType: "json",
            success: function (data) {
                console.log("Afaka maka");
                
                if (idCurrentLast != data[data.length-1].idPub){
                    let publication = "<div data-idpub='"+data[data.length-1].idPub+"' style='margin-bottom: 50px;'><div><div style='display:flex; gap:20px'><img src='http://localhost/Rencontre/publics/image/" + data[data.length-1].img_src + "' alt='' class='img img-responsive' style='width:65px;'><div style='line-height:0px'><h4>" + data[data.length-1].auteur + "</h4><p>le:"+data[data.length-1].date+"</p></div></div></div><div>"+data[data.length-1].descri+"</div><div class='container' style='width:100%'><img src='http://localhost/Rencontre/publics/image/"+data[data.length-1].img_src +"' alt='' style='object-fit: contains;width:100%'></div></div>"
                    
                    $("#pub-container").append(publication)
                    idCurrentLast = data[data.length-1].idPub
                }
            },
            error: function () {
                console.log("Tsy mety");
            }

        })

    }, 5000)
})