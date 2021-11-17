const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const form = document.querySelector('form');

form.addEventListener("click", function(e) {
    e.preventDefault();
    loginCheck();
})

function loginCheck() {
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();

    if (passwordValue === '') {
        errorMessage(password, 'Password can\'t be blank');
    } else if (passwordValue.length < 8) {
        errorMessage(password, 'Min Length must be greater than 8 or more');
    } else if (passwordValue.length > 25) {
        errorMessage(password, 'Max Length must be less than 25');
    } else {
        successMessage(password);
    }


    if (password2Value === '') {
        errorMessage(password2, 'Retype Password can\'t be blank');
    } else if (password2Value.length < 8) {
        errorMessage(password2, 'Min Length must be greater than 8 or more');
    } else if (password2Value.length > 25) {
        errorMessage(password2, 'Max Length must be less than 25');
    } else {
        successMessage(password2);
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