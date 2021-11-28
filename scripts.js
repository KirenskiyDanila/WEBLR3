function registrationEventListener () {
    const pass = document.querySelector('#txtNewPassword');
    const nameBlock = document.querySelector('#RegistrationName');
    const email = document.querySelector('#email');
    const repeatPass = document.querySelector('#txtConfirmPassword');
    const tel = document.querySelector('#tel');
    const info = document.querySelector('#info');

    repeatPass.addEventListener('input', function () {
        if (!passCheck())
        {
            document.querySelector('#txtConfirmPassword').style.borderColor = 'red';
        }
        else
        {
            document.querySelector('#txtConfirmPassword').style.borderColor = 'green';
        }
    });

    function passCheck(){
        return pass.value === repeatPass.value;
    }

    function changeBackgroundRegistration() {
        if (pass.validity.patternMismatch || tel.validity.patternMismatch || email.validity.patternMismatch
            || nameBlock.validity.patternMismatch || repeatPass.validity.patternMismatch ||
            pass.validity.valueMissing || tel.validity.valueMissing || email.validity.valueMissing
            || nameBlock.validity.valueMissing || repeatPass.validity.valueMissing
            || !info.checked || !passCheck() || pass.value.length < 7 || repeatPass.value.length < 7) {
            document.querySelector('#button').style.backgroundColor = 'darkgray';
        } else {
            document.querySelector('#button').style.backgroundColor = 'darkred';
        }
    }

    pass.addEventListener('input', changeBackgroundRegistration);
    nameBlock.addEventListener('input', changeBackgroundRegistration);
    email.addEventListener('input', changeBackgroundRegistration);
    repeatPass.addEventListener('input', changeBackgroundRegistration);
    tel.addEventListener('input', changeBackgroundRegistration);
    info.addEventListener('input', changeBackgroundRegistration);
}

function loginEventListener() {
    const LoginPass = document.querySelector('#loginPassword');
    const LoginEmail = document.querySelector('#loginEmail');

    function changeBackgroundLogin() {
        if (LoginPass.validity.patternMismatch || LoginEmail.validity.patternMismatch
            || LoginPass.validity.valueMissing || LoginEmail.validity.valueMissing
            || LoginPass.value.length < 7) {
            document.querySelector('#login_button').style.backgroundColor = 'darkgray';
        } else {
            document.querySelector('#login_button').style.backgroundColor = 'darkred';
        }
    }

    LoginPass.addEventListener('input', changeBackgroundLogin);
    LoginEmail.addEventListener('input', changeBackgroundLogin);
}

function ticket_load(id) {
    let Req = new XMLHttpRequest();
    Req.onload = function () {
        const tickets = JSON.parse(this.responseText);
        for (let i = 0; i < tickets.length; i++) {
            document.getElementById("content").innerHTML += tickets[i];
        }
        ticket_check();
    }
    Req.open("get", "load_script.php?id=" + id, true);
    Req.send();
}

function ticket_check() {
    const id = findLastId();
    let Req = new XMLHttpRequest();
    Req.onload = function () {
        const tickets = JSON.parse(this.responseText);
        if (tickets === 0) {
            document.getElementById("load_button").style.display = "none";
        }
    }
    Req.open("get", "ticket_check_script.php?id=" + id, true);
    Req.send();
}

function findLastId() {
    let parentDIV = document.getElementById("content");
    let idArray = [];
    for (let i = 0; i < parentDIV.children.length; i++) {
        idArray.push(parentDIV.children[i]['id']);
    }
    return Math.max.apply(null, idArray) + 1;

}