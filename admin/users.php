<?php 
    require_once('head_html.php'); 
    require_once('../Includes/config.php'); 
    require_once('../Includes/session.php'); 
    require_once('../Includes/admin.php'); 
    if ($logged==false) {
         header("Location:../index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing</title>

     <!-- Google Font CDN Link -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            min-height: 100vh;
            background-color: #f1f1f1;
            font-family: 'Roboto', sans-serif;
        }

       /* Navbar styling */
        .navbar {
            background: #088f8f;
            padding: 10px 15px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navdiv {
            display: flex;
            justify-content: space-between; /* Distribute space between the logo, nav, and button */
            align-items: center;
            width: 100%;
        }

        .logo {
            flex: 1; /* Ensures logo stays on the left */
        }

        .logo a {
            font-size: 35px;
            font-weight: 700;
            color: white;
            text-decoration: none;
        }

        .nav-items {
            flex: 2;
            display: flex;
            justify-content: center; /* Center the nav items */
        }

        .nav-items ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding-left: 0; /* Removes default padding */
        }

        .nav-items ul li {
            margin-right: 20px;
        }

        .nav-items ul li a {
            color: white;
            font-size: 18px;
            font-weight: 500;
            text-decoration: none;
        }

        .logout-btn {
            flex: 1;
            display: flex;
            justify-content: flex-end; /* Pushes the button to the right */
        }

        button {
            background-color: white;
            color: #088f8f;
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #fff;
            color: #3e2093;
        }

        button a {
            text-decoration: none;
            color: #088f8f;
        }


        /* Page Content */
        #page-content-wrapper {
            margin-top: 80px; /* To prevent overlap with the navbar */
        }

        .row {
            display: flex;
            justify-content: center; /* Centers the panels horizontally */
            gap: 30px;
            padding: 0 30px;
        }

        .panel-bolt {
            border-color: #088f8f;
            background-color: #088f8f;
            color: white;
            border-radius: 8px;
            padding: 10px;
            width: 30%;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .panel-heading {
            background-color: #088f8f;
            color: white;
            padding: 15px;
            border-radius: 8px 8px 0 0;
            font-size: 16px;
        }

        .panel-bolt .fa {
            color: white;
        }
        .nav-pills > li > a {
        border-radius: 0;
        decoration: none;
        color: #088f8f; /* Text color */
        background-color: #e7f7f7; /* Background color */
        padding: 15px 20px; /* Padding */
        font-weight: bold; /* Make text bold */
        transition: background-color 0.3s, color 0.3s; /* Transition effects */
        }

        .nav-pills > li > a:hover {
            background-color: #d5f5f5; /* Change background on hover */
            color: #006666; /* Change text color on hover */
        }

        .nav-pills > li.active > a {
            background-color: #088f8f; /* Active tab background color */
            color: white; /* Active tab text color */
        }

        .nav-pills > li.active > a:hover {
            background-color: #007c7c; /* Active tab hover color */
        }

        .huge {
            font-size: 2.5em;
        }

        /* Media Queries */
        @media (max-width: 992px) {
            .row {
                flex-direction: column;
                align-items: center;
            }
            .panel-bolt {
                width: 90%;
                margin-bottom: 20px;
            }
        }

    </style>
    <!-- Include Bootstrap (for pills navigation and responsive tables) -->
</head>
<body>
<nav class="navbar">
    <div class="navdiv">
        <div class="logo"><a href="#">ADROIT</a></div>
        
        <div class="nav-items">
            <ul>
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="bill.php">Bills</a></li>
                <li><a href="Users.php">Customers</a></li>
                <li><a href="Complaint.php">Complaints</a></li>

            </ul>
        </div>

        <div class="logout-btn">
            <button><a href="logout.php">Logout</a></button>
        </div>
    </div>
</nav>



<div id="wrapper">
    

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Customer
                        <small>Details</small>
                        <!-- Like bills processed by the admin ; bills generated , unprocessed complaint
                        maybe a stats infograph -->
                    </h1>
                    <ol class="breadcrumb">
                      <li>User</li>
                      <li class="active">Details</li>
                    </ol>
                    <div class="table-responsive" style="padding-top: 0">
                            <table class="table table-hover table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php 
                                        $id=$_SESSION['aid'];
                                        $query1 = "SELECT COUNT(*) FROM user";
                                        $result1 = mysqli_query($con,$query1);
                                        $row1 = mysqli_fetch_row($result1);
                                        $numrows = $row1[0];
                                        include("paging1.php");
                                        // include('../Includes/admin.php');
                                        $result = retrieve_users_detail($_SESSION['aid'],$offset, $rowsperpage);

                                        $cnt=1;
                                        while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                            <tr>
                                                <td height="50"><?php echo $cnt; ?></td>
                                                <td><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td><?php echo $row['phone'] ?></td>
                                                <td><?php echo $row['address'] ?></td>                                                    
                                            </tr>
                                        <?php $cnt++; } ?>
                                </tbody>
                            </table>
                            <?php include("paging2.php");  ?>
                    </div>
                    <!-- ./table -rsponsive -->
                    
                </div><!-- ./col -->

            </div> <!-- /.row -->

        </div><!-- /.container-fluid -->

    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<?php 
    require_once("js.php");
    ?>
<!-- Include necessary JS files -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>




</body>
</html>
