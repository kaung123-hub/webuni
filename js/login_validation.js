const email = document.getElementById('email');
const password = document.getElementById('password');
const form = document.querySelector('form');

console.log(form);

form.addEventListener('click', function(e) {
    e.preventDefault();
    loginCheck();
});

function loginCheck() {

    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();

    if (emailValue === '') {
        errorMessage(email, 'Email can\'t be blank');
    } else if (!emailValue.includes('.')) {
        errorMessage(email, 'Invalid Email');
    } else {
        successMessage(email);
    }

    if (passwordValue === '') {
        errorMessage(password, 'Password can\'t be blank');
    } else if (passwordValue.length < 8) {
        errorMessage(password, 'Min Length must be greater than 8 or more');
    } else if (passwordValue.length > 25) {
        errorMessage(password, 'Max Length must be less than 25');
    } else {
        successMessage(password);
    }
}

function errorMessage(input, message) {
    const pname = input.parentElement;
    const smallMessage = pname.querySelector('p');
    smallMessage.innerHTML = message;
    pname.classList.add('error');
    pname.classList.remove('success');
}

function successMessage(input) {
    const pname = input.parentElement;
    pname.classList.add('success');
    pname.classList.remove('error');
}