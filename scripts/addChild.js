isRegister = false;

const initialName = document.querySelector('#InitialName');
const fullName = document.querySelector('#fullName');
const birthday = document.querySelector('#birthdate');
const insertChild = document.querySelector('#submitChild')
const childImage = document.querySelector('#insertChildImage')




let isFocusedInitials = false;
let isFocusedFullName = false;

var date = new Date();
var currentDate = date.toISOString().substring(0,10);
//Minimum and maximum Age for employees
var maximumDate = date.getFullYear() - 0;
var minimumDate = date.getFullYear() - 18;

var newDate = currentDate.replace(date.getFullYear(), maximumDate);

// console.log(currentDate.replace(date.getFullYear(), minimumDate));


if(birthday !== null) {
    birthday.value = newDate;
    birthday.setAttribute("min", currentDate.replace(date.getFullYear(), minimumDate));
    birthday.setAttribute("max", currentDate);
}

if(initialName !== null && fullName !== null) {
    EventListener(initialName, 'initials', isFocusedInitials);
    EventListener(fullName, 'fullname', isFocusedFullName);
}

if(insertChild.addEventListener) {
    insertChild.addEventListener('click', returnToPrevious);
} else {
    insertChild.attachEvent('onclick', returnToPrevious);
}

function returnToPrevious (e) {
    e = e || window.event;

    // if(!checkChildInputs()) {

        
    if(true) {
        if(e.preventDefault) {
            e.preventDefault();
        } else {
            e.returnValue = false;
        }
    }

    console.log("Here I am " ,checkChildInputs());
    // checkChildInputs()

}


function checkChildInputs() {
    var success = true;


    // console.log(isValidImageSize(childImage));

    if(!isValidExtention(childImage)) {
        success = false;
    }

    if(!isValidImageSize(childImage)) {
        success=false;
    }


    if(emptyChecker(initialName)) {
        initialName.classList.add('border-red-500')
        initialName.classList.remove('border-gray-400')
        success =  false;
        // console.log('working');
        // return false;
    }
    else if(validateSpecialCharacters(initialName.value)) {
        initialName.classList.add('border-red-500')
        initialName.classList.remove('border-gray-400')
        success = false
        // console.log('1');
    }

    if(emptyChecker(fullName)) {
        fullName.classList.add('border-red-500')
        fullName.classList.remove('border-gray-400')
        success =  false;
        // console.log('9');
    }
    else if(validateSpecialCharacters(fullName.value)) {
        fullName.classList.add('border-red-500')
        fullName.classList.remove('border-gray-400')
        success =  false;
    }

    // console.log(isValidExtention(childImage));


    

    
    // console.log(success);
    if(success) {
        initialName.classList.remove('border-red-500')
    initialName.classList.remove('border-gray-400')
    initialName.classList.add('border-green-500')
    fullName.classList.remove('border-red-500')
    fullName.classList.remove('border-gray-400')
    fullName.classList.add('border-green-500')
    }
    return success;

}