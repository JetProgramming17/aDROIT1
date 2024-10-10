<?php 
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

        /* Flexbox for horizontal alignment */
.row {
    display: flex;
    flex-wrap: wrap;  /* Allows wrapping of items on smaller screens */
    justify-content: center; /* Center horizontally */
    gap: 20px; /* Gap between panels */
    padding: 0 15px; /* Padding around the panels */
}

/* Adjusting panels to fit content */
.col-lg-3.col-xs-6 {
    flex: 1 1 22%; /* Makes the panels flexible with a base width of around 22% */
    max-width: 25%; /* Ensures panels don't get too wide */
    margin-bottom: 20px; /* Adds space between rows of panels */
}

/* Ensuring panels have enough space for content */
.panel-bolt, .panel-bolt2 {
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
}

.panel-heading {
    font-size: 16px;
    font-weight: bold;
    text-align: center; /* Center the panel heading */
}

.huge {
    font-size: 2em; /* Adjusted font size to fit neatly */
    text-align: center; /* Center text inside the panel */
}

.panel-footer {
    text-align: center; /* Center text and icons */
}

/* Media Queries for smaller devices */
@media (max-width: 992px) {
    .col-lg-3.col-xs-6 {
        flex: 1 1 45%; /* Adjusts panels for smaller screens */
        max-width: 100%; /* Makes them full-width */
    }
}

@media (max-width: 768px) {
    .col-lg-3.col-xs-6 {
        flex: 1 1 100%; /* Stacks panels vertically on very small screens */
    }
}


    </style>
    <!-- Include Bootstrap (for pills navigation and responsive tables) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
                            Dashboard
                            <small> Overview</small>
                            <!-- Like bills processed by the admin ; bills generated , unprocessed complaint
                            maybe a stats infograph -->
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <?php 
                    list($result1,$result2,) = retrieve_users_defaulting($_SESSION['aid']);
                    $row1 = mysqli_fetch_row($result1);
                    $row2 = mysqli_fetch_row($result2);
                ?>
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <div class="panel panel-bolt">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-warning fa-3x"></i>
                                    </div>
                                    <div class="col-md-9 text-right">
                                        <div class="huge"><b></b><?php echo $row1[0] ?></div>
                                        <div>Late Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" data-toggle="modal" data-target="#late">
                                <div class="panel-footer">
                                    <span class="pull-left"><b>ADD DUES</b></span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right fa-2x"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div><!-- ./panel-closes -->

                    <div class="col-lg-3 col-xs-6">
                        <div class="panel panel-bolt2">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-3x"></i>
                                    </div>
                                    <div class="col-md-9 text-right">
                                        <div class="huge"><b></b><?php echo $row2[0] ?></div>
                                        <div>User Defaulting</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" data-toggle="modal" data-target="#defaulting">
                                <div class="panel-footer">
                                    <span class="pull-left"><b>REMOVE USER(s)</b></span>
                                    <span class="pull-right"><i class="fa fa-trash fa-2x"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div> <!-- ./panel-closes -->

                    <div class="col-lg-3 col-xs-6">
                        <div class="panel panel-bolt2">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-spinner fa-3x"></i>
                                    </div>
                                    <div class="col-md-9 text-right">
                                        <div class="huge"><b></b><?php include('pendingcount.php'); ?></div>
                                        <div>Total Pending Bills</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" data-toggle="modal" data-target="#defaulting00">
                                <div class="panel-footer">
                                    <span class="pull-left"><b>PENDING BILLS</b></span>
                                    <span class="pull-right"><i class="fa fa-spinner fa-2x"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div> <!-- ./panel-closes -->


                    <div class="col-lg-3 col-xs-6">
                        <div class="panel panel-bolt2">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-dollar fa-3x"></i>
                                    </div>
                                    <div class="col-md-9 text-right">
                                        <div class="huge"><b></b><?php include('billamtcount.php'); ?></div>
                                        <div>Total Transaction Amount</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" data-toggle="modal" data-target="#defaulting00">
                                <div class="panel-footer">
                                    <span class="pull-left"><b>BILLS AMOUNT</b></span>
                                    <span class="pull-right"><i class="fa fa-dollar fa-2x"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div> <!-- ./panel-closes -->
                </div><!-- ./row -->


                <div class="row">
                    <?php 
                        list($result1,$result2,$result3) = retrieve_admin_stats($_SESSION['aid']);
                        $row1 = mysqli_fetch_row($result1);
                        $row2 = mysqli_fetch_row($result2);
                        $row3 = mysqli_fetch_row($result3);
                     ?>
                     <div class="col-lg-3 col-xs-6"></div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="panel panel-bolt">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file fa-3x"></i>
                                    </div>
                                    <div class="col-md-9 text-right">
                                        <div class="huge"><b></b><?php echo $row2[0]; ?></div>
                                        <div>Generated Bills</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div><!-- ./panel-closes -->

                    <div class="col-lg-3 col-xs-6">
                        <div class="panel panel-bolt">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bullhorn fa-3x"></i>
                                    </div>
                                    <div class="col-md-9 text-right">
                                        <div class="huge"><b></b><?php echo $row3[0]; ?></div>
                                        <div>Unprocessed Complaints</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div><!-- ./panel-closes -->
                    <div class="col-lg-3 col-xs-6"></div>
                </div>

                

                 <!-- New Modal FOR DISHING OUT DUES-->
                                <div class="modal fade" id="late" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h3 class="modal-title"><b>ADD DUES TO USERS</b></h3>
                                            </div>
                                            <div class="modal-body text-center">
                                                <p><h4>ARE YOU SURE?</h4></p>
                                                <!-- <p>Do it today or forever hold your speech!</p> -->
                                            </div>
                                            <div class="modal-footer">
                                                <form action="dash_defaulting_users.php" method="post">                                               
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                                                    <button type="submit" id="late_user" name="late_user" class="btn btn-success ">YES</button>
                                                </form> 
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                 <!-- New Modal FOR REMOVING USERS-->
                                <div class="modal fade" id="defaulting" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h3 class="modal-title"><b>DELETE USERS</b></h3>
                                            </div>
                                            <div class="modal-body text-center">
                                                <p><h4>ARE YOU SURE?</h4></p>
                                                <!-- <p>Do it today or forever hold your speech!</p> -->
                                            </div>
                                            <div class="modal-footer">
                                                <form action="dash_defaulting_users.php" method="post">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                                                    <button type="submit" id="defaulting_user" name="defaulting_user" class="btn btn-success ">YES</button>
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

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
