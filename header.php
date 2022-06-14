
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Mitra | Unlock the doors of Imagination</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <!-- top header -->
    <header id="header">
        <!-- logo -->
        <a href="./index.php" style="z-index: 2;">
            <div class="logo">
                <img src="./img/smLogo.jpg" alt="">
            </div>
        </a>

        <!-- toggle menu -->
        <div id="menu"></div>

        <!-- links -->
        <div id="nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="events-page.php">Events</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact-page.php">Contact</a></li>
                <li><a href="team.php">Team</a></li>
                

                <?php
                   // session_start();
                    if(isset($_SESSION['smid'])){ ?>
                        <li><a href="php/logout.php" >Sign-Out</a></li>
                    <?php }else{ ?>
                        <li><a href="login-page.php">Sign-In</a></li>
                   <?php } ?>

            </ul>
        </div>
    </header>


</html>