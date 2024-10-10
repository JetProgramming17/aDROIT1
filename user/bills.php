<?php 
    require_once('../Includes/config.php'); 
    require_once('../Includes/session.php'); 
    require_once('../Includes/user.php'); 

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar">
    <div class="navdiv">
        <div class="logo"><a href="#">ADROIT</a></div>
        
        <div class="nav-items">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="bills.php">Bills</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="settings/index.php"><i class="fas fa-cog"></i> </a></li>

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
                        Bills
                        <small>Overview</small>
                    </h1>
                    <?php
                        require_once("../Includes/session.php");
                        require_once("../Includes/config.php");
                    ?>
                    <!-- STATISTICS -->
                    <h1 style="padding-left:30px;" class="text-muted text-centered">Stats</h1>
                    <div class="row" style="margin-top: 20px;">
                        <?php 
                            list($result1, $result2, $result3) = retrieve_user_stats($_SESSION['uid']);
                            $row1 = mysqli_fetch_row($result1);
                            $row2 = mysqli_fetch_row($result2);
                            $row3 = mysqli_fetch_row($result3);
                        ?>

                        <div class="panel panel-bolt">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-dollar fa-3x"></i>
                                    </div>
                                    <div class="col-md-9 text-right">
                                        <div class="huge"><?php echo $row2[0]; ?></div>
                                        <div>Payed Bills</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-bolt">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-dollar fa-3x"></i>
                                    </div>
                                    <div class="col-md-9 text-right">
                                        <div class="huge"><?php echo $row1[0]; ?></div>
                                        <div>Pending Bills</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-bolt">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <a href="complaint.php">
                                            <i class="fa fa-bullhorn fa-3x"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-9 text-right">
                                        <div class="huge"><?php echo $row3[0]; ?></div>
                                        <div>Unprocessed Complaints</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- ./row -->

                    <!-- Pills Tabbed HISTORY | DUE -->
                    <ul class="nav nav-pills nav-justified" style="margin-top: 40px;">
                        <li class="active"><a href="#history" data-toggle="pill">History</a></li>
                        <li class=""><a href="#due" data-toggle="pill">Due</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                            <div class="tab-pane show active" id="history">
                                <!-- <h4>{User} Bills(ALL UP TO DATE) goes here{Table form}</h4> -->
                                <!-- DB RETRIEVAL search db where id is his and status is processed -->
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Bill No.</th>
                                                <th>Bill Date</th>
                                                <th>UNITS Consumed</th>
                                                <th>Amount</th>
                                                <th>Due Date</th>
                                                <th>STATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $id=$_SESSION['uid'];
                                            $query1 = "SELECT COUNT(*) FROM bill where uid={$id}";
                                            $result1 = mysqli_query($con,$query1);
                                            $row1 = mysqli_fetch_row($result1);
                                            $numrows = $row1[0];
                                            include("paging1.php");

                                            $result = retrieve_bills_history($_SESSION['uid'],$offset, $rowsperpage);
                                            // Initialising #
                                            while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                                <tr>
                                                    <td height="50"><?php echo 'EBS_'.$row['id'] ?></td>
                                                    <td height="50"><?php echo $row['bdate'] ?></td>
                                                    <td><?php echo $row['units'] ?></td>
                                                    <td><?php echo 'R '.$row['amount'] ?></td>
                                                    <td><?php echo $row['ddate'] ?></td>
                                                    <td><?php echo $row['status'] ?></td>
                                                </tr>
                                            <?php  } ?>
                                        </tbody>
                                    </table>     
                                    <?php include("paging2.php");  ?>                     
                                </div>
                                <!-- .table-responsive -->
                            </div>
                            <div class="tab-pane fade" id="due">
                                <!-- <h4>{User} due bill info goes here and each linked to a transaction form </h4> -->
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <!-- <th>#</th> -->
                                                <th>Bill Date</th>
                                                <th>UNITS Consumed</th>
                                                <th>Due Date</th>
                                                <th>Amount</th>
                                                <th>DUES</th>
                                                <th>Payable</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                                            $id=$_SESSION['uid'];
                                            $query1 = "SELECT COUNT(*) FROM bill where uid={$id} AND status='PENDING' ";
                                            $result1 = mysqli_query($con,$query1);
                                            $row1 = mysqli_fetch_row($result1);
                                            $numrows = $row1[0];
                                            include("paging1.php");

                                            $result = retrieve_bills_due($_SESSION['uid'],$offset, $rowsperpage);
                                            // Initialising #
                                            $counter = 1;
                                            while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                                <tr>
                                                    <form action="transact_bill.php" method="post">
                                                    <!-- <td height="40"><?php echo $counter ?></td> -->

                                                    <input type="hidden" name="bdate" value=<?php echo $row['bdate'] ?> >
                                                    <td td height="50"><?php echo $row['bdate'] ?></td>

                                                    <input type="hidden" name="units" value=<?php echo $row['units'] ?> >
                                                    <td><?php echo $row['units'] ?></td>

                                                    <input type="hidden" name="ddate" value=<?php echo $row['ddate'] ?> >
                                                    <td><?php echo $row['ddate'] ?></td>

                                                    <input type="hidden" name="amount" value=<?php echo $row['amount'] ?> >
                                                    <td><?php echo 'R '.$row['amount'] ?></td>

                                                    <!-- <input type="hidden" name="" value=<?php echo $row[''] ?> > -->
                                                    <td><?php echo 'R '.$row['dues'] ?></td>

                                                    <input type="hidden" name="payable" value=<?php echo $row['payable'] ?> >
                                                    <td><?php echo 'R '.$row['payable'] ?></td>

                                                    <td>
                                                    <button class="btn btn-success form-control" data-toggle="modal"  data-target="#PAY">PAY</button>
                                                    <!--TRANSACT BILL MODAL -->
                                                    <div class="modal fade" id="PAY" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                    <h3 class="modal-title text-centre"><b>Bills Transaction</b></h3>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <h4>ARE YOU SURE?</h4>
                                                                    <p>Do it before <?php echo $row['ddate']; ?> or DUES will served!!</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">LATER</button>
                                                                        <button type="submit" id="pay_bill" name="pay_bill" class="btn btn-success ">PAY</button>
                                                    </form> 
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                </td>
                                                </tr>
                                            <?php 
                                                $counter++;
                                            }
                                            ?>
                                        </tbody>

                                    </table>

                                <?php include("paging2.php");  ?>

                                </div><!-- ./table-responsive -->

                            </div> <!-- .tab-pane -->
                    </div><!-- .tab-content -->

                </div><!-- /.col-lg-12 -->
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
