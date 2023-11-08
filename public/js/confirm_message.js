let confirmBox = document.querySelector('.confirmation-box');
let darkLayer = document.querySelector('.dark-layer');
let confirmBtn = document.querySelector('.confirmation-box .confirm');
let cancelBtn = document.querySelector('.confirmation-box .cancel');
let callBtn = document.querySelectorAll('.confirm-call-btn');

if (confirmBox) {
    cancelBtn.addEventListener('click', closeBox);
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' || e.keyCode === 27) {
            closeBox();
        }
    });
    darkLayer.addEventListener('click', closeBox);
}

callBtn.forEach(e => {
    e.addEventListener('click', () => { openBox(e) })
});

function closeBox() {
    confirmBox.classList.add('hidden');
    darkLayer.classList.add('hidden');
}

function openBox(btn) {
    confirmBox.classList.remove('hidden');
    darkLayer.classList.remove('hidden');
    let title = document.querySelector('.confirmation-box .title').textContent = btn.getAttribute('data-title');
    let message = document.querySelector('.confirmation-box .message').textContent = btn.getAttribute('data-message');
    let cancelbtn = document.querySelector('.confirmation-box .cancel');
    let form = document.querySelector('.confirmation-box form');
    let confirmBtn = document.querySelector('.confirm');
    cancelBtn.textContent = btn.getAttribute('data-backMessage');
    if (btn.getAttribute('data-backClass')) {
        cancelBtn.classList.remove('red');
    }
    cancelBtn.classList.add(btn.getAttribute('data-backClass'));
    confirmBtn.textContent = btn.getAttribute('data-formMessage');
    if (btn.getAttribute('data-formClass')) {
        confirmBtn.classList.remove('green');
    }
    confirmBtn.classList.add(btn.getAttribute('data-formClass'));
    form.setAttribute('action', btn.getAttribute('data-formAction'));
}
