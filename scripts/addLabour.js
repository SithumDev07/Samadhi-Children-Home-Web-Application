isRegister = false;

const labourInitialName = document.querySelector('#initials');
const labourFullName = document.querySelector('#fullName');
const labourFirstname = document.querySelector('#firstname');
const labourBirthday = document.querySelector('#birthday');
const labourPhone = document.querySelector('#ContactNumber')
const labourAddress = document.querySelector('#address')
const labourHiring = document.querySelector('#Hiring')
const labourInsert = document.querySelector('#labourInsert')

var date = new Date();
var currentDate = date.toISOString().substring(0,10);
//Minimum and maximum Age for employees
var maximumDate = date.getFullYear() - 16;
var minimumDate = date.getFullYear() - 55;

var newDate = currentDate.replace(date.getFullYear(), maximumDate);


if(labourBirthday !== null) {
    if(labourBirthday.value === '') {
        labourBirthday.value = newDate;
        labourBirthday.setAttribute("min", currentDate.replace(date.getFullYear(), minimumDate));
        labourBirthday.setAttribute("max", currentDate);
    }
}

if(labourInitialName !== null && labourFullName !== null && labourFirstname !== null) {
    EventListener(labourInitialName, 'labourinitials');
    EventListener(labourFullName, 'labourfullname');
    EventListener(labourFirstname, 'labourfullname');
}

if(labourInsert !== null) {
    if(labourInsert.addEventListener) {
        labourInsert.addEventListener('click', returnToPrevious);
    } else {
        labourInsert.attachEvent('onclick', returnToPrevious);
    }
}

function returnToPrevious (e) {
    e = e || window.event;

    if(!checkLabourInputs()) {

        
    // if(true) {
        if(e.preventDefault) {
            e.preventDefault();
        } else {
            e.returnValue = false;
        }
    }

    // console.log("Here I am " ,checkLabourInputs());
    // checkChildInputs()

}


function checkLabourInputs() {
    var success = true;


    if(emptyChecker(labourInitialName)) {
        labourInitialName.classList.add('border-red-500')
        labourInitialName.classList.remove('border-gray-400')
        success =  false;
        // console.log('working');
        // return false;
    }
    else if(validateSpecialCharacters(labourInitialName.value)) {
        labourInitialName.classList.add('border-red-500')
        labourInitialName.classList.remove('border-gray-400')
        success = false
        // console.log('1');
    }

    if(emptyChecker(labourFullName)) {
        labourFullName.classList.add('border-red-500')
        labourFullName.classList.remove('border-gray-400')
        success =  false;
        // console.log('9');
    }
    else if(validateSpecialCharacters(labourFullName.value)) {
        labourFullName.classList.add('border-red-500')
        labourFullName.classList.remove('border-gray-400')
        success =  false;
    }


    if(emptyChecker(labourFirstname)) {
        labourFirstname.classList.add('border-red-500')
        labourFirstname.classList.remove('border-gray-400')
        success =  false;
        // console.log('9');
    }
    else if(validateSpecialCharacters(labourFirstname.value)) {
        labourFirstname.classList.add('border-red-500')
        labourFirstname.classList.remove('border-gray-400')
        success =  false;
    }


    if(emptyChecker(labourPhone)) {
        labourPhone.classList.add('border-red-500')
        labourPhone.classList.remove('border-gray-400')
        success =  false;
        // console.log('9');
    }
    else if(labourPhone.value.length !== 10) {
        labourPhone.classList.add('border-red-500')
        labourPhone.classList.remove('border-gray-400')
        success =  false;
    } else {
        labourPhone.classList.remove('border-red-500')
        labourPhone.classList.add('border-gray-400')
    }

    if(emptyChecker(labourAddress)) {
        labourAddress.classList.add('border-red-500')
        labourAddress.classList.remove('border-gray-400')
        success =  false;
        // console.log('9');
    } else {
        labourAddress.classList.remove('border-red-500')
        labourAddress.classList.add('border-gray-400')
    }
    

    return success;

}