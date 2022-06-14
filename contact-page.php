<?php

session_start();
if(!isset($_SESSION['smid'])){
    header("location:login-page.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/contact-page.css">
    <title>Student Mitra | Contact</title>
</head>
<style>
    body{
        background-color: #f2f6fc;
    }
</style>
<body>
    
     <!-- top header -->
        <?php 
        include "header.php";
        ?>

    <!-- CONTACT PAGE START -->
    <div class="contact-container">
            <div class="contact-form">
                <form action="">
                    <h1>Send a Message</h1>
                    <label for="input">Full Name</label>
                    <input type="name" name="name">
                    <label for="id">SM-ID</label>
                    <input type="text" name="id">
                    <label for="message">Write your message here...</label>
                    <textarea name="message" required></textarea>
                    <button type="submit">Send</button>
                </form>
            </div>
    </div>

    <div style="background-color: white;">

        <div class="img-logo">
            <img src="./img/smLogo.jpg" alt="logo">
            <hr>
        </div>
    
        <div class="card">
            <h1>Contact Info</h1>
            <div class="contact-info">
                <ul>
                    <li><a href=""><i class="fa fa-map-marker"></i>RGUKT Map</a></li>
                    <li><a href=""><i class="fa fa-envelope"></i>studentmitra@gmail.com</a></li>
                    <li><i class="fa fa-phone"></i>9988998899</li>
                </ul>
            </div>
            <ul class="card-social-icons">
                    <li><a href="https://www.facebook.com/TeamStudentmitra/" class="fa fa-facebook"  target="_blank"></a></li>
                    <li><a href="https://twitter.com/student_mitra?s=09" class="fa fa-twitter" target="_blank"></a></li>
                    <li><a href="#" class="fa fa-google" target="_blank"></a></li>
                    <li><a href="#" class="fa fa-linkedin" target="_blank"></a></li>
                    <li><a href="https://www.youtube.com/c/RGUKTTALKS" class="fa fa-youtube" target="_blank"></a></li>
                    <li><a href="https://www.instagram.com/invites/contact/?i=1h8sahgssh8vm&utm_content=7pymien" class="fa fa-instagram" target="_blank"></a></li>
            </ul> 
        </div>
    </div>
    



    <script src="./js/script.js"></script>
</body>
</html>