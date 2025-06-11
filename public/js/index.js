const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const confirmInput = document.getElementById("cpassword");

const nameHelp = document.getElementById("nameHelp");
const emailHelp = document.getElementById("emailHelp");
const passwordHelp = document.getElementById("passwordHelp");
const confirmHelp = document.getElementById("confirmHelp");

const strengthBar = document.querySelector("#strengthMeter #bar");
const form = document.getElementById("registerForm");

function validateName() {
    const uname = nameInput.value.trim();
    const regexp = /^[a-zA-Z]*$/;
    if (uname !== "") {
        if (regexp.test(uname)) {
            nameInput.classList.add("valid");
            nameInput.classList.remove("invalid");
            nameHelp.textContent = "Valid Name ✔";
            nameHelp.classList.add("valid");
        } else {
            nameInput.classList.add("invalid");
            nameInput.classList.remove("valid");
            nameHelp.textContent = "Invalid name ❌";
            nameHelp.classList.remove("valid");
        }
    }
}

function validateEmail() {
    console.log(emailInput);
    const email = emailInput.value.trim();
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (regex.test(email)) {
        emailInput.classList.add("valid");
        emailInput.classList.remove("invalid");
        emailHelp.textContent = "Valid email ✔";
        emailHelp.classList.add("valid");
    } else {
        emailInput.classList.add("invalid");
        emailInput.classList.remove("valid");
        emailHelp.textContent = "Invalid email ❌";
        emailHelp.classList.remove("valid");
    }
}

function checkPasswordStrength(pw) {
    let strength = 0;
    if (pw.length >= 8) strength++;
    if (/[A-Z]/.test(pw)) strength++;
    if (/\d/.test(pw)) strength++;
    if (/[!@#$%^&*]/.test(pw)) strength++;

    strengthBar.className = "";
    if (strength <= 1) {
        strengthBar.classList.add("weak");
        return "Weak ❌";
    } else if (strength === 2 || strength === 3) {
        strengthBar.classList.add("medium");
        return "Medium ⚠️";
    } else {
        strengthBar.classList.add("strong");
        return "Strong ✔";
    }
}

function validatePassword() {
    const pw = passwordInput.value;
    const message = checkPasswordStrength(pw);

    if (pw.length >= 8) {
        passwordInput.classList.add("valid");
        passwordInput.classList.remove("invalid");
        passwordHelp.textContent = message;
        passwordHelp.classList.add("valid");
    } else {
        passwordInput.classList.add("invalid");
        passwordInput.classList.remove("valid");
        passwordHelp.textContent = message;
        passwordHelp.classList.remove("valid");
    }
}

function validateConfirm() {
    if (
        confirmInput.value === passwordInput.value &&
        confirmInput.value.length > 0
    ) {
        confirmInput.classList.add("valid");
        confirmInput.classList.remove("invalid");
        confirmHelp.textContent = "Passwords match ✔";
        confirmHelp.classList.add("valid");
    } else {
        confirmInput.classList.add("invalid");
        confirmInput.classList.remove("valid");
        confirmHelp.textContent = "Passwords do not match ❌";
        confirmHelp.classList.remove("valid");
    }
}

emailInput.addEventListener("input", validateEmail);
nameInput.addEventListener("input", validateName);
passwordInput.addEventListener("input", () => {
    validatePassword();
    validateConfirm();
});
confirmInput.addEventListener("input", validateConfirm);

form.addEventListener("submit", function (e) {
    e.preventDefault();
    validateName();
    validateEmail();
    validatePassword();
    validateConfirm();

    if (
        nameInput.classList.contents("valid") &&
        emailInput.classList.contains("valid") &&
        passwordInput.classList.contains("valid") &&
        confirmInput.classList.contains("valid")
    ) {
        alert("Registration successful!");
    } else {
        alert("Please correct the highlighted fields.");
    }
});
