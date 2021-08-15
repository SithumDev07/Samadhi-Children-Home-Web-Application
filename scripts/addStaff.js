isRegister = false;

const staffFirstName = document.querySelector('#staffFirstname');
const staffLastName = document.querySelector('#staffLastname');
const staffNameWithInitials = document.querySelector('#staffInitials');
const staffBirthday = document.querySelector('#staffBirthday')
const staffNICNumber = document.querySelector('#staffNIC')
const staffGender = document.querySelector('#staffGender')
const staffContactNumber = document.querySelector('#staffContact')
const staffAddress = document.querySelector('#staffAddress')
const staffEmail = document.querySelector('#staffEmail')
const staffPOST = document.querySelector('#staffPost')
const staffImage = document.querySelector('#staffImage')
const staffInsert = document.querySelector('#staffInsert')



let isFocusedStaffFirstName = false;
let isFocusedStaffLastName = false;
let isFocusedStaffNameWithInitials = false;
let isFocusedStaffNIC = false;
let isFocusedStaffContact = false;
let isFocusedStaffAddress = false;
let isFocusedStaffEmail = false;

var date = new Date();
var currentDate = date.toISOString().substring(0,10);
//Minimum and maximum Age for employees
var maximumDate = date.getFullYear() - 16;
var minimumDate = date.getFullYear() - 55;

var newDate = currentDate.replace(date.getFullYear(), maximumDate);

// console.log(currentDate.replace(date.getFullYear(), minimumDate));


if(staffBirthday !== null) {
    // console.log('Working');
    staffBirthday.value = newDate;
    staffBirthday.setAttribute("min", currentDate.replace(date.getFullYear(), minimumDate));
    staffBirthday.setAttribute("max", currentDate);
}

if(staffFirstName !== null && staffLastName !== null && staffNameWithInitials !== null && staffAddress !== null && staffEmail !== null) {
    EventListener(staffFirstName, 'stafffname');
    EventListener(staffLastName, 'stafflname');
    EventListener(staffNameWithInitials, 'staffinitials');
    EventListener(staffEmail, 'staffemail');
}

if(staffInsert !== null) {
    if(staffInsert.addEventListener) {
        staffInsert.addEventListener('click', returnToPrevious);
    } else {
        staffInsert.attachEvent('onclick', returnToPrevious);
    }
}

function returnToPrevious (e) {
    e = e || window.event;

    if(!checkStaffInputs()) {

        
    // if(true) {
        if(e.preventDefault) {
            e.preventDefault();
        } else {
            e.returnValue = false;
        }
    }

    // console.log("Here I am " ,checkStaffInputs());
    // checkChildInputs()

}


function checkStaffInputs() {
    var success = true;


    // console.log(childImage.files.length);

    if(staffImage.files.length !== 0) {
        if(!isValidExtention(staffImage)) {
            success = false;
        }
    
        if(!isValidImageSize(staffImage)) {
            success=false;
        }
    }
    


    if(emptyChecker(staffFirstName)) {
        staffFirstName.classList.add('border-red-500')
        staffFirstName.classList.remove('border-gray-400')
        success =  false;
        // console.log('working');
        // return false;
    }
    else if(validateSpecialCharacters(staffFirstName.value)) {
        staffFirstName.classList.add('border-red-500')
        staffFirstName.classList.remove('border-gray-400')
        success = false
        // console.log('1');
    }

    if(emptyChecker(staffLastName)) {
        staffLastName.classList.add('border-red-500')
        staffLastName.classList.remove('border-gray-400')
        success =  false;
        // console.log('9');
    }
    else if(validateSpecialCharacters(staffLastName.value)) {
        staffLastName.classList.add('border-red-500')
        staffLastName.classList.remove('border-gray-400')
        success =  false;
    }


    if(emptyChecker(staffNameWithInitials)) {
        staffNameWithInitials.classList.add('border-red-500')
        staffNameWithInitials.classList.remove('border-gray-400')
        success =  false;
        // console.log('9');
    }
    else if(validateSpecialCharacters(staffNameWithInitials.value)) {
        staffNameWithInitials.classList.add('border-red-500')
        staffNameWithInitials.classList.remove('border-gray-400')
        success =  false;
    }

    // console.log(staffNICNumber.value.length);


    if(emptyChecker(staffNICNumber)) {
        staffNICNumber.classList.add('border-red-500')
        staffNICNumber.classList.remove('border-gray-400')
        success =  false;
    }
    else if(staffNICNumber.value.length !== 9 && staffNICNumber.value.length !== 12) {
        staffNICNumber.classList.add('border-red-500')
        staffNICNumber.classList.remove('border-gray-400')
        success =  false;
    } else {
        staffNICNumber.classList.remove('border-red-500')
        staffNICNumber.classList.add('border-gray-400')
    }


    if(emptyChecker(staffContactNumber)) {
        staffContactNumber.classList.add('border-red-500')
        staffContactNumber.classList.remove('border-gray-400')
        success =  false;
        // console.log('9');
    }
    else if(staffContactNumber.value.length !== 10) {
        staffContactNumber.classList.add('border-red-500')
        staffContactNumber.classList.remove('border-gray-400')
        success =  false;
    } else {
        staffContactNumber.classList.remove('border-red-500')
        staffContactNumber.classList.add('border-gray-400')
    }

    if(emptyChecker(staffAddress)) {
        staffAddress.classList.add('border-red-500')
        staffAddress.classList.remove('border-gray-400')
        success =  false;
        // console.log('9');
    } else {
        staffAddress.classList.remove('border-red-500')
        staffAddress.classList.add('border-gray-400')
    }

    if(emptyChecker(staffEmail)) {
        staffEmail.classList.add('border-red-500')
        staffEmail.classList.remove('border-gray-400')
        success =  false;
        // console.log('9');
    }
    else if(!isValidEmail(staffEmail)) {
        staffEmail.classList.add('border-red-500')
        staffEmail.classList.remove('border-gray-400')
        success =  false;
    }
    

    return success;

}