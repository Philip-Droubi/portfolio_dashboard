// CRETEAD BY PHILIP DROUBI
import * as validator from './validators.js';

let darkLayer = document.querySelector('.dark-layer');
let formBtnClicked = false;
export function createNotification(nClass = 'correct', parg) {
    if (document.querySelector(".notifi-box")) {
        let Elter = document.querySelector(".notifi-box");
        Elter.remove();
    }
    let Ealert = document.createElement('div');
    Ealert.classList.add(`${nClass}`, 'notifi-box');
    Ealert.innerHTML =
        `
            <p>${parg}</p>
            `;
    document.body.appendChild(Ealert);
    setTimeout(function () {
        Ealert.style.top = '50px';
    }, 50)
    setTimeout(() => {
        Ealert.style.top = '-70px';
        setTimeout(() => {
            Ealert.remove();
        }, 400)
    }, 3500);
}

export function handleFormBtnClick(event, btn) {
    let form = btn.parentElement;
    let validated = false;
    switch (btn.getAttribute('data-task')) {
        case 'UserCreate':
            validated = validator.validateUserForm(form);
            break;
        case 'AnswerMessage':
            validated = validator.validateMessage(form);
            break;
        case 'CreateProject':
            validated = validator.validateProjectForm(form);
            break;
        default:
            break;
    }
    if (validated && !formBtnClicked) {
        formBtnClicked = true;
        btn.lastElementChild.innerHTML = "<i class='fa fa-spinner' aria-label='Loading'></i>";
        btn.lastElementChild.classList.add('loading');
    } else {
        event.preventDefault();
    }
}

export function handleAdminPasswordUI(form) {
    let password = document.querySelector('.form-card .flex .password');
    if (password.classList.contains('hidden')) {
        password.classList.remove('hidden');
        document.querySelector('.form-card .flex .password-confirmation').classList.remove('hidden');
    } else {
        password.classList.add('hidden');
        document.querySelector('.form-card .flex .password-confirmation').classList.add('hidden');
    }
}

export function showMoreSec(btn, msg) {
    btn.classList.contains('active') ? btn.classList.remove('active') : btn.classList.add('active');
    msg.lastElementChild.classList.contains('active') ? msg.lastElementChild.classList.remove('active') : msg.lastElementChild.classList.add('active');
}

export async function initArrayInputs(arrayInputs) {
    arrayInputs.forEach(element => {
        let addBtn = element.lastElementChild;
        let removeBtns;
        let oldValuesList = JSON.parse(element.getAttribute('data-oldValues')) ?? [];
        let minfields = element.getAttribute('data-minFields');
        let maxfields = element.getAttribute('data-maxFields');
        let inputCount = 0;
        // observe chenges on array ui
        const observer = new MutationObserver((mutationsList, observer) => {
            for (const mutation of mutationsList) {
                if (mutation.type === 'childList') {
                    removeBtns = document.querySelectorAll('.array-input-ui .field .delete-field');
                    removeBtns.forEach((btn) => {
                        if (!btn.getAttribute("data-hasEventListener")) {
                            btn.addEventListener('click', (event) => {
                                event.preventDefault();
                                let inputRemoved = removeArrayInputField(btn, element, inputCount);
                                if (inputRemoved) {
                                    inputCount = inputCount - 1;
                                }
                            });
                            btn.setAttribute('data-hasEventListener', "true");
                        }
                    });
                }
            }
        });
        observer.observe(element, {
            attributes: false,
            childList: true,
            subtree: false,
        });
        //Add min field
        for (let i = 0; i < minfields && i < maxfields; i++) {
            let value = '';
            if (oldValuesList[inputCount]) {
                value = oldValuesList[inputCount];
            }
            let newDiv = createNewArrayInputField(addBtn, element, inputCount, value);
            if (newDiv) {
                inputCount++;
                element.insertBefore(newDiv, addBtn);
            }
        }
        //Below will fix removed inputs
        for (let i = inputCount; i < maxfields; i++) {
            if (oldValuesList[i]) {
                let value = oldValuesList[i];
                createNewArrayInputField(addBtn, element, inputCount, value);
                inputCount++;
            }
        }
        removeBtns = document.querySelectorAll('.array-input-ui .field .delete-field');
        //add btn
        addBtn.addEventListener('click', () => {
            let addInput = createNewArrayInputField(addBtn, element, inputCount);
            if (addInput) {
                addInput.lastElementChild.firstElementChild.firstElementChild.focus();
                inputCount++;
            };
        });
    });
}

function createNewArrayInputField(addBtn, ele, inputCount, value = "") {
    if (inputCount < ele.getAttribute('data-maxfields')) {
        let newDiv = document.createElement('div');
        let inputID = `${ele.getAttribute('data-fieldName')}${inputCount}`;
        let inputName = ele.getAttribute('data-fieldName');
        let labelName = `${ele.getAttribute('data-lebalName')} ${inputCount + 1}`;
        newDiv.innerHTML = `
                <label for="${inputID}">${labelName}</label>
                <div class="field">
                    <span>
                        <input type="text" name="${inputName}" id="${inputID}" placeholder="${labelName}" value="${value}">
                    </span>
                    <button tabindex="0" class="delete-field" aria-label="Delete input number ${inputCount + 1}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </div>
            `;
        ele.insertBefore(newDiv, addBtn);
        return newDiv;
    }
    return false;
}

function removeArrayInputField(removeBtn, ele, inputCount) {
    if (inputCount > ele.getAttribute('data-minfields')) {
        removeBtn.parentElement.parentElement.remove();
        let j = 0;
        for (let i = 0; i < ele.children.length; i++) {
            if (ele.children[i].tagName == 'DIV') {
                let div = ele.children[i];
                let inputID = `${ele.getAttribute('data-fieldName')}${j}`;
                let inputName = ele.getAttribute('data-fieldName');
                let labelName = `${ele.getAttribute('data-lebalName')} ${j + 1}`;
                div.firstElementChild.setAttribute('for', inputID);
                div.firstElementChild.innerHTML = labelName;
                div.lastElementChild.firstElementChild.firstElementChild.setAttribute('id', inputID);
                div.lastElementChild.firstElementChild.firstElementChild.setAttribute('placeholder', labelName);
                div.lastElementChild.lastElementChild.setAttribute('aria-label', `Delete input number ${j + 1}`);
                j++;
            }
        }
        return true;
    }
    return false;
}

export function activeMoreSec() {
    let popup = document.querySelector('.more-sec-popup');
    popup.classList.remove('hidden');
    darkLayer.classList.remove('hidden');
    let codeEditor = document.querySelector('.more-sec-popup #more-code');
    if (codeEditor.innerHTML) {
        codeEditor.innerHTML = replaceBackslashQuote(codeEditor.innerHTML);
    } else
        codeEditor.innerHTML = `<div class="content">  </div>`
    handleCodeEditor(codeEditor);
}

export function closeMoreSec() {
    let popup = document.querySelector('.more-sec-popup');
    popup.classList.add('hidden');
    darkLayer.classList.add('hidden');
}

export function handleCodeEditor(editor) {
    let resultView = document.querySelector('.more-sec-popup .result .moreInfo');
    let inithtml = `
    <button class="exit" aria-label="close the more info menu"><i class="fa fa-close"></i></button>
    `
    resultView.innerHTML = inithtml + editor.value;
}

export function getJsonString(str = "") {
    str = str.replace(/\s{2,}/g, ' ');
    str = str.replace(/\t/g, ' ');
    str = str.replace(/(\r\n|\n|\r)/gm, "");
    for (let index = 0; index < str.length; index++) {
        if (str[index] == `"`) {
            str = str.slice(0, index) + "\\\"" + str.slice(index + 1);
            index++;
        }
    }
    return str;
}

function replaceBackslashQuote(str) {
    return str.replace(/\\"/g, '"');
}

export function deleteProjectImage(thumbnail) {
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'deleted_media[]';
    input.value = thumbnail.getAttribute("data-imgID");
    const parent = thumbnail.parentElement.parentElement;
    parent.append(input);
    thumbnail.remove();
}

//files uploader
const files = [];
let imageCheckerID = "image-checker";
let imageCheckerIDCounter = 0;

export function upload(input) {
    files.push(...input.files);
    updateThumbnails();
}

function remove(name) {
    const index = files.findIndex(file => file.name === name);
    if (index === -1) return;
    files.splice(index, 1);
    updateThumbnails();
}

function makeThumbnail(file) {
    return new Promise((resolve) => {
        const reader = new FileReader();
        function onLoad(event) {
            const img = new Image(200, 200);
            img.alt = file.name;
            img.onload = () => {
                const container = document.createElement("div");
                container.classList.add("thumbnail");
                const button = document.createElement("button");
                button.classList.add('remove-img');
                button.textContent = "❌";
                button.addEventListener("click", (event) => {
                    event.preventDefault();
                    remove(file.name)
                });
                let id = imageCheckerID + imageCheckerIDCounter;
                const label = document.createElement("label");
                const checker = document.createElement("input");
                const hiddenChecker = document.createElement("input");
                label.setAttribute('for', id);
                label.innerHTML = "Included in main page";
                checker.setAttribute('type', 'checkbox');
                checker.setAttribute('id', id);
                checker.classList.add("image-checker");
                checker.classList.add("image-checker");
                checker.checked = true;
                hiddenChecker.setAttribute('type', 'hidden');
                hiddenChecker.setAttribute('name', 'checks[]');
                hiddenChecker.value = 1;
                container.append(img, button, label, hiddenChecker, checker);
                resolve(container);
                imageCheckerIDCounter += 1;
            };
            img.onerror = () => resolve(null);
            img.src = event.target.result;
        }
        reader.onload = onLoad;
        reader.onerror = () => resolve(null);
        reader.readAsDataURL(file);
    });
}

function removeChildren(node) {
    while (node.lastElementChild && !node.lastElementChild.classList.contains('thumbnail-old-image')) {
        node.lastElementChild.remove();
    } return node;
}

function updateThumbnails() {
    const thumbnails = document.querySelector(".thumbnails");
    const input = document.querySelector(".media-input");
    input.value = "";
    Promise
        .all(files.map(makeThumbnail))
        .then(images => images.filter(img => img !== null))
        .then(images => removeChildren(thumbnails).append(...images));
    const dataTransfer = new DataTransfer();
    files.forEach(file => {
        dataTransfer.items.add(file);
    });
    input.files = dataTransfer.files;
}

export function ProjectcheckersList(form) {
    let mediaSec = form.querySelector(".project-media");
    let thumbs = mediaSec.lastElementChild.children;
    for (let i = 0; i < thumbs.length; i++) {
        if (!thumbs[i].lastElementChild.checked) {
            thumbs[i].lastElementChild.previousElementSibling.value = 0; //change input value
        }
    }
    let oldImages = form.querySelectorAll('.thumbnail-old-image');
    if (oldImages) {
        let counter = 0;
        oldImages.forEach(img => {
            addToEditedCheckList(counter, mediaSec, img);
            counter++;
        });
    }
}

function addToEditedCheckList(counter, mediaSec, image) {
    const checkBtn = image.querySelector('.image-checker');
    const id = document.createElement('input');
    id.type = 'hidden';
    id.name = `edited_checks[${counter}][id]`;
    id.value = image.getAttribute('data-imgID');
    const check = document.createElement('input');
    check.type = 'hidden';
    check.name = `edited_checks[${counter}][check]`;
    if (checkBtn.checked)
        check.value = "1";
    else check.value = "0";
    mediaSec.append(id, check);
    return true;
}

export function activeMore(moreBtn) {
    let moreInfo = document.querySelector('.moreInfo');
    moreInfo.classList.remove('hidden');
    let inithtml = `
    <button class="exit" aria-label="close the more info menu"><i class="fa fa-close"></i></button>
    `
    moreInfo.innerHTML = inithtml +
        `<div class="content">`
        + replaceBackslashQuote(moreBtn.getAttribute('data-value'))
        + "</div>";
    darkLayer.classList.remove('hidden');

    document.querySelector('.moreInfo .exit').addEventListener('click', closeMore);
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' || e.keyCode === 27) {
            closeMore();
        }
    });
    darkLayer.addEventListener('click', closeMore);
}

export function closeMore() {
    let moreInfo = document.querySelector('.moreInfo');
    moreInfo.classList.add('hidden');
    darkLayer.classList.add('hidden');
}
