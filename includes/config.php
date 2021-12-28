<?php
// connection to database using PDO
$dsn = 'mysql:dbname=mseet_30307107_expense_tracker;host=sql112.hstn.me';
$dbUser = 'mseet_30307107';
$dbPassword = 'AyQcS72sWxHa';

$options = [
    PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
];

// try and catch block for connection and error
try {
    $connection = new PDO($dsn, $dbUser, $dbPassword, $options);
} catch (Exception $e) {
    error_log($e->getMessage());
    exit('Error connecting to the database'); // show message to user in case there is an error connecting to the database
}
