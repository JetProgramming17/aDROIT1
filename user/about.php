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
    <title>Document</title>

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
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f1f1f1;
            font-family: 'Roboto', sans-serif;
        }
        .about {
            background: url('image1.jpg') no-repeat left center;
            background-size: cover;
            background-color: #fdfdfd;
            overflow: hidden;
            padding: 100px 0;
            display: flex;
            align-items: center;
        }
        .inner-section {
            width: 50%;
            background-color: #fdfdfd;
            padding: 50px;
            box-shadow: 10px 10px 8px rgba(0,0,0,0.3);
            margin-left: auto;
        }
        .inner-section h1 {
            margin-bottom: 30px;
            font-size: 32px;
            font-weight: 700;
        }
        .text {
            font-size: 16px;
            color: #545454;
            line-height: 1.6;
            text-align: justify;
            margin-bottom: 40px;
        }
        .skills button {
            font-size: 18px;
            letter-spacing: 1px;
            border: none;
            border-radius: 20px;
            padding: 10px;
            width: 180px;
            background-color: #00999c;
            color: white;
            cursor: pointer;
            transition: background-color 0.5s, color 0.5s;
        }
        .skills button:hover {
            background-color: #ecf5f5;
            color: #00999c;
        }
        @media screen and (max-width: 1000px) {
            .about {
                flex-direction: column;
                background-size: cover;
                padding: 50px;
            }
            .inner-section {
                width: 90%;
                padding: 40px;
            }
        }
        @media screen and (max-width: 600px) {
            .inner-section {
                padding: 20px;
            }
            .skills button {
                font-size: 16px;
                width: 150px;
                padding: 8px;
            }
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
            justify-content: space-between;
            align-items: center;
        }
        .logo a {
            font-size: 35px;
            font-weight: 700;
            color: white;
            text-decoration: none;
        }
        ul {
            list-style: none;
            display: flex;
        }
        li {
            margin-right: 20px;
        }
        li a {
            color: white;
            font-size: 18px;
            font-weight: 500;
            text-decoration: none;
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

    </style>
</head>
<body>
<nav class="navbar">
    <div class="navdiv">
        <div class="logo"><a href="#">ADROIT</a></div>
        <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="bills.php">Bills</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="settings/index.php"><i class="fas fa-cog"></i> </a></li>
        </ul>
        <button><a href="logout.php" style="text-decoration:none; color:#088f8f;">Logout</a></button>
    </div>
</nav>

<div class="about">
    <div class="inner-section">
        <h1>About Us</h1>
        <p class="text">
            Adroit prides itself in eradicating most electricity based issues by encouraging the minimal use of electricity, 
            using the latest technologies from providing information to real-time electricity current monitoring.
            The Smart Grid Current Flow Monitoring System is an innovative IT project that seeks to revolutionise 
            domestic energy usage monitoring and control. This system uses current monitoring technologies (IoT) 
            and data analytics to provide real-time insights into the flow of electricity from power plants to individual 
            homes.IOT and data analytics. 
        </p>
        <div class="skills">
            <button href="contact.php">Contact Us</button>
        </div>
    </div>
</div>

</body>
</html>
