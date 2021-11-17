const email = document.getElementById('email');
const form = document.querySelector('form');

console.log(email);

form.addEventListener('click', function(e) {
    e.preventDefault();
    loginCheck();
});

function loginCheck() {

    const emailValue = email.value.trim();

    if (emailValue === '') {
        errorMessage(email, 'Email can\'t be blank');
    } else if (!emailValue.includes('.')) {
        errorMessage(email, 'Invalid Email');
    } else {
        successMessage(email);
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