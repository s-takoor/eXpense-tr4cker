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
    <title>eXpense-tr4cker | Dashboard</title>

</head>

<body class="bg-gradient-secondary">

    <!-- Initialize session and database connection -->
    <?php
    // Import database configuration
    include '../includes/config.php';

    // Check if session is initialised
    if (!isset($_SESSION)) {
        session_start();
    }

    // Check if session is active, if not redirect to login page
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
                    <a class="nav-item nav-link active" href="#">eXpense-tr4cker</a>
                    <a class="nav-item nav-link" href="../resources/income.php">Income</a>
                    <a class="nav-item nav-link" href="../resources/expense.php">Expense</a>
                </div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="navbar-text">Welcome, <span class="font-weight-bold"><?php echo $_SESSION['username']; ?></span></span>
                        <img class="img-profile rounded-circle width=" 30" height="30"" src=" ../images/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href = "http://expense-tracker.hstn.me/resources/404.php">
                            <i class="fas fa-thin fa-user-astronaut"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href = "http://expense-tracker.hstn.me/resources/404.php">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2"></i>
                            Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href = "../session/logout.php" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </div>

        </nav>
    </header>

    <!-- Main page -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="col-xl-12 col-md-12 col-lg-6 h3 mb-0 mt-4 text-gray-1000 text-center"><strong>Dashboard</strong></h1>
        </div>

        <!-- Fetching MySQL data -->
        <?php
        // Session username
        $username = $_SESSION['username'];

        // Sum of total income
        $stmt_income = $connection->prepare("SELECT SUM(amount) FROM income WHERE username LIKE '$username'");
        $stmt_income->execute();
        $total_income = $stmt_income->fetch(PDO::FETCH_NUM);

        // Sum of total expenses
        $stmt_expenses = $connection->prepare("SELECT SUM(amount) FROM expenses WHERE username LIKE '$username'");
        $stmt_expenses->execute();
        $total_expenses = $stmt_expenses->fetch(PDO::FETCH_NUM);
        ?>

        <!-- Yearly Balance (Income - Expenses)  -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase text-center mb-1">Total Balance</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">MUR <?php echo $result_total = $total_income[0] - $total_expenses[0]; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Yearly Income -->
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase text-center mb-1">Total Earnings</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">MUR <?php echo $result_total = $total_income[0]; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hand-holding-usd fa-sm fa-fw mr-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Yearly Expenses  -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase text-center mb-1">Total Expenses</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">MUR <?php echo $result_total = $total_expenses[0]; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-hand-holding-usd fa-sm fa-fw mr-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart Area -->
            <!-- Line Chart for Income -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-xs font-weight-bold text-primary text-uppercase text-center mb-1">Income Overview</h6>
                    </div>

                    <!-- Card Body -->
                    <?php
                    // session
                    $username = $_SESSION['username'];
                    // Making use of try and catch to fetch income from database;
                    // Saving the results in an array;
                    try {
                        $sql = "SELECT * FROM income WHERE username LIKE '$username' GROUP BY date";
                        $result = $connection->query($sql);
                        if ($result->rowCount() > 0) {
                            $revenue = array();

                            while ($row = $result->fetch()) {
                                $revenue[] = $row["amount"];
                            }
                            unset($result);
                        } else {
                            echo "No records found.";
                        }
                    } catch (PDOException $e) {
                        die("ERROR: Could not execute $sql. " . $e->getMessage());
                    }
                    ?>
                    <div class="card-body">
                        <div>
                            <canvas id="lineChart01"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Line Chart for Expenses -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-xs font-weight-bold text-primary text-uppercase text-center mb-1">Expense Overview</h6>
                    </div>
                    <!-- Card Body -->
                    <?php
                    // session
                    $username = $_SESSION['username'];
                    // Making use of try and catch to fetch income from database;
                    // Saving the results in an array;
                    try {
                        $sql = "SELECT * FROM expenses WHERE username LIKE '$username' GROUP BY date";
                        $result = $connection->query($sql);
                        if ($result->rowCount() > 0) {
                            $expenses = array();

                            while ($row = $result->fetch()) {
                                $expenses[] = $row["amount"];
                            }
                            unset($result);
                        } else {
                            echo "No records found.";
                        }
                    } catch (PDOException $e) {
                        die("ERROR: Could not execute $sql. " . $e->getMessage());
                    }
                    ?>

                    <div class="card-body">
                        <div>
                            <canvas id="lineChart02"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Radar Chart for Income and Expenses -->
            <div class="col-sm-12 col-md-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-xs font-weight-bold text-primary text-uppercase text-center mb-1">Income and Expenses Overview</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div>
                            <canvas id="radarChart"></canvas>
                        </div>
                    </div>
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
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <span class="text-muted">© 2021 Copyright:
                    s.takoor</span>
        </div>
    </footer>

        <!-- JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // === Setup block ===
            // Encode results from database in json;
            // For chart.js
            // Line Chart01 Income Overview
            const revenue = <?php echo json_encode($revenue); ?>;
            const labels01 = [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ];

            const data01 = {
                labels: labels01,
                datasets: [{
                    label: 'Revenue earned over the Year',
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 206, 86)',
                        'rgb(75, 192, 192)',
                    ],
                    borderColor: [
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 206, 86)',
                        'rgb(75, 192, 192)',
                    ],
                    data: revenue,
                }]
            };

            // === Config block ===
            const config01 = {

                type: 'line',
                data: data01,
                options: {}
            };

            // === Render block ===
            const lineChart01 = new Chart(
                document.getElementById('lineChart01'),
                config01
            );

            // Line Chart02 Expense Overview
            const expenses = <?php echo json_encode($expenses); ?>;
            const labels02 = [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ];

            const data02 = {
                labels: labels02,
                datasets: [{
                    label: 'Expenses incurred over the Year',
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 206, 86)',
                        'rgb(75, 192, 192)',
                    ],
                    borderColor: [
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 206, 86)',
                        'rgb(75, 192, 192)',
                    ],
                    data: expenses,
                }]
            };
            // === Config block ===
            const config02 = {

                type: 'line',
                data: data02,
                options: {}
            };

            // === Render block ===
            const lineChart02 = new Chart(
                document.getElementById('lineChart02'),
                config02
            );

            // Radar Chart for Income and Expenses
            // Setup block
            const data = {
                labels: [
                    'January',
                    'February',
                    'March',
                    'April',
                    'May',
                    'June',
                    'July',
                    'August',
                    'September',
                    'October',
                    'November',
                    'December'
                ],

                datasets: [{
                    label: 'Income',
                    data: revenue,
                    fill: true,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    pointBackgroundColor: 'rgb(255, 99, 132)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(255, 99, 132)'
                }, {
                    label: 'Expenses',
                    data: expenses,
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgb(54, 162, 235)',
                    pointBackgroundColor: 'rgb(54, 162, 235)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(54, 162, 235)'
                }]
            };

            // === Config block ===
            const config = {
                type: 'radar',
                data: data,
                options: {
                    elements: {
                        line: {
                            borderWidth: 3
                        }
                    }
                },
            };

            // === Render block ===
            const radarChart = new Chart(
                document.getElementById('radarChart'),
                config
            );
        </script>
        <script src="../js/validation.js"></script>
        <script src="../assets/css/particles.js"></script>
        <script src="../assets/css/app.js"></script>

</body>

</html>
