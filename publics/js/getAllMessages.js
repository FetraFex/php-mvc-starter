$(document).ready(function(){
    var myid = $("#myid").data("myid")
    let conversation = ""
    $.ajax({
        method: "POST",
        data: { getConversation: "send", myid: myid},
        dataType: 'json',
        url: "http://localhost/Rencontre/controllers/message.php",
        success: function (data) {
            if (data.length){
                for(let i=0; i<data.length; i++){
                    conversation += "<div style='display:flex;align-items:center;height:8vh'><img src='http://localhost/Rencontre/publics/image/default-profile.png' alt='' class='img img-responsive' style='width:65px;'><div style='line-height:0'><h4>Pseudo</h4><p>Pseudo</p></div></div>"
                }
                ("#conversation-container").html(conversation)
            }else {
                console.log("Mbl vide")
            }
        },
        error: function (e) {
            alert("error")
        }
    })
})