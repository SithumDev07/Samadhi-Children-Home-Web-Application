isRegister = false;

const donarName = document.querySelector('#donarName');
const donarContactNumber = document.querySelector('#donarContactNumber');
const donarAddress = document.querySelector('#donarAddress');
const submitDonar = document.querySelector('#submitDonar');
const donarAmount = document.querySelector('#DonarAmount');

const isFocusedDonarName = false;
const isFocusedDonarContact = false;
const isFocusedDonarAddress = false;
const isFocusedDonarAmount = false;

if(donarName !== null) {
    EventListener(donarName, 'donarname');
}

if(submitDonar !== null) {
    if(submitDonar.addEventListener) {
        submitDonar.addEventListener('click', returnToPrevious);
    } else {
        submitDonar.attachEvent('onclick', returnToPrevious);
    }
}


function returnToPrevious (e) {
    e = e || window.event;

    if(!checkDonarInputs()) {

        
    // if(true) {
        if(e.preventDefault) {
            e.preventDefault();
        } else {
            e.returnValue = false;
        }
    }

    // console.log("Here I am " ,checkDonarInputs());
    // checkChildInputs()

}


function checkDonarInputs() {
    var success = true;


    if(emptyChecker(donarName)) {
        donarName.classList.add('border-red-500')
        donarName.classList.remove('border-gray-400')
        success =  false;
        // console.log('working');
        // return false;
    }
    else if(validateSpecialCharacters(donarName.value)) {
        donarName.classList.add('border-red-500')
        donarName.classList.remove('border-gray-400')
        success = false
        // console.log('1');
    }

    if(emptyChecker(donarContactNumber)) {
        donarContactNumber.classList.add('border-red-500')
        donarContactNumber.classList.remove('border-gray-400')
        success =  false;
        // console.log('9');
    } else if(donarContactNumber.value.length !== 10) {
        donarContactNumber.classList.add('border-red-500')
        donarContactNumber.classList.remove('border-gray-400')
        alert('Invalid Contact Number');
        success =  false;
    }

    if(emptyChecker(donarAddress)) {
        donarAddress.classList.add('border-red-500')
        donarAddress.classList.remove('border-gray-400')
        success =  false;
        // console.log('9');
    }

    if(emptyChecker(donarAmount)) {
        donarAmount.classList.add('border-red-500')
        donarAmount.classList.remove('border-gray-400')
        success =  false;
    }

    
    // console.log(success);
    // if(success) {
    // initialName.classList.remove('border-red-500')
    // initialName.classList.remove('border-gray-400')
    // initialName.classList.add('border-green-500')
    // fullName.classList.remove('border-red-500')
    // fullName.classList.remove('border-gray-400')
    // fullName.classList.add('border-green-500')
    // }
    return success;

}