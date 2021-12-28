<?php
// database configuration
include '../includes/config.php';

// start session
session_start();

// declare variables
$data          = $_POST;
$username      = $_SESSION['username'];

/**
 *  input validation (PHP);
 *  check for empty fields in the bootstrap modal form;
 *  echo alert and redirect to expense page;
 *  NOTE: the required option has been omitted to showcase the JavaScript alert
 */

if (
    empty($data['amount']) ||
    empty($data['description']) ||
    empty($data['date'])
) {
    echo '<script>alert("Please fill all required fields!");window.location.href = "http://expense-tracker.hstn.me/resources/expense.php";</script>';
} else {
    /**
     * PDOStatement::execute prepared statement for value insertion in the database
     */
    $statement = $connection->prepare("INSERT INTO expenses (username, amount, description, date) VALUES (:username, :amount, :description, :date)");
    if ($statement) {
        $result = $statement->execute([
            ':username'        => $_SESSION['username'],
            ':amount'          => $data['amount'],
            ':description'     => $data['description'],
            ':date'            => $data['date'],
        ]);

        if ($result) {
            echo '<script>alert("Data saved");window.location.href = "http://expense-tracker.hstn.me/resources/expense.php";</script>';
        }
    }
}
