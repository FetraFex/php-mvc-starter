$(document).ready(function () {

    $("#pub-form").on("submit", function (e) {
        e.preventDefault();
        var descri = $("#description").val()
        var pseudo = $("#auteur").text()
        // var img = $("#img_pub").val()

        if (descri != "") {
            var formData = new FormData(this);
            formData.append("pseudo", pseudo);
            // Send AJAX request
            $.ajax({
                url: "http://localhost/Rencontre/controllers/publication.php",
                type: "POST",
                data: formData,
                contentType: false,    // Don't set content type
                processData: false,    // Don't process the data
                success: function (data) {
                    console.log(data);
                },
                error: function () {
                    alert("Error publishing!");
                }
            });
        }
    })

    
})