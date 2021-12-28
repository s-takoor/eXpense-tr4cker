<?php
// include database configuration
include '../includes/config.php';

// start session
session_start();

// declare variable
$data = $_POST;

// PHPisset to determine if variable is declared and is different than null
// Filter for SQL injection on username and password fields
if (isset($data['username']) && isset($data['password'])) {
    $username = stripcslashes(strip_tags($data['username']));
    $password = md5(htmlspecialchars($data['password']));

    // Query MySQL Database for username and password;
    $statement = $connection->query("SELECT * FROM users WHERE username LIKE '$username' AND password LIKE '$password'");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    // store result in an array
    $user = array_shift($result);

    // check if USERNAME and PASSWORD is present in USERS table;
    if ($user['username'] === $username && $user['password'] === $password) {
        $_SESSION['username'] = $user['username'];
        // redirect to dashboard if login successful;
        echo '<script>window.location.href = "http://expense-tracker.hstn.me/resources/dashboard.php";</script>';
    } else {
        // alert user with redirect to login form if unsuccessful login;
        echo '<script>alert("Wrong username or password. Please try again!");window.location.href = "http://expense-tracker.hstn.me/login.php";</script>';
    }
}
