<?php
// start session
session_start();

// unset session
session_unset();

// close session
session_write_close();

// redirect user to Homepage on Logout
echo '<script>window.location.href = "http://expense-tracker.hstn.me/index.php";</script>';
