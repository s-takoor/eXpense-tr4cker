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
    <title>eXpense-tr4cker - 404</title>
</head>

<body>

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
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-thin fa-user-astronaut"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2"></i>
                            Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../session/logout.php" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </div>

        </nav>
    </header>
    <!-- Begin Page Content -->
    <div class="container p-5">

        <!-- 404 Error Text -->
        <div class="text-center p-5">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Page Not Found</p>
            <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
            <a href="http://expense-tracker.hstn.me">&larr; Back to Homepage</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"></script>
    <script src="../js/validation.js"></script>
    <script src="../assets/css/particles.js"></script>
    <script src="../assets/css/app.js"></script>

</body>

</html>
