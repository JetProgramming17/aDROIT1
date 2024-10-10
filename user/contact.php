<?php 
    require_once('../Includes/config.php'); 
    require_once('../Includes/session.php'); 
    if ($logged == false) {
         header("Location: ../index.php");
         exit();
    } 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>

    <!-- Google Font CDN Link -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        body {
            min-height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 1100px;
            width: 100%;
            background: #fff;
            border-radius: 6px;
            padding: 20px 60px 30px 40px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }
        .container .content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .container .content .left-side {
            width: 25%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 15px;
            position: relative;
        }
        .content .left-side::before {
            content: "";
            position: absolute;
            height: 70%;
            width: 2px;
            right: -15px;
            top: 50%;
            transform: translateY(-50%);
            background: #afafb6;
        }
        .content .left-side .details {
            margin: 14px;
            text-align: center;
        }
        .content .left-side .details i {
            font-size: 30px;
            color: #088f8f; /* Updated icon color */
            margin-bottom: 10px;
        }
        .content .left-side .details .topic {
            font-size: 18px;
            font-weight: 500;
        }
        .content .left-side .details .text-one,
        .content .left-side .details .text-two {
            font-size: 14px;
            color: #afafb6;
        }

        .container .content .right-side {
            width: 75%;
            margin-left: 75px;
        }
        .content .right-side .topic-text {
            font-size: 23px;
            font-weight: 600;
            color: #088f8f; /* Updated text color */
        }
        .right-side .input-box {
            height: 55px;
            width: 100%;
            margin: 12px 0;
        }
        .right-side .input-box input,
        .right-side .input-box textarea {
            height: 100%;
            width: 100%;
            border: none;
            outline: none;
            font-size: 16px;
            background: #f0f1f8;
            border-radius: 6px;
            padding: 0 15px;
            resize: none;
        }
        .right-side .message-box {
            min-height: 110px;
        }
        .right-side .input-box textarea {
            padding-top: 6px;
        }
        .right-side .button {
            display: inline-block;
            margin-top: 12px;
        }
        .right-side .button input[type="button"] {
            color: #fff;
            font-size: 18px;
            outline: none;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            background: #088f8f; /* Updated button color */
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .button input[type="button"]:hover {
            background: #3e2093; /* Swapped hover color */
        }

        @media (max-width: 950px) {
            .container {
                width: 90%;
                padding: 30px 40px 40px 35px;
            }
            .container .content .right-side {
                width: 75%;
                margin-left: 55px;
            }
        }
        @media (max-width: 820px) {
            .container {
                margin: 40px 0;
                height: 100%;
            }
            .container .content {
                flex-direction: column-reverse;
            }
            .container .content .left-side {
                width: 100%;
                flex-direction: row;
                margin-top: 40px;
                justify-content: center;
                flex-wrap: wrap;
            }
            .container .content .left-side::before {
                display: none;
            }
            .container .content .right-side {
                width: 100%;
                margin-left: 0;
            }
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

<div class="container">
    <div class="content">
        <div class="left-side">
            <div class="address details">
                <i class="fas fa-map-marker-alt"></i>
                <div class="topic">Address</div>
                <div class="text-one">234, Bunting Rd</div>
                <div class="text-two">Aukland Park</div>
            </div>
            <div class="phone details">
                <i class="fas fa-phone-alt"></i>
                <div class="topic">Phone</div>
                <div class="text-one">+27 72 474 6094</div>
                <div class="text-two">+27 11 908 9385</div>
            </div>
            <div class="email details">
                <i class="fas fa-envelope"></i>
                <div class="topic">Email</div>
                <div class="text-one">adroit@gmail.com</div>
                <div class="text-two">info.adroit@gmail.com</div>
            </div>
        </div>

        <div class="right-side">
            <div class="topic-text">Send us a message</div>
            <p>If you have any work for us or any queries, feel free to message us here.</p>
            <form action="#">
                <div class="input-box">
                    <input type="text" placeholder="Enter your name" />
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Enter your email" />
                </div>
                <div class="input-box message-box">
                    <textarea placeholder="Enter your message"></textarea>
                </div>
                <div class="button">
                    <input type="button" value="Send Now" />
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
