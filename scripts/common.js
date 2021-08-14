
// State Selector for only run some functions only on isRegister.js
let isRegister = true;



// Setting the focus status of each input fields
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

// Getting the current focus status true = focused and false = blurred
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


// Event lisener for focus, blur and keyup
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

// Specific Error setter for lables borders
function setErros(wrapper, errorEl, specificError = '') {
    wrapper.classList.add('border-red');
    wrapper.classList.remove('border-yellow');
    errorEl.classList.remove('hidden');

    if(specificError !== '') {
        errorEl.innerHTML = specificError;
    }
}

// If error indicators are added then set them to default status
function setDefault(wrapper, errorEl) {
    // console.log(errorEl, wrapper);
    wrapper.classList.remove('border-red');
    wrapper.classList.add('border-yellow');
    errorEl.classList.add('hidden');
}

// Special Character Validator
function validateSpecialCharacters(input) {
    var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
    return format.test(input) ? true : false;
}

//Main Validatot function
function validate(input, container) {
    // console.log(container);
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

    if(isRegister) {
        if(container == 'username') {
            document.querySelector('.already-taken').classList.add('hidden');
        }
    }
    
}

// Fields are empty validator
function emptyChecker(Element) {
    return Element.value === '' ? true : false;
}

//Two fileds are identical validator
function isMatch(first, second) {
    return first == second ? true : false;
}