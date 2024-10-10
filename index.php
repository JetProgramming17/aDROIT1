<?php 
require_once("Includes/config.php");
require_once("Includes/session.php");

// Check if user is logged in, then redirect based on their role
if (isset($_SESSION['logged'])) {
    if ($_SESSION['logged'] === true) {
        if ($_SESSION['account'] === "admin") {
            header("Location: admin/index.php");
            exit();
        } elseif ($_SESSION['account'] === "user") {
            header("Location: user/index.php");
            exit();
        }
    } else {
        header("Location: index.php");
        exit();
    }
}

// Check if login form is submitted
if (isset($_POST['login_submit'])) {
    if (empty($_POST['email']) || empty($_POST['pass'])) {
        $_SESSION['error'] = "Email and Password are required.";
        header("Location: index.php"); // Redirect back to index for error display
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="data:image/x-icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiIKKCYiWgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiIgKCYiuygmIhgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiJDKCYi7SgmIlIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiJzKCYi/SgmIqAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIgooJiKmKCYi/ygmIuAoJiIOAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIh8oJiLPKCYi/ygmIv4oJiI/AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIkEoJiLrKCYi/ygmIv8oJiKMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmInAoJiL8KCYi/ygmIv8oJiL/KCYiySgmIpwoJiJzKCYiKQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIhYoJiJyKCYinCgmIsIoJiL8KCYi/ygmIv8oJiL/KCYinygmIgkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiJTKCYi/ygmIv8oJiL5KCYiaAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiIeKCYi7ygmIv8oJiLjKCYiNwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiIDKCYixCgmIv8oJiK+KCYiFQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKCYigigmIv8oJiKJKCYiAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKCYiPigmIvAoJiJSAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKCYiEigmIrooJiInAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIlooJiIMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//8AAP/3AAD/7wAA/88AAP8fAAD+PwAA/D8AAPgfAAD4DwAA/j8AAPx/AAD4/wAA8f8AAPf/AADv/wAA//8AAA==" type="image/x-icon">

    <title>Adroit System</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php"><b>Adroit System</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <?php include("login.php"); ?>
            </div>
        </div>
    </div>

    <div id="headerwrap">
        <div class="darkhearderwrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 signup">
                        <h1>ADROIT: The Future Of Electricity</h1>
                        <p>The Smart Grid Current Flow Monitoring System provides real-time insights into energy consumption using IoT and data analytics.</p>
                    </div>
                    <div class="col-lg-6">
                        <h1>Sign Up</h1>
                        <?php include("signup.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt centered">
            <div class="col-lg-6 col-lg-offset-3">
                <h1>How this Portal Works</h1>
                <h3></h3>
            </div>
        </div>

        <div class="row mt centered">
            <div class="col-lg-4">
                <img src="assets/img/ser01.png" width="180" alt="">
                <h4>1 - Login</h4>
            </div>
            <div class="col-lg-4">
                <img src="assets/img/ser02.png" width="180" alt="">
                <h4>2 - Track Electrical Consumption</h4>
            </div>
            <div class="col-lg-4">
                <img src="assets/img/ser03.png" width="180" alt="">
                <h4>3 - Purchase</h4>
            </div>
        </div>
    </div>

    <?php require_once("footer.php"); ?>

    <!--=======================JS=========================== -->
    <!-- jQuery and Bootstrap JS -->
    <script src="assets/js/jquery-1.11.0.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Form validation for email -->
    <script>
        function validateForm() {
            var email = document.forms["myForm"]["email"].value;
            var atpos = email.indexOf("@");
            var dotpos = email.lastIndexOf(".");
            if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
                alert("Not a valid email address");
                return false;
            }
        }
    </script>

    <!-- Handle error display (if any) -->
    <?php if (isset($_SESSION['error'])): ?>
        <script>
            alert('<?php echo $_SESSION['error']; ?>');
        </script>
        <?php unset($_SESSION['error']); ?> <!-- Clear error after displaying it -->
    <?php endif; ?>
    
</body>
</html>
