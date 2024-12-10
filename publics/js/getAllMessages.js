$(document).ready(function(){
    var myid = $("#myid").data("myid")
    let conversation = ""

    $("#conversation-container").on("click", "#conversation", function() {
        var messages = ""
        let currentIdConversation = $(this).data("id");
        $.ajax({
            method: "POST",
            data: { getmessage: "send", myid: myid, id: currentIdConversation },
            dataType: 'json',
            url: "http://localhost/Rencontre/controllers/message.php",
            success: function (data) {
                for (let i = 0; i < data.length; i++) {
                    let ismine = (myid == data[i].idSend) ? 'flex-end' : 'flex-start'
                    messages += "<div class='container' style='width:100%;display:flex;justify-content:" + ismine + ";margin-bottom:5px'><div style='width:50%;background-color:blue;padding:18px 20px;border-radius:20px;color:white;font-weight:bold'>" + data[i].contenu + "</div></div>"
                }
                $(".container-message").html(messages)
            },
            error: function (e) {
                alert("error")
            }
        })
    });
    
    $.ajax({
        method: "POST",
        data: { getConversation: "send", myid: myid},
        dataType: 'json',
        url: "http://localhost/Rencontre/controllers/message.php",
        success: function (data) {            
            if (data.length){
                for(let i=0; i<data.length; i++){
                    let locId = (myid == data[i].idParticipant1)? data[i].idParticipant2 : data[i].idParticipant1
                    console.log(locId)
                    conversation += "<div class='membre conversation' style='display:flex;align-items:center;height:8vh'><img src='http://localhost/Rencontre/publics/image/default-profile.png' alt='' class='img img-responsive' style='width:65px;'><div style='line-height:0'><h4>Pseudo</h4><p>"+data[i].contenu+"</p></div></div>"
                }
                $("#conversation-container").html(conversation)
            }else {
                console.log("Mbl vide")
            }
        },
        error: function () {
            alert("error be")
        }
    })

    setInterval(() => {
        conversation = ""
        $.ajax({
            method: "POST",
            data: { getConversation: "send", myid: myid},
            dataType: 'json',
            url: "http://localhost/Rencontre/controllers/message.php",
            success: function (data) {

                if (data.length){
                    for(let i=0; i<data.length; i++){
                        let locId = (myid == data[i].idParticipant1)? data[i].idParticipant2 : data[i].idParticipant1
                        conversation += "<div data-id="+locId+" class='membre conversation' id='conversation' style='display:flex;align-items:center;height:8vh'><img src='http://localhost/Rencontre/publics/image/default-profile.png' alt='' class='img img-responsive' style='width:65px;'><div style='line-height:0'><h4>Pseudo</h4><p>"+data[i].contenu+"</p></div></div>"
           
                    }
                    $("#conversation-container").html(conversation)
                }else {
                    console.log("Mbl vide")
                }
            },
            error: function () {
                alert("error be")
            }
        })
        
    }, 1500);
})