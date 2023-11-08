// CRETEAD BY PHILIP DROUBI
import * as helper from './helper.js';
const eye = document.querySelector('.eye');
const passinput = document.querySelector('#pass');
const i = document.querySelector('.password i');
let isClicked = false;

if (window.innerHeight < parseInt(getComputedStyle(document.body).height)) {
    document.body.style.setProperty('min-height', `${window.innerHeight}px`);
}// this condition will fix the body height for some mobile devices.

eye.addEventListener('click', () => {
    passinput.type === 'password' ? passinput.type = 'text' : passinput.type = 'password';
    if (i.classList.contains('fa-eye')) {
        i.classList.remove('fa-eye');
        i.classList.add('fa-eye-slash');
    } else {
        i.classList.add('fa-eye');
        i.classList.remove('fa-eye-slash');
    }
});

let btn = document.querySelector('.msg-btn');

btn.addEventListener('click', (e) => {
    let form = document.querySelector(".login-form");
    if (validateloginForm(form) && !isClicked) {
        btn.lastElementChild.innerHTML = "";
        btn.firstElementChild.style.left = "-10%";
        btn.style.backgroundColor = "transparent";
        btn.lastElementChild.classList.add('loading');
        isClicked = true;
    } else {
        e.preventDefault();
    }
});

window.addEventListener('load', () => {
    btn.lastElementChild.innerHTML = "login";
    btn.lastElementChild.classList.remove('loading');
    btn.firstElementChild.style.left = "-145%";
    btn.style.backgroundColor = "rgba(140, 136, 155, 0.425)";
    btn.blur();
    isClicked = false;
});

function validateloginForm(form) {
    let name = form[0].value.length;
    let password = form[1].value.length;

    if (name == 0) {
        helper.createNotification('error', '"Name" field is required');
        return false
    } else if (name < 2 || password > 255) {
        helper.createNotification('error', 'Invalid Name');
        return false
    }

    if (password == 0) {
        helper.createNotification('error', '"password" field is required');
        return false
    } else if (password < 6 || password > 255) {
        helper.createNotification('error', 'Invalid password');
        return false
    }
    return true;
}
