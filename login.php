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
    <title>Login | eXpense-tr4cker</title>
</head>
<!-- Body -->

<body class="bg-gradient-primary">
    <!-- NavBar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#">eXpense-tr4cker</a>
                    <a class="nav-item nav-link" href="../resources/dashboard.php/">Dashboard</a>
                    <a class="nav-item nav-link" href="../resources/income.php">Income</a>
                    <a class="nav-item nav-link" href="../resources/expense.php">Expense</a>
                    <a class="nav-item nav-link" href="../login.php">Sign In</a>
                    <a class="nav-item nav-link" href="../register.php">Sign Up</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Main Page -->
    <div class="bg-gradient-secondary container">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            LOGIN</h1>
                                    </div>
                                    <form action="../session/signin.php" method="post" onsubmit="return validateLoginForm()">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="USERNAME">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="PASSWORD">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">LOGIN</button>
                                    </form>
                                    <hr class="mb-3 mt-3">
                                    <div class="text-center">
                                        <a class="small" href="../forgot-password.php">Forgot Password?</a>
                                    </div>
                                    <hr class="mb-3 mt-3">
                                    <div class="text-center">
                                        <a class="small" href="../register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <script src="../js/validation.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
