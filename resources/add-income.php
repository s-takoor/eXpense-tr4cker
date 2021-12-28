<?php
// database configuration
include '../includes/config.php';

// start session
session_start();

// declare variables
$data          = $_POST;
$username      = $_SESSION['username'];

// PHP validation for empty fields
if (
    empty($data['amount']) ||
    empty($data['date'])
) {
    echo '<script>alert("Please fill all required fields!");window.location.href = "http://expense-tracker.hstn.me/resources/dashboard.php";</script>';
} else {

    /**
     * PDO Prepared Statement for data insertion into database
     * echo alert to user for successful insertion
     */
    $statement = $connection->prepare('INSERT INTO income (username, amount, date) VALUES (:username, :amount, :date)');
    if ($statement) {
        $result = $statement->execute([
            ':username'        => $_SESSION['username'],
            ':amount'          => $data['amount'],
            ':date'            => $data['date'],
        ]);

        if ($result) {
            echo '<script>alert("Data saved");window.location.href = "http://expense-tracker.hstn.me/resources/income.php";</script>';
        }
    }
}
