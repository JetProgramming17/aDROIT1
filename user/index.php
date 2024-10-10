<?php 
    require_once('../Includes/config.php'); 
    require_once('../Includes/session.php'); 
    if ($logged == false) {
         header("Location: ../index.php");
         exit();
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <!-- Google Font CDN Link -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <style>
        * {
            text-decoration: none;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        body {
            background-color: #f0f0f0;
        }
        .card-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 100px; /* Adjusted for navbar */
        }
        .card {
            width: 325px;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card-content {
            padding: 20px;
            text-align: center;
        }
        .card-content h3 {
            margin-bottom: 10px;
            font-weight: 500;
        }
        .card-content p {
            margin-bottom: 15px;
            color: #555;
        }
        .card-content a {
            display: inline-block;
            padding: 10px 15px;
            background-color: #088f8f;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
        }
       /* Navbar */
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

    </style>
</head>
<body>

<!-- Navbar -->
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


<!-- Card Section -->
<div class="card-container">
    <div class="card">
        <img src="https://images.unsplash.com/photo-1532971291849-92617bf94ded?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="rules">
        <div class="card-content">
            <h3>Alerts and Notifications (Smart meter):</h3>
            <p>Sending alerts to consumers and electricity providers in the event of abnormal energy consumption patterns, potential grid difficulties.</p>
            <a href="about.php">Read More</a>
        </div>
    </div>

    <div class="card">
        <img src="https://images.unsplash.com/photo-1458007683879-47560d7e33c3?q=80&w=2043&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="rules">
        <div class="card-content">
            <h3>Electricity Real-Time Monitoring Dashboard:</h3>
            <p>Monitors the flow of electricity from power stations to residences in real time to provide precise insights into energy usage.</p>
            <a href="#">Read More</a>
        </div>
    </div>

    <div class="card">
        <img src="https://images.unsplash.com/photo-1544724569-5f546fd6f2b5?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="rules">
        <div class="card-content">
            <h3>Information Hub:</h3>
            <p>Giving consumers visibility, knowledge, and control over their energy consumption by providing the latest data regarding electricity.</p>
            <a href="about.php">Read More</a>
        </div>
    </div>
</div>

</body>
</html>
