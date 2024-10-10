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
                            Bills
                        </h1>

                        <!-- Pills Tabbed GENERATED | GENERATE -->
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a href="#generated" data-toggle="pill">Bills History</a>
                            </li>
                            <li class=""><a href="#generate" data-toggle="pill">Generate New Bill</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="generated">
                                <!-- <h4>{User} Bills(ALL UP TO DATE) goes here{Table form}</h4> -->
                                <!-- DB RETRIEVAL search db where id is his and status is processed -->
                                
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Bill No.</th>
                                                <th>Customer</th>
                                                <th>Date</th>
                                                <th>UNITS Consumed</th>
                                                <th>Amount</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $id=$_SESSION['aid'];
                                            $query1 = "SELECT COUNT(user.name) FROM user,bill WHERE user.id=bill.uid AND aid={$id}";
                                            $result1 = mysqli_query($con,$query1);
                                            $row1 = mysqli_fetch_row($result1);
                                            $numrows = $row1[0];
                                            include("paging1.php");
                                            $result = retrieve_bills_generated($_SESSION['aid'],$offset, $rowsperpage);
                                            while($row = mysqli_fetch_assoc($result)){
                                            ?>
                                                <tr>
                                                    <td><?php echo 'BN_'.$row['bid']?></td>
                                                    <td height="50"><?php echo $row['user'] ?></td>
                                                    <td><?php echo $row['bdate'] ?></td>
                                                    <td><?php echo $row['units'] ?></td>
                                                    <td><?php echo 'R '.$row['amount'] ?></td>
                                                    <td><?php echo $row['ddate'] ?></td>
                                                    <td><?php if($row['status'] == 'PENDING') { echo'<span class="badge" style="background: red;">'.$row["status"].'</span>'; } else { echo'<span class="badge" style="background: green;">'.$row["status"].'</span>';} ?></td>
                                                </tr>
                                            <?php 
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php include("paging2.php");  ?>
                                </div>
                                <!-- .table-responsive -->
                            </div>
                            <!-- .tab-genereated -->

                            <div class="tab-pane fade" id="generate">
                            <div class="table-responsive">
    <table class="table table-hover table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <!-- <th>#</th> -->
                <th>USER</th>
                <th>UNITS</th>
                <th>BILL DATE</th>
                <th>DUE DATE</th>
                <th>GENERATE</th>                                        
            </tr>
        </thead>
        <tbody>
            <?php 
            $query1 = "SELECT COUNT(*) FROM user";
            $result1 = mysqli_query($con,$query1);
            $row1 = mysqli_fetch_row($result1);
            $numrows = $row1[0];
            include("paging1.php");                       
            $result = retrieve_bill_data($offset, $rowsperpage);

            while($row = mysqli_fetch_assoc($result)){
            ?>
                <tr>
                    <form action="generate_bill.php" method="post" name="form_gen_bill" onsubmit="return checkInp()">
                    <?php
                        $query3 = "SELECT bdate as bdate1 from bill ,user WHERE user.id=bill.uid and user.id={$row['uid']} ORDER BY bill.id DESC ";
                        $result3 = mysqli_query($con,$query3);
                        $flag=0;
                        while($row2 = mysqli_fetch_assoc($result3)){
                            if($row2['bdate1']==$row['bdate']) $flag=1;
                        }
                        
                        if($flag==0)
                        {
                     ?>
                        <input type="hidden" name="uid" value=<?php echo $row['uid'] ?> >
                        <input type="hidden" name="uname" value=<?php echo $row['uname'] ?> >
                        
                        <td height="50">
                            <?php echo $row['uname'] ?>
                        </td>
                        <td>                                                
                            <input class="form-control" type="tel" name="units" placeholder="ENTER UNITS">
                        </td>
                        <td>
                            <?php echo $row['bdate'] ?> 
                        </td>
                        <td>
                            <?php echo $row['ddate'] ?>
                        </td>
                        <td>
                            <button type="submit" name="generate_bill" class="btn btn-success form-control">GENERATE BILL  </button>
                        </td>
                    <?php 
                        } 
                    ?>
                    </form>
                </tr>                
                <?php 
                    } 
                ?>
            </tbody>                
        </table>
        <?php include("paging2.php");  ?>
    </div><!-- ./table-responsive -->
                            </div> 

                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php 
    require_once("js.php");
    ?>
<!-- Include necessary JS files -->
 
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
     function checkInp()
     {
           var x=document.forms["form_gen_bill"]["units"].value;
           if (isNaN(x)) 
           {
            alert("Must input numbers");
             return false;
        }
     }
</script>
</body>
</html>


