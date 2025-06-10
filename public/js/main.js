$(document).ready(function () {
    $("#login").on("click", function (e) {
        e.preventDefault();
        const email = $("#email").val();
        const password = $("#password").val();
        
        $.post("../src/login.php", {
            user_email: email,
            user_password: password
        }, function(data, status){
            alert("Data: " + data + "\nStatus: " + status);
        });
        //console.log(email, password);
    });
});
