const name = document.getElementById('name');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const form = document.getElementById('form1');

// console.log(form);

form.addEventListener('submit', function(e) {
    e.preventDefault();
    // console.log(e);
    inputCheck();
});

function inputCheck() {
    const nameValue = name.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    // console.log(nameValue);

    if (nameValue === '') {
        // console.log('error');
        errorMessage(name, 'Name can\'t be blank username');
    } else if (nameValue.length < 3) {
        errorMessage(name, 'Min length must be 3 or more characters');
    } else if (nameValue.length > 20) {
        errorMessage(name, 'Max length must be less than 20 characters');
    } else {
        successMessage(name);
    }

    //email check
    if (emailValue === '') {
        errorMessage(email, 'Email can\'t be blank email');
    } else if (!emailValue.includes('.')) {
        errorMessage(email, 'Invalid email');
    } else {
        successMessage(email);
    }

    //password check
    if (passwordValue === '') {
        errorMessage(password, 'Password can\'t be blank password');
    } else if (passwordValue.length < 8) {
        errorMessage(password, 'Min length must be 8 or more');
    } else if (passwordValue.length > 25) {
        errorMessage(password, 'Max length must be less than 25');
    } else {
        successMessage(password);
    }

    if (password2Value === '') {
        errorMessage(password2, 'Retype password can\'t be blank password');
    } else if (password2Value.length > 25) {
        errorMessage(password, 'Max length must be less than 25');
    } else if (passwordValue !== password2Value) {
        errorMessage(password2, 'Please type a same password');
    } else {
        successMessage(password2);
    }
}

function errorMessage(input, message) {
    const pname = input.parentElement; //form-group
    // console.log(input);
    const smallMessage = pname.querySelector('p');
    // console.log(smallMessage);
    smallMessage.innerHTML = message;
    // console.log('wrong');
    pname.classList.add('error');
    pname.classList.remove('success');
}

function successMessage(input) {
    const pname = input.parentElement;
    // console.log('success');
    pname.classList.remove('error');
    pname.classList.add('success');
}