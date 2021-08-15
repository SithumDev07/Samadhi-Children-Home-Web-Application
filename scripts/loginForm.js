

const usernameInput = document.querySelector('#username');
const passwordInput = document.querySelector('#password');
const submit = document.querySelector('#submit');

let isFocusedUsername = false;
let isFocusedPassword = false;
isRegister = false;

focusEventListener(usernameInput, 'username', isFocusedUsername);
focusEventListener(passwordInput, 'password', isFocusedPassword);


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