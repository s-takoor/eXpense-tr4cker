<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" type="text/css" href="http://expense-tracker.hstn.me/assets/css/site.css">
    <!-- Title -->
    <title>eXpense-tr4cker | Expense</title>

</head>

<body class="bg-gradient-secondary">

    <!-- Initialize session and database connection -->
    <?php

    // Import database configuration
    include '../includes/config.php';
    if (!isset($_SESSION)) {
        session_start();
    }

    // Check if session is initialised
    if (!isset($_SESSION['username'])) {
        echo '<script>alert("Please login to access this page");window.location.href="http://expense-tracker.hstn.me/login.php";</script>';
    }
    ?>

    <!-- Header and Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-0">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mr-auto">
                    <a class="nav-item nav-link active" href="../resources/dashboard.php">Dashboard</a>
                    <a class="nav-item nav-link active" data-toggle="modal" data-target="#addExpense">Add Expense</a>
                </div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="navbar-text">Welcome, <span class="font-weight-bold"><?php echo $_SESSION['username']; ?></span></span>
                        <img class="img-profile rounded-circle width=" 30" height="30"" src=" ../images/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="http://expense-tracker.hstn.me/resources/404.php">
                            <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="http://expense-tracker.hstn.me/resources/404.php">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2"></i>
                            Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </div>
        </nav>
    </header>

    <!--Main page-->
    <!-- Modal for adding expenses -->
    <div class="modal fade" id="addExpense" tabindex="-1" role="dialog" aria-labelledby="addExpenseCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h2 class="modal-title w-100" id="addExpenseLongTitle">Add Expense</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../resources/add-expense.php" method="post" onsubmit="return validateAddExpense()" id="addExpenseForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="number" class="form-control form-control-lg" id="amount" name="amount" placeholder="Amount">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" id="description" name="description" placeholder="Description">
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control form-control-lg" id="date" name="date" placeholder="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="add" form="addExpenseForm" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Detailed information about expenses from database -->
    <div class="container p-3">
        <div class="card">
            <div class="card-header text-center">
                <h4 class="card-title w-100" id="expenseHistoryLongTitle">Expense History</h4>
            </div>
            <div class="card-body">

                <?php
                $username = $_SESSION['username'];
                $results = $connection->query("SELECT * FROM expenses WHERE username LIKE '$username' ORDER BY date DESC")->fetchAll();

                ?>

                <?php
                if (!empty($results)) {
                ?><table class="table table-bordered table-hover table-dark text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($results as $row) {
                            ?><tr>
                                    <td> <?php echo $row['id'] ?> </td>
                                    <td> <?php echo $row['username'] ?> </td>
                                    <td> <?php echo $row['amount'] ?> </td>
                                    <td> <?php echo $row['description'] ?> </td>
                                    <td> <?php echo $row['date'] ?> </td>
                                </tr><?php
                                    }
                                        ?>
                        </tbody>
                    </table><?php

                        } else {
                            echo "No record Found";
                        }
                            ?>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../session/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <span class="text-muted">© 2021 Copyright:
                s.takoor</span>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="../js/validation.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
