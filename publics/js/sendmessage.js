$(document).ready(function(){
    var currentIdConversation = null
    var myid = $("#myid").data("myid")

    $("#send").click(() => {
        var message = $("#message").val()
        var messages = ""
        if (message != "") {
            $.ajax({
                method: "POST",
                url: "http://localhost/Rencontre/controllers/message.php",
                data: { send: "send", message: message, myid: myid, id: currentIdConversation },
                dataType: 'text',
                success: () => {
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
                }
            })
        } else {
            alert("Tsy afaka alefa")
        }
    })

    $(".membre").click(function(){
        var messages = ""
        currentIdConversation = $(this).data("id")
        $(".pseudo").text($(this).find(".interlocuteur").text()) 

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
    })
})