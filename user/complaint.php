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


<div id="page-content-wrapper">

            <div class="container-fluid">
                
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Complaint
                            <button class="btn btn-primary" data-toggle="modal" style="position:relative;left:70%" data-target="#Complaint">New Complaint</button>           
                        </h1>
                        <ol class="breadcrumb">
                          <li>Complaint</li>
                          <li class="active">History</li>
                        </ol>
                        <!-- <h4>{User} complaint history goes here</h4> -->
                        <!-- DB RETRIEVAL search db where id is his and status is processed/pending -->
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered table-condensed">
                                <thead>
                                    <tr>
                                        <th>Complaint No.</th>
                                        <th>Complaint</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $id=$_SESSION['uid'];
                                    $query1 = "SELECT COUNT(*) FROM complaint where uid={$id}";
                                    $result1 = mysqli_query($con,$query1);
                                    $row1 = mysqli_fetch_row($result1);
                                    $numrows = $row1[0];
                                    include("paging1.php");

                                    $result = retrieve_complaints($_SESSION['uid'],$offset, $rowsperpage);
                                    
                                    while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                        <tr>
                                            <td><?php echo 'CA-'.$row['id']  ?></td>
                                            <td height="50"><?php echo $row['complaint'] ?></td>
                                            <td><?php echo $row['status'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php include("paging2.php");  ?>
                        </div>
                        <!-- /.table-responsive -->

                        <!-- New complain Modal -->
                        <div class="modal fade" id="Complaint" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h3 class="modal-title text-danger"><b>New Complaint</b></h3>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal new_complaint"  role="form"  action="sub_complaint.php" method="post">
                                            <!-- Textarea -->
                                            <div class="row form-group complaint_textarea">
                                                <!-- <label class="control-label" for="complaint">Complaint</label> -->
                                                <!-- <textarea class="form-control" id="complaint" name="complaint" placeholder="Complaint Goes here"></textarea> -->
                                                <select  class="form-control" id="complaint" name="complaint" placeholder="select your grievance">
                                                    <!-- <option value="">Select your grivance</option> -->
                                                    <option value="" disabled selected>Select your option</option>
                                                    <option value="Bill Not Correct">Bill Not Correct</option>
                                                    <option value="Bill Generated Late">Bill Generated Late</option>
                                                    <option value="Transaction Not Processed">Transaction Not Processed</option>
                                                    <option value="Previous Complaint Not Processed">Previous Complaint Not Processed</option>
                                                </select>
                                                <!-- <h4 class="text-center">Complaints are submitted automatiaclly after <code>SUBMIT</code></h4> -->
                                            </div>
                                    </div>    
                                    <div class="modal-footer">
                                        <button id="submit" name="submit" class="btn btn-lg btn-success">Submit</button>
                                    </div>    
                                        
                                    </form>
                                    
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </div>
                    <!-- /.col-lg -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-content-wrapper -->

    </div>
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
