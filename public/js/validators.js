/* CREATED BY PHILIP DROUBI */
import * as helper from './helper.js';

export function validateUserForm(form) {
    let name = form[0].value;
    let email = form[1].value;
    let password = form[2].value;
    let passwordConfirmation = form[3].value;
    if (form.getAttribute('data-usedTO') == 'editAdmin') {
        password = form[3].value;
        passwordConfirmation = form[4].value;
    }
    //name
    if (name.length == 0) {
        helper.createNotification('error', '"Name" field is required');
        return false
    } else if (name.length < 2 || name.length > 255) {
        helper.createNotification('error', 'Invalid Name');
        return false
    }
    //email
    if (!validateEmail(form[1])) {
        return false
    }
    //password
    if (!document.querySelector('.form-card .flex .password').classList.contains('hidden')) {
        if (password.length == 0) {
            helper.createNotification('error', '"password" field is required');
            return false
        } else if (password.length < 6 || password.length > 255) {
            helper.createNotification('error', 'Invalid password');
            return false
        }
        //password confirmation
        if (passwordConfirmation.length == 0) {
            helper.createNotification('error', '"password confirmation" field is required');
            return false
        } else if (passwordConfirmation.length < 6 || passwordConfirmation.length > 255 || password != passwordConfirmation) {
            helper.createNotification('error', 'Invalid password confirmation value');
            return false
        }
    }
    return true;
}

export function validateMessage(form) {
    let subject = form[0].value;
    let body = form[1].value;
    //subject
    if (subject.length == 0) {
        helper.createNotification('error', '"Subject" field is required');
        return false
    } else if (subject.length < 2 || subject.length > 255) {
        helper.createNotification('error', 'Invalid subject');
        return false
    }
    //body
    if (body.length == 0) {
        helper.createNotification('error', '"Body" field is required');
        return false
    } else if (body.length < 2 || body.length > 5000) {
        helper.createNotification('error', 'Invalid body');
        return false
    }
    return true;
}

export function validateProjectForm(form) {
    let name = form[0].value;
    let type = form[1].value;
    let desc = form[2].value;
    let codeSite = form[3].value;
    let liveSite = form[4].value;
    let fem = form[5].value;

    return true;
}

function validateEmail(emailField) {
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (reg.test(emailField.value) == false) {
        helper.createNotification('error', 'Invalid Email !');
        return false;
    }
    return true;
}
