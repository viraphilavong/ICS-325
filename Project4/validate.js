/**
 * Created by marty on 6/5/2016.
 * Validation From
 */

function validateForm(){
    // Set error catcher
    var error = 0;
    // Validate uid
    if(!validateUid('uid')){
        document.getElementById('uidError').style.display = "block";
        error++;
    }// Validate password
    if(!validatePassword('pword')){
        document.getElementById('pwordError').style.display = "block";
        error++;
    }
    // Validate name
    if(!validateName('name')){
        document.getElementById('nameError').style.display = "block";
        error++;
    }
    // Validate address
    if(!validateAddress('address')){
        document.getElementById('addressError').style.display = "block";
        error++;
    }
    // Validate city
    if(!validateCity('city')){
        document.getElementById('cityError').style.display = "block";
        error++;
    }
    // Validate state dropdown box
    if(!validateSelect('state')){
        document.getElementById('stateError').style.display = "block";
        error++;
    }
    // Validate zipcode
    if(!validateZcode('zcode')){
        document.getElementById('zcodeError').style.display = "block";
        error++;
    }
    // Validate email
    if(!validateEmail(document.getElementById('email').value)){
        document.getElementById('emailError').style.display = "block";
        error++;
    }
    // Validate Radio Buttons
    if(validateRadio('male')){

    }else if(validateRadio('female')){

    }else{
        document.getElementById('gendError').style.display = "block";
        error++;
    }

    if(!validateCheckbox('accept')){
        document.getElementById('termsError').style.display = "block";
        error++;
    }
    // Don't submit form if there are errors
    if(error > 0){
        return false;
    }
}

// Validate uid
function validateUid(x){
    // Validation rule
    var re = /[A-Za-z\-0-9]$/;
    // Check input
    if(re.test(document.getElementById(x).value)){
        // Style none
        document.getElementById(x).style.background ='none';
        // Hide error prompt
        document.getElementById(x + 'Error').style.display = "none";
        return true;
    }else{
        // error - Style yellow
        document.getElementById(x).style.background ='yellow';
        // Show error prompt
        document.getElementById(x + 'Error').style.display = "block";
        return false;
    }
}

// Validate password
function validatePassword(x){
    // Validation rule
    var re = /[A-Za-z\-0-9]$/;
    // Check input
    if(re.test(document.getElementById(x).value)){
        // Style none
        document.getElementById(x).style.background ='none';
        // Hide error prompt
        document.getElementById(x + 'Error').style.display = "none";
        return true;
    }else{
        // error - Style yellow
        document.getElementById(x).style.background ='yellow';
        // Show error prompt
        document.getElementById(x + 'Error').style.display = "block";
        return false;
    }
}

function validateName(x){
    // Validation rule
    var re = /[A-Za-z -']$/;
    // Check input
    if(re.test(document.getElementById(x).value)){
        // Style none
        document.getElementById(x).style.background ='none';
        // Hide error prompt
        document.getElementById(x + 'Error').style.display = "none";
        return true;
    }else{
        // error - Style yellow
        document.getElementById(x).style.background ='yellow';
        // Show error prompt
        document.getElementById(x + 'Error').style.display = "block";
        return false;
    }
}

// Validate address
function validateAddress(x){
    // Validation rule
    var re = /[A-Za-z\-0-9 -']$/;
    // Check input
    if(re.test(document.getElementById(x).value)){
        // Style none
        document.getElementById(x).style.background ='none';
        // Hide error prompt
        document.getElementById(x + 'Error').style.display = "none";
        return true;
    }else{
        // error - Style yellow
        document.getElementById(x).style.background ='yellow';
        // Show error prompt
        document.getElementById(x + 'Error').style.display = "block";
        return false;
    }
}

//Validate city
function validateCity(x){
    // Validation rule
    var re = /[A-Za-z -']$/;
    // Check input
    if(re.test(document.getElementById(x).value)){
        // Style none
        document.getElementById(x).style.background ='none';
        // Hide error prompt
        document.getElementById(x + 'Error').style.display = "none";
        return true;
    }else{
        // error - Style yellow
        document.getElementById(x).style.background ='yellow';
        // Show error prompt
        document.getElementById(x + 'Error').style.display = "block";
        return false;
    }
}

// Validate State - Select boxes
function validateSelect(x){

    if(document.getElementById(x).selectedIndex !== 0){
        // Style none
        document.getElementById(x).style.background ='none';
        document.getElementById(x + 'Error').style.display = "none";
        return true;
    }else{
        // error - Style yellow
        document.getElementById(x).style.background ='yellow';
        return false;
    }
}

//Validate zipcode
function validateZcode(x){
    // Validation rule
    var re = /[0-9]$/;
    // Check input
    if(re.test(document.getElementById(x).value)){
        // Style none
        document.getElementById(x).style.background ='none';
        // Hide error prompt
        document.getElementById(x + 'Error').style.display = "none";
        return true;
    }else{
        // error - Style yellow
        document.getElementById(x).style.background ='yellow';
        // Show error prompt
        document.getElementById(x + 'Error').style.display = "block";
        return false;
    }
}

// Validate email
function validateEmail(email){
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(email)){
        // Style none
        document.getElementById('email').style.background ='none';
        document.getElementById('emailError').style.display = "none";
        return true;
    }else{
        // error - Style yellow
        document.getElementById('email').style.background ='yellow';
        return false;
    }
}

function validateRadio(x){
    if(document.getElementById(x).checked){
        return true;
    }else{
        return false;
    }
}

function validateCheckbox(x){
    if(document.getElementById(x).checked){
        return true;
    }
    return false;
}


