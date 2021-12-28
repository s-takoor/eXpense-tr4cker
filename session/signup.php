<?php
// include database configuration
include '../includes/config.php';

// start session
session_start();

// declare variables
$data       = $_POST;

// filter registration data
$username   = stripcslashes(strip_tags($data['username']));
$email      = stripcslashes(strip_tags($data['email']));
$password   = htmlspecialchars($data['password']);
$password   = htmlspecialchars($data['confirm_password']);

/* input validation (PHP);
 * check for empty fields;
 * alert user to fill all fields with redirect to registration page
 */
if (empty($data['username']) || empty($data['email']) || empty($data['password']) || empty($data['confirm_password'])) {
    echo '<script>alert("Please fill all required fields!");window.location.href = "http://expense-tracker.hstn.me/register.php";</script>';
    die();
}

/* PDO FETCH Statement to query the database to verify if username is already registered;
 * alert user if username already exist and redirect to registration page
 */
$username = $data['username'];
$check_username = $connection->query("SELECT * FROM users WHERE username LIKE '$username'")->fetch(PDO::FETCH_ASSOC);

if (!empty($check_username)) {
    echo '<script>alert("This username is already taken. Please register with another username or login if you already have an account.");window.location.href = "http://expense-tracker.hstn.me/register.php";</script>';
    die();
}

// check database to see if email address is already registered
$email = $data['email'];
$check_email = $connection->query("SELECT * FROM users WHERE email LIKE '$email'")->fetch(PDO::FETCH_ASSOC);

if (!empty($check_email)) {
    echo '<script>alert("This email is already registered. Please register with another email.");window.location.href = "http://expense-tracker.hstn.me/register.php";</script>';
    die();
}

// data validation for password and confirm password in php
if ($data['password'] !== $data['confirm_password']) {
    echo '<script>alert("Password and Confirm Password does not match!");window.location.href = "http://expense-tracker.hstn.me/register.php";</script>';
    die();
}

unset($data['confirm_password']);

// PDO Prepare Statement to register user in database
$statement = $connection->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
if ($statement) {
    $result = $statement->execute([
        ':username' => $data['username'],
        ':email'    => $data['email'],
        ':password' => md5($data['password']),
    ]);

    if ($result) {
        echo '<script>alert("Thank you for your registration. Please login to continue");window.location.href = "http://expense-tracker.hstn.me/login.php";</script>';
    } else {
        echo '<Script>alert("An error has occured. Please try again!");window.location.href = "http://expense-tracker.hstn.me/resources/404.php";</script>';
    }
}
