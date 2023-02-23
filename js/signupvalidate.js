function setError(element, msg) {
    const input = element.parentElement;
    const errorDisplay = input.querySelector('.msg-box');

    errorDisplay.innerText = msg;
    errorDisplay.classList.add('error');
}

function setSuccess(element) {
    const input = element.parentElement;
    const errorDisplay = input.querySelector('.msg-box');

    errorDisplay.innerText = "";
    errorDisplay.classList.remove('error');
}

function namevalidation() {
    var name = document.getElementById('name');
    var nameV = name.value;
    if (nameV == "") {
        setError(name, 'Name cannot be empty');
        return false;
    }
    if (nameV.length < 5) {
        setError(name, 'Name cannot be less than 5 characters');
        return false;
    }
    if (nameV.length > 20) {
        setError(name, 'Name cannot be more than 20 characters');
        return false;
    } else {
        setSuccess(name);
        return true;
    }
}

function emailvalidation() {
    var email = document.getElementById('email');
    var emailV = email.value;
    if (!(emailV.match(/^[a-zA-Z\d\s\._]+@[a-z\.]+\.[a-z]{2,3}$/))) {
        setError(email, 'Invalid email format');
        return false;
    } else {
        setSuccess(email);
        return true;
    }
}

function passwordvalidation() {
    var password = document.getElementById('pass');
    var passwordV = password.value;

    if (passwordV.length < 8) {
        setError(password, 'Password cannot be less than 8 cahracters');
        return false;
    }
    if (passwordV.length > 20) {
        setError(password, 'Password cannot be more than 20 characters');
        return false;

    } else {
        setSuccess(password);
        return true;
    }

}

function cpasswordvalidation() {
    var password = document.getElementById('pass');
    var cpassword = document.getElementById('cpass');
    var passwordV = password.value;
    var cpasswordV = cpassword.value;
    if (cpasswordV != passwordV) {
        setError(cpassword, "Password and Confirm password doesn't match");
        return false;
    }
    if (cpasswordV == "") {
        setError(cpassword, 'Confirm password cannot be empty');
        return false;
    } else {
        setSuccess(cpassword);
        return true;
    }
}

function formvalidate() {
    if (namevalidation() && emailvalidation() && passwordvalidation() && cpasswordvalidation()) {
        var form = document.getElementById('form');
        form.submit();
    } else {
        event.preventDefault();
    }
}