const uname = document.getElementById("name");
uname.addEventListener("input", ajax);

const uemail = document.getElementById("email");
uemail.addEventListener("input", ajax);

const upassword = document.getElementById("password");
upassword.addEventListener("input", ajax);

const cpassword = document.getElementById("cpassword");
cpassword.addEventListener("input", ajax);

const register = document.getElementById("register");
register.addEventListener("click", e => {
    e.preventDefault();
    if (upassword !== cpassword) {
        //alert("Mismatch password");
    }
    //ajax();
});

function ajax() {
    const name = uname.value;
    const email = uemail.value;
    const password = upassword.value;

    const ajax = new XMLHttpRequest();
    //console.log(ajax);
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == 2)
                document.getElementById("emailMsg").innerText =
                    "Please provid your email address";
        }
    };

    let data = {
        name: name,
        email: email,
        password: password
    };

    const userData = JSON.stringify(data);

    ajax.open("POST", "../src/register.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //ajax.setRequestHeader("www-encodede-url");
    ajax.send(userData);
}
//ajax();
