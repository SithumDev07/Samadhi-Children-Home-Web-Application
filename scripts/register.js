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


function setTrueOrFalse(value, variable) {
    if(value === true || value === false) {
        switch(variable) {
            case 'username':
                isFocusedUsername = value;
                break;
            case 'firstname':
                isFocusedFirstname = value;
                break;
            case 'lastname':
                isFocusedLastname = value;
                break;
            case 'phone':
                isFocusedPhone = value;
                break;
            case 'address':
                isFocusedAddress = value;
                break;
            case 'password':
                isFocusedPassword = value;
                break;
            case 'reentered':
                isFocusedReentered = value;
                break;
            default:
                throw new Error(`Invalid varible name: ${variable}`);
        }
    } else {
        throw new Error(`Invalid Value, Value must be true or false`);
    }
    
}

function getTrueOrFalse(container) {
    switch(container) {
        case 'username':
            return isFocusedUsername;
        case 'firstname':
            return isFocusedFirstname;
        case 'lastname':
            return isFocusedLastname;
        case 'phone':
            return isFocusedPhone;
        case 'address':
            return isFocusedAddress;
        case 'password':
            return isFocusedPassword;
        case 'reentered':
            return isFocusedReentered;
        default:
            throw new Error(`Invalid varible name: ${variable}`);
    }
}

function focusEventListener(Element, container, variable) {
        Element.addEventListener('focus', () => {
          document.querySelector(`.floating-${container}`).classList.add('active-lable');
          document.querySelector(`.${container}-wrapper`).classList.remove('border-gray-300');
          document.querySelector(`.${container}-wrapper`).classList.add('border-yellow');
          setTrueOrFalse(true, container);
        })
        Element.addEventListener('blur', () => {
          if(Element.value == '')
          document.querySelector(`.floating-${container}`).classList.remove('active-lable');
          document.querySelector(`.${container}-wrapper`).classList.add('border-gray-300');
          document.querySelector(`.${container}-wrapper`).classList.remove('border-yellow');
          setTrueOrFalse(false, container);
        })
        Element.addEventListener('keyup', () => {
            if(getTrueOrFalse(container))
            validate(Element, container);
            console.log(variable);
        });
}

focusEventListener(usernameInput, 'username', isFocusedUsername);
focusEventListener(firstNameInput, 'firstname', isFocusedFirstname);
focusEventListener(lastNameInput, 'lastname', isFocusedLastname);
focusEventListener(phoneInput, 'phone', isFocusedPhone);
focusEventListener(addressInput, 'address', isFocusedAddress);
focusEventListener(passwordInput, 'password', isFocusedPassword);
focusEventListener(reenteredInput, 'reentered', isFocusedReentered);


function setErros(wrapper, errorEl, specificError = '') {
    wrapper.classList.add('border-red');
    wrapper.classList.remove('border-yellow');
    errorEl.classList.remove('hidden');

    if(specificError !== '') {
        errorEl.innerHTML = specificError;
    }
}

function setDefault(wrapper, errorEl) {
    wrapper.classList.remove('border-red');
    wrapper.classList.add('border-yellow');
    errorEl.classList.add('hidden');
}


function validateSpecialCharacters(input) {
    var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
    return format.test(input) ? true : false;
}

function validate(input, container) {
    if(!(container == 'password' || container == 'reentered' || container == 'address' || container == 'phone')) {
        if(validateSpecialCharacters(input.value)) {
            setErros(
                document.querySelector(`.${container}-wrapper`),
                document.querySelector(`.error-message-${container}`),
                'Special Characters not allowed!'
            );
        } else {
            setDefault(
                document.querySelector(`.${container}-wrapper`),
                document.querySelector(`.error-message-${container}`)
            );
        }
    } 
    else {
        setDefault(
            document.querySelector(`.${container}-wrapper`),
            document.querySelector(`.error-message-${container}`)
        );
    }

    if(container == 'username') {
        document.querySelector('.already-taken').classList.add('hidden');
    }
    
}


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

function emptyChecker(Element) {
    return Element.value === '' ? true : false;
}

function isMatch(first, second) {
    return first == second ? true : false;
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
        // console.log('3');
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