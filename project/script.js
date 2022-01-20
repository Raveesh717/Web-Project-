function validateContact() {
    let email = document.getElementById("email").value;
    let phone = document.getElementById("phone").value;
    let error;

    if (!/^\d{7,}$/.test(phone))
        error = "Please enter a valid phone number.";
    if (email.indexOf("@") == -1 || email.length < 6)
        error = "Please enter valid email address.";

    if (error)
        alert(error);
    return error == null;
}

function validateSignin() {
    let email = document.getElementById("signin-email").value;
    let password = document.getElementById("signin-password").value;
    let error;

    if (!/^\d{8,12}$/.test(password))
        error = "Password must be a number containing between 8 and 12 digits inclusive.";
    if (email.indexOf("@") == -1 || email.length < 6)
        error = "Email address is invalid.";

    if (error)
        alert(error);
    return error == null;
}

function validateRegister() {
    let email = document.getElementById("register-email").value;
    let username = document.getElementById("register-username").value;
    let password = document.getElementById("register-password").value;
    let confirmPassword = document.getElementById("register-confirmpassword").value;
    let error;

    if (password != confirmPassword)
        error = "Password and confirmation password are not equal.";
    if (!/^\d{8,12}$/.test(password))
        error = "Password must be a number containing between 8 and 12 digits inclusive.";
    if (username.length < 6)
        error = "Username must be at least 6 characters long.";
    if (email.indexOf("@") == -1 || email.length < 6)
        error = "Email address is invalid.";

    if (error)
        alert(error);
    return error == null;
}