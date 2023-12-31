/* CREATED BY PHILIP DROUBI */
import * as helper from './helper.js';
//Form submit BTN
let formsBtn = document.querySelectorAll('.form-card button');
formsBtn.forEach(btn => {
    btn.addEventListener('click', (e) => {
        helper.handleFormBtnClick(e, btn)
    });
});
//End form submit BTN

//Change admin password checkbox
let UICheckBox = document.querySelector('.UI-check-box input[name="change-password"]');
if (UICheckBox)
    UICheckBox.addEventListener('click', (e) => helper.handleAdminPasswordUI(e.target.parentElement.parentElement))
//End change admin password checkbox

//flash message
let flashMessage = document.querySelector('.toast');
let flashCloseIcon = document.querySelector(".toast .close");
let flashProgress = document.querySelector(".toast .progress-line");

let flashTimer1, flashTimer2;

flashTimer1 = setTimeout(() => {
    if (flashMessage)
        flashMessage.classList.remove("active");
}, 5000);

flashTimer2 = setTimeout(() => {
    if (flashMessage)
        flashProgress.classList.remove("active");
}, 5300);

if (flashCloseIcon) {
    flashCloseIcon.addEventListener("click", () => {
        if (flashMessage)
            flashMessage.classList.remove("active");

        setTimeout(() => {
            if (flashMessage)
                flashProgress.classList.remove("active");
        }, 300);

        clearTimeout(flashTimer1);
        clearTimeout(flashTimer2);
    });
}

//End flash message
//view more sec
let viewMore = document.querySelectorAll('.more');
viewMore.forEach(btn => {
    btn.addEventListener('click', () => {
        helper.showMoreSec(btn, btn.parentElement);
    });
});
//End view more sec

/** //TODO : With array section
 *  Check for hidden input old value and regenerate inputs field
 *  On submit you need to create a list of inputs field value then json_encode the list
 *  Create the min amount of fields depend on the data-minFields and dont remove it
 *  Create remove field button
 *  Don't create more than the max amount of fields depending on data-maxFields
 *  Make a cute notification
 *  Validate the list onSubmit
 *  Clear this inputs on Submit >>> Or better try to place it out of the main form
 *  Dont add new input field if the last one is empty and dont add it to list
 *  focus on the last created input field
 *  RENAME all field whene delete one
 * data info :
    data-parentForm="create-project-form" ==> (id) the parent form
    data-minFields='0'                    ==> min input fields
    data-maxFields='10'                   ==> max input fields
    data-inputToPutValueIn="techs"        ==> (id) input field that I should put the encoded value of the list in
    data-fieldName="techs[]"              ==> The name of the input field will be generated by JS
    data-oldValues                        ==> The old value for all fields need json_decode
    data-lebalName="Tech"                 ==> The name of the lebals

 *  Another Way is to :
 *   Create a new input without creating a new full form
 */

let arrayInputs = document.querySelectorAll('.form-card .array-input-ui');
if (arrayInputs) helper.initArrayInputs(arrayInputs);

// more sec code input
let moreSecBtn = document.querySelector('.more-section-btn');
if (moreSecBtn) {
    moreSecBtn.addEventListener('click', () => {
        helper.activeMoreSec();
    });

    document.querySelector('.exit-popup').addEventListener('click', helper.closeMoreSec);
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' || e.keyCode === 27) {
            helper.closeMoreSec();
        }
    });
    darkLayer.addEventListener('click', helper.closeMoreSec);
}

let codeEditor = document.querySelector('.more-sec-popup #more-code');
if (codeEditor) {
    codeEditor.addEventListener('input', () => {
        helper.handleCodeEditor(codeEditor);
    });
}

let generateJsonCodeBtn = document.querySelector('.more-sec-popup .generate-code')
if (generateJsonCodeBtn) {
    generateJsonCodeBtn.addEventListener('click', () => {
        let str = helper.getJsonString(codeEditor.value);
        let input = document.querySelector('#create-project-form .more-code #more_code').value = str;
        helper.closeMoreSec()
    });
}

//image uploader
let uploadImageBtn = document.querySelector('.media-input');
let projectForm = document.querySelector('#create-project-form');
if (uploadImageBtn) {
    uploadImageBtn.addEventListener('change', () => {
        helper.upload(uploadImageBtn);
    });
}
if (projectForm) {
    projectForm.addEventListener('submit', (event) => {
        helper.ProjectcheckersList(projectForm);
    });
}
//delete image\
let oldImages = document.querySelectorAll('.thumbnail-old-image');
if (oldImages) {
    oldImages.forEach(img => {
        //Remove Image
        img.querySelector('.remove-img').addEventListener('click', (event) => {
            event.preventDefault();
            helper.deleteProjectImage(img);
        });
    });
}

//Show More section in index.php (Projects)
let moreBtn = document.querySelectorAll('.more-btn');
if (moreBtn) {
    moreBtn.forEach(element => {
        element.addEventListener('click', () => {
            helper.activeMore(element);
        });
    });
}
