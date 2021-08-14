const usernameInput = document.querySelector('#username');
const firstNameInput = document.querySelector('#firstname');
const lastNameInput = document.querySelector('#lastname');
const phoneInput = document.querySelector('#phone');
const addressInput = document.querySelector('#address');
const passwordInput = document.querySelector('#password');
const reenteredInput = document.querySelector('#reentered');
const submit = document.querySelector('#submit');

let isFocusedUsername = false;
let isFocusedFirstname = false;
let isFocusedLastname = false;
let isFocusedPhone = false;
let isFocusedAddress = false;
let isFocusedPassword = false;
let isFocusedReentered = false;



focusEventListener(usernameInput, 'username', isFocusedUsername);
focusEventListener(firstNameInput, 'firstname', isFocusedFirstname);
focusEventListener(lastNameInput, 'lastname', isFocusedLastname);
focusEventListener(phoneInput, 'phone', isFocusedPhone);
focusEventListener(addressInput, 'address', isFocusedAddress);
focusEventListener(passwordInput, 'password', isFocusedPassword);
focusEventListener(reenteredInput, 'reentered', isFocusedReentered);



if(submit.addEventListener) {
    submit.addEventListener('click', returnToPrevious);
} else {
    submit.attachEvent('onclick', returnToPrevious);
}

function returnToPrevious (e) {
    e = e || window.event;

    if(!checkInputs()) {
        if(e.preventDefault) {
            e.preventDefault();
        } else {
            e.returnValue = false;
        }
    }

}


function checkInputs() {
    var success = true;

    if(emptyChecker(usernameInput)) {
        setErros(
            document.querySelector(`.username-wrapper`),
            document.querySelector(`.error-message-username`),
            'Username is required'
        );
        success =  false;
        // console.log('1');
        // return false;
    }
    else if(validateSpecialCharacters(usernameInput.value)) {
        success = false
        // console.log('1');
    }

    if(emptyChecker(firstNameInput)) {
        setErros(
            document.querySelector(`.firstname-wrapper`),
            document.querySelector(`.error-message-firstname`),
            'Firstname is required'
        );
        success =  false;
        console.log('effecting');
    }
    else if(validateSpecialCharacters(firstNameInput.value)) {
        success = false;
        // console.log('4');
    }

    if(emptyChecker(lastNameInput)) {
        setErros(
            document.querySelector(`.lastname-wrapper`),
            document.querySelector(`.error-message-lastname`),
            'Lastname is required'
        );
        success =  false;
        // console.log('5');
    }
    else if(validateSpecialCharacters(lastNameInput.value)) {
        success = false;
        // console.log('6');
    }

    if(emptyChecker(phoneInput)) {
        setErros(
            document.querySelector(`.phone-wrapper`),
            document.querySelector(`.error-message-phone`),
            'Phone Number is required'
        );
        success =  false;
        // console.log('5');
    }
    else if(phoneInput.value.length !== 10) {
        setErros(
            document.querySelector(`.phone-wrapper`),
            document.querySelector(`.error-message-phone`),
            'Phone Number is invalid'
        );
        success =  false;
    }

    if(emptyChecker(addressInput)) {
        setErros(
            document.querySelector(`.address-wrapper`),
            document.querySelector(`.error-message-address`),
            'Address is required'
        );
        success =  false;
        // console.log('7');
    }

    if(emptyChecker(passwordInput)) {
        setErros(
            document.querySelector(`.password-wrapper`),
            document.querySelector(`.error-message-password`),
            'Password is required'
        );
        reenteredInput.value = '';
        success =  false;
        // console.log('9');
    }
    else if(passwordInput.value.length < 8) {
        setErros(
            document.querySelector(`.password-wrapper`),
            document.querySelector(`.error-message-password`),
            "Password should contains at least 8 characters" 
        );
        success =  false;
    }

    if(emptyChecker(reenteredInput)) {
        setErros(
            document.querySelector(`.reentered-wrapper`),
            document.querySelector(`.error-message-reentered`),
            "Passwords don't match" 
        );
        success =  false;
        // console.log('10');
    }
    else if(!isMatch(passwordInput.value, reenteredInput.value)) {
        setErros(
            document.querySelector(`.reentered-wrapper`),
            document.querySelector(`.error-message-reentered`),
            "Passwords don't match" 
        );
        success =  false;
        // console.log('11');
    }
    
    // console.log(success);
    return success;

}