$(document).ready(function () {
    $("#login").on("click", function (e) {
        e.preventDefault();
        const email = $("#email").val();
        const password = $("#password").val();

        $.post(
            "../src/login.php",
            {
                user_email: email,
                user_password: password
            },
            function (data, status) {
                //alert("Message: " + data);
                if (data == "Invalid email format.") {
                    const msg = $("#mailErr").html("Invalid email format.");
                } else if (data == "Please provide your email.") {
                    const msg = $("#mailErr").html(
                        "Please provide your email."
                    );
                }

                const errPass = $("#passErr").html(data);
            }
        );
        //console.log(email, password);
    });

    $("#register").on("click", function (ev) {
        ev.preventDefault();
        alert(ev);
        console.log(ev);
       // $.ajax({
    //        method: "POST",
     //       url: "../src/register.php"
        //    });
    });

    function ajax() {
        //
    }
});
