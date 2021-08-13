// const usernameInput = document.querySelector('#username');
// const passwordInput = document.querySelector('#password');

// const usernameWrapper = document.querySelector('.username-wrapper');
// const passwordWrapper = document.querySelector('.password-wrapper');

// const floatingUsernameLable = document.querySelector('.floating-username');
// const floatingPasswordLable = document.querySelector('.floating-password');

// const usernameError = document.querySelector('.error-message-username');

// let isFocusedUsername = false;
// let isFocusedPassword = false;

// usernameInput.addEventListener('focus', () => {
//     floatingUsernameLable.classList.add('active-lable');
//     usernameWrapper.classList.remove('border-gray-300');
//     usernameWrapper.classList.add('border-yellow');
//     isFocusedUsername = true;
// })

// usernameInput.addEventListener('blur', () => {
//     if(usernameInput.value == '')
//     floatingUsernameLable.classList.remove('active-lable');
//     usernameWrapper.classList.add('border-gray-300');
//     usernameWrapper.classList.remove('border-yellow');
//     isFocusedUsername = false;
// })

// passwordInput.addEventListener('focus', () => {
//     floatingPasswordLable.classList.add('active-lable');
//     passwordWrapper.classList.remove('border-gray-300');
//     passwordWrapper.classList.add('border-yellow');
//     isFocusedPassword = true;
// })

// passwordInput.addEventListener('blur', () => {
//     if(passwordInput.value == '')
//     floatingPasswordLable.classList.remove('active-lable');
//     passwordWrapper.classList.add('border-gray-300');
//     passwordWrapper.classList.remove('border-yellow');
//     isFocusedPassword = false;
// })

// function setErros(wrapper, errorEl) {
//     wrapper.classList.add('border-red');
//     wrapper.classList.remove('border-yellow');
//     errorEl.classList.remove('hidden');
// }

// function setDefault(wrapper, errorEl = undefined) {
//     wrapper.classList.remove('border-red');
//     wrapper.classList.add('border-yellow');
//     if(errorEl !== undefined) {
//         errorEl.classList.add('hidden');
//     }
// }

// function validateSpecialCharacters(input) {
//     var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
//     return format.test(input) ? true : false;
// }

// usernameInput.addEventListener('keyup', () => {
//     if(isFocusedUsername)
//     validate(usernameInput);
// });

// passwordInput.addEventListener('keyup', () => {
//     if(isFocusedPassword)
//     setDefault(passwordWrapper);
// })


// function validate(input) {
//     if(validateSpecialCharacters(input.value)) {
//         setErros(usernameWrapper, usernameError);
//     } else {
//         setDefault(usernameWrapper, usernameError);
//     }
// }


// if(submit.addEventListener) {
//     submit.addEventListener('click', returnToPrevious);
// } else {
//     submit.attachEvent('onclick', returnToPrevious);
// }

// function returnToPrevious (e) {
//     e = e || window.event;

//     if(!checkInputs()) {
//         if(e.preventDefault) {
//             e.preventDefault();
//         } else {
//             e.returnValue = false;
//         }
//     }

// }



const usernameInput = document.querySelector('#username');
const passwordInput = document.querySelector('#password');
const submit = document.querySelector('#submit');

let isFocusedUsername = false;
let isFocusedPassword = false;


function setTrueOrFalse(value, variable) {
    if(value === true || value === false) {
        switch(variable) {
            case 'username':
                isFocusedUsername = value;
                break;
            case 'password':
                isFocusedPassword = value;
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
        case 'password':
            return isFocusedPassword;
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
focusEventListener(passwordInput, 'password', isFocusedPassword);


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
    if(!(container == 'password')) {
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

    if(container == 'password') {
        document.querySelector('.wrong-password').classList.add('hidden');
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
        
    // if(true) {
        if(e.preventDefault) {
            e.preventDefault();
        } else {
            e.returnValue = false;
        }
    }

    // console.log(checkInputs());

}

function emptyChecker(Element) {
    return Element.value === '' ? true : false;
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

    if(emptyChecker(passwordInput)) {
        setErros(
            document.querySelector(`.password-wrapper`),
            document.querySelector(`.error-message-password`),
            'Password is required'
        );
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

    
    // console.log(success);
    return success;

}