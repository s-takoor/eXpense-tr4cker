// Input validation for Login Form
function validateLoginForm() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    if (empty(username)) {
        alert("Username field cannot be blank!");
        return false;
    } else if(empty(password)) {
        alert("Password field cannot be blank!");
        return false;
    } else if(password.length<5) {
        alert("Password should be greater or equal to 5!");
        return false;
    } else {
        return true;
    }
}

// Input validation for Registration Form
function validateRegistrationForm() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;
    if (empty(username)) {
        alert("Username field cannot be blank!");
        return false;
    } else if(empty(email)) {
        alert("Invalid Email Address!");
        return false;
    } else if(empty(password)) {
        alert("Password field cannot be blank!");
        return false;
    } else if(password.length<5) {
        alert("Password should be greater or equal to 5!");
        return false;
    } else if(empty(confirm_password)) {
      alert("Confirm Password field cannot be blank!");
        return false;
    } else if(password != confirm_password) {
        alert("Password and Confirm Password does not match!")
        return false;
    } else {
        return true;
    }
}

// Input validation for Adding Expenses Modal
function validateAddExpense() {
    var amount = document.getElementById("amount").value;
    var description = document.getElementById("description").value;
    if(empty(amount)) {
        alert("Amount field cannot be blank!");
        return false;
    } else if (amount <= 0) {
        alert("Invalid amount");
        return false;
    } else if(empty(description)) {
        alert("Invalid description");
        return false;
    } else {
        return true;
    }    
}

// Input validation for Adding Income Modal
function validateAddIncome() {
    var amount = document.getElementById("amount").value;
    if(empty(amount)) {
        alert("Amount field cannot be blank!");
        return false;
    } else if (amount <= 0) {
        alert("Invalid amount");
        return false;
    } else {
        return true;
    }
}

// function for validating string declared for Login and Registration Forms
function empty(string) {
    if(string == "" || string === "" || !string || /^\s*$/.test(string)) {
        return true;
    } else{
        return false;
    }
}
