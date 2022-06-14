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
    <title>Student Mitra | Servcies</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/services.css">
    <link rel="stylesheet" href="./css/alerts.css">
</head>
<body>

    <?php
    include "header.php";
    ?>

    <!-- Alert box displaying -->
    <div class="alert-box">
        <?php if(isset($_SESSION['error_s'])){  ?>
            <div class="alert alert-danger" role="alert"><?= $_SESSION['error_s']; ?></div>
        <?php unset($_SESSION['error_s']); } ?>

        <?php if(isset($_SESSION['success_s'])){  ?>
            <div class="alert alert-success" role="alert"><?= $_SESSION['success_s']; ?></div>
        <?php unset($_SESSION['success_s']); } ?>
    </div>

    <!-- side nav -->
    <div class="side-nav">
        <div class="side-nav-expand expand">
            <i class='bx bxs-chevron-right'></i>
        </div>
        <ul class="side-nav-list">
            <li class="side-nav-list-item">
                <a href="#">
                    <div class="img expand">
                        <img src="./img/user.png" alt="" srcset="">
                    </div>
                    <p>
                        
                        <a style="background:none; font-size:1em;" href="#" class="profile-btn">
                        <?php if(isset($_SESSION['smid'])){ ?>
                        <?= $_SESSION['smid'];?>
                        <?php } ?>
                        </a>
                        <!-- <a href="#" class="profile-btn">
                            view profile
                        </a> -->
                        <a href="php/logout.php" class="profile-btn">
                            sign out
                        </a>
                    </p>
                </a>
            </li>
            
            

            <!-- PHP Conditions for Admin -->
            <?php if($_SESSION['smid'] == 'Admin'){ ?> 
            <li class="side-nav-list-item" id="side-nav-list-item" data-target="notifications">
                <a href="#">
                    <i class='bx bxs-bell'></i>
                    <p>Notifications</p>
                </a>
            </li>
            <?php } ?>

            <li class="side-nav-list-item side-nav-list-item-active" id="side-nav-list-item" data-target="hero">
                <a href="#">
                    <i class='bx bxs-collection'></i>
                    <p>Introduce a Hero</p>
                </a>
            </li>
            <li class="side-nav-list-item" id="side-nav-list-item" data-target="technical">
                <a href="#">
                    <i class='bx bx-globe'></i>
                    <p>Technical</p>
                </a>
            </li>
            <li class="side-nav-list-item" id="side-nav-list-item" data-target="news">
                <a href="#">
                    <i class='bx bx-news'></i>
                    <p>News & Updates</p>
                </a>
            </li>
            <li class="side-nav-list-item" id="side-nav-list-item" data-target="formteam">
                <a href="#">
                    <i class='bx bxl-microsoft-teams'></i>
                    <p>Form a team</p>
                </a>
            </li>
            <li class="side-nav-list-item" id="side-nav-list-item" data-target="know">
                <a href="#">
                    <i class='bx bx-question-mark' ></i>
                    <p>Do you know?</p>
                </a>
            </li>
            <li class="side-nav-list-item" id="side-nav-list-item" data-target="more">
                <a href="#">
                    <i class='bx bx-list-plus'></i>
                    <p>More</p>
                </a>
            </li>
        </ul>
    </div>
    
    <!-- Form For Introduce a Hero -->
        <div class="file-upload-bg-color hero-form">
            <div class="file-upload">
                <h1 class="form-btn-close">+</h1>
                <form action="php/hero.php" method="POST" enctype="multipart/form-data">
                    <select name="category" required>
                    <option value="category" selected hidden>--Category--</option>
                    <option value="art-gallery">Art Gallery</option>
                    <option value="singing">Singing</option>
                    <option value="photography">Photography</option>
                    <option value="story-writing">Story Writing</option>
                    <option value="direction">Direction</option>
                    </select><br>
                    <input type="text" placeholder="Title..." name="title" required><br>
                    <input type="text" placeholder="Uploaded by..." name="author" required><br>
                    <input type="file" name="myfile" required><br>
                    <button type="submit" name="submit-art">Upload</button>
                </form>
            </div>
        </div>

        
        <div class="file-upload-bg-color technical-form">
            <div class="file-upload">
                <h1 class="form-btn-close ">+</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <select name="category">
                    <option selected disabled hidden>Category</option>
                    <option value="cse">CSE</option>
                    <option value="ece">ECE</option>
                    <option value="mechanical">Mechanical</option>
                    <option value="civil">Civil</option>
                    <option value="mme">MME</option>
                    <option value="chemical">Chemical</option>
                    <option value="puc">PUC</option>
                    <option value="aptitude">Aptitude</option>
                    </select><br>
                    <textarea name="desc" rows="7" placeholder="description..."></textarea>
                    <input type="file" name="myfile" required><br>
                    <button type="submit">Upload</button>
                </form>
            </div>
        </div>

        
   
    
    <div class="main">

                           
        <!-- PHP Condition as Admin -->
        <?php if($_SESSION['smid'] == 'Admin'){ ?>
        <!-- Notifications -->
        <div class="service notifications" style="display: none;">
            <h2>Notifications</h2>
            <ul class="subNav-list">
                <li class="subNav-list-item subNav-list-item-active" data-target="hero-notice">
                    <a href="#">
                        <p>Introduce a Hero</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="technical-notice">
                    <a href="#">
                        <p>Technical</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="news-notice">
                    <a href="#">
                        <p>News</p>
                    </a>
                </li>

            </ul> 
            
            <div class="service-contents">
                <div class="service-content hero-notice">
                    <div class="container technical-content">
                        <h3>Introduce a Hero</h3>
                        <table class="table-cse">

                            <?php include("php/server.php");
                            $sql = "SELECT * FROM hero ORDER BY id DESC";
                            $result = mysqli_query($conn, $sql);

                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $status_id = "";
                                    $status_value = "";
                                    if($row['valid'] > 1){
                                        $status_id = "orange";
                                        $status_value = "pending";
                                    }elseif($row['valid'] == 1){
                                        $status_id = "green";
                                        $status_value = "accepted";
                                    }else{
                                        $status_id = "red";
                                        $status_value = "declined";
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $row['smid']; ?></td>
                                        <td><?php echo $row['category']; ?></td>
                                        <td><a href="uploads/hero/<?php echo $row['category']."/".$row['post_path'];?>" target="__blank"><i class="fa fa-eye" style="font-size:17px; color:grey"></i></a></td>
                                        <td class="<?php echo $status_id;?>"><?php echo $status_value ?></td>
                                        <td><a href="php/accept.php?id=<?php echo $row['id'].'&category='.$row['category'].'&valid=1';?>"><i style="color:green" class='bx bxs-check-square'></i></a></td>
                                        <td><a href="php/accept.php?id=<?php echo $row['id'].'&category='.$row['category'].'&valid=0';?>"><i style="color:red" class='bx bxs-x-square' ></i></i></a></td>
                                    </tr>

                               <?php }}?>


                             
                        </table>
                        
                    </div>
                </div>

                <!-- <div class="service-content technical-notice">
                    <div class="container technical-content">
                        <h3>Technical</h3>
                        <table class="table-cse">
                               <tr>
                                    <td>IOT course Lorem ipsum dolor sit amet consectetur adipisicing elit. Error veniam enim, voluptates provident ipsam quasi!</td>
                                    <td><a href="#" download><i class='bx bxs-check-square'></i></a></td>
                                    <td><a href="#" download><i class='bx bxs-x-square' ></i></i></a></td>
                                </tr>
                                <tr>
                                    <td>IOT course Lorem ipsum dolor sit amet consectetur adipisicing elit. Error veniam enim, voluptates provident ipsam quasi!</td>
                                    <td><a href="#" download><i class='bx bxs-check-square'></i></a></td>
                                    <td><a href="#" download><i class='bx bxs-x-square' ></i></i></a></td>
                                </tr>
                                   
                        </table>
                    </div>
                </div>

                <div class="service-content news-notice">
                    <div class="container technical-content">
                        <h3>News</h3>
                        <table class="table-cse">
                        <tr>
                                    <td>IOT course Lorem ipsum dolor sit amet consectetur adipisicing elit. Error veniam enim, voluptates provident ipsam quasi!</td>
                                    <td><a href="#" download><i class='bx bxs-check-square'></i></a></td>
                                    <td><a href="#" download><i class='bx bxs-x-square' ></i></i></a></td>
                                </tr>
                                   
                        </table>
                    </div>
                </div> -->


            </div>
        </div>
        <?php } ?>  


        <!-- Introduce a Hero -->
        <div class="service hero">
            <h2>Introduce a Hero</h2>
            
            <ul class="subNav-list">
                <li class="subNav-list-item subNav-list-item-active" data-target="art">
                    <a href="#">
                        <i class='bx bx-paint'></i>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="singing">
                    <a href="#">
                        <i class='bx bx-music'></i>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="photography">
                    <a href="#">
                        <i class='bx bx-camera'></i>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="story">
                    <a href="#">
                        <i class='bx bx-edit'></i>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="direction">
                    <a href="#">
                        <i class='bx bxs-film'></i>
                    </a>
                </li>
            </ul> 
            
            <div class="click-upload click-upload-hero"><a>Upload<i class='bx bx-upload'></i></a></div>

            <div class="service-contents">

                <div class="service-content art">
                    <h3>art gallery</h3>
                    <div class="container">
                    <div class="hero-gallery">

                        <?php include("php/server.php");
                        $sql = "SELECT * FROM hero_art";
                        $result = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                if($row['valid'] == 1){
                                ?>
                
                                <div class="hero-card">
                                    <div class="hero-img">
                                        <a href="#"><img src="uploads/hero/art-gallery/<?php echo $row["post_path"] ?>" alt="img"></a>
                                    </div>
                                    <div class="hero-content">
                                        <h4 class="hero-title"><?php echo $row["title"] ?></h4>
                                    </div>
                                    <span class="by"> uploaded by 
                                        <p class="uploader"><?php echo $row["author"] ?></p>
                                    </span>
                                </div>
                            
                                
                               <?php }}}?>
                        
                            <!-- <div class="hero-card">
                                <div class="hero-img">
                                    <a href="#"><img src="./img/dummy2.jpg" alt=""></a>
                                </div>
                                <div class="hero-content">
                                    <h4 class="hero-title">art title art title title art title title art title art  art title</h4>
                                    <span class="love">
                                        <i class='bx bx-heart heart'></i>
                                        <p>22</p>
                                    </span>
                                </div>
                                <span class="by"> uploaded by 
                                    <p class="uploader">jagadeesh jagadeesh jagadeesh jagadeesh</p>
                                </span>
                            </div> -->
                            

                        </div>
                    </div>
                </div>

                <div class="service-content singing" style="display: none;">
                    <h3>singing</h3>
                    <div class="container">
                        <div class="media">

                        <?php include("php/server.php");
                        $sql = "SELECT * FROM hero_singing";
                        $result = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                if($row['valid'] == 1){
                                ?>
                            
                                <div class="song">
                                    <audio controls>
                                        <source src="uploads/hero/singing/<?php echo $row["post_path"] ?>" type="audio/mp3">
                                    </audio>
                                    <div class="song-content">
                                        <h4 class="hero-title"><?php echo $row["title"] ?></h4>
                                    </div>
                                    <span class="by"> uploaded by 
                                        <p class="uploader"><?php echo $row["author"] ?></p>
                                    </span>
                                </div>

                                <?php }}}?>
                            
                            <!-- <div class="song">
                                <audio controls>
                                    <source src="./sources/Ay Pilla - SenSongsMp3.Co.mp3" type="audio/mp3">
                                </audio>
                                <div class="song-content">
                                    <h4 class="hero-title">song title song title song title song title</h4>
                                    <span class="love">
                                        <i class='bx bx-heart heart'></i>
                                        <p>22</p>
                                    </span>
                                </div>
                                <span class="by"> uploaded by 
                                    <p class="uploader">jagadeesh jagadeesh jagadeesh jagadeesh</p>
                                </span>
                            </div> -->

                        </div>
                    </div>
                </div>

                <div class="service-content photography" style="display: none;">
                    <h3>photography</h3>
                    <div class="container">
                        <div class="hero-gallery">

                        <?php include("php/server.php");
                        $sql = "SELECT * FROM hero_photography";
                        $result = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                if($row['valid'] == 1){
                                ?>
                                    <div class="hero-card">
                                        <div class="hero-img">
                                            <a href="#"><img src="uploads/hero/photography/<?php echo $row["post_path"] ?>" alt="img"></a>
                                        </div>
                                        <div class="hero-content">
                                            <h4 class="hero-title"><?php echo $row["title"]; ?></h4>
                                        </div>
                                        <span class="by"> uploaded by 
                                            <p class="uploader"><?php echo $row["author"]; ?></p>
                                        </span>
                                    </div>
                            <?php }}}?>

                            <!-- <div class="hero-card">
                                <div class="hero-img">
                                    <a href="#"><img src="./img/dummy3.jpg" alt=""></a>
                                </div>
                                <div class="hero-content">
                                    <h4 class="hero-title">photo title</h4>
                                    <span class="love">
                                        <i class='bx bx-heart heart'></i>
                                        <p>22</p>
                                    </span>
                                </div>
                                <span class="by"> uploaded by 
                                    <p class="uploader">jagadeesh</p>
                                </span>
                            </div> -->

                        </div>
                    </div>
                </div>

                <div class="service-content story" style="display: none;">
                    <h3>story writing</h3>
                    <div class="container">
                        <div class="hero-gallery">

                        <?php include("php/server.php");
                        $sql = "SELECT * FROM hero_story";
                        $result = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                if($row['valid'] == 1){
                                ?>
                            
                                <div class="hero-card">
                                    <div class="hero-img">
                                        <a href="#"><img src="uploads/hero/story-writing/<?php echo $row["post_path"] ?>" alt="img"></a>
                                        <p style="top: -50%;"><a href="./img/dummy4.jpg">view</a></p>
                                    </div>
                                    <div class="hero-content">
                                        <h4 class="hero-title"><?php echo $row["title"]; ?></h4>
                                    </div>
                                </div>

                                <?php }}}?>
                            <!-- <div class="hero-card">
                                <div class="hero-img">
                                    <a href="#"><img src="./img/dummy4.jpg" alt=""></a>
                                </div>
                                <div class="hero-content">
                                    <h4 class="hero-title">story title</h4>
                                    <span class="love">
                                        <i class='bx bx-heart heart'></i>
                                        <p>22</p>
                                    </span>
                                </div>
                                <span class="by"> uploaded by 
                                    <p class="uploader">jagadeesh</p>
                                </span>
                            </div> -->
                          

                        </div>
                    </div>
                </div>

                <div class="service-content direction" style="display: none;">
                    <h3>direction</h3>
                    <div class="container">
                        <div class="media">

                        <?php include("php/server.php");
                        $sql = "SELECT * FROM hero_direction";
                        $result = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                if($row['valid'] == 1){
                                ?>
                             
                            <div class="video">
                                <video controls>
                                    <source src="uploads/hero/direction/<?php echo $row["post_path"] ?>" type="video/mp4">
                                </video>
                                <div class="video-content">
                                    <h4 class="hero-title"><?php echo $row["title"]; ?></h4>
                                </div>
                                <span class="by"> uploaded by 
                                    <p class="uploader"><?php echo $row["author"]; ?></p>
                                </span>
                            </div>

                            <?php }}}?>
                            <!-- <div class="video">
                                <video controls>
                                    <source src="./sources/yt1s.com - How To Make Image Slider Using HTML And CSS With Animations Step By Step Tutorial.mp4" type="video/mp4">
                                </video>
                                <div class="video-content">
                                    <h4 class="hero-title">video title video title video title video title</h4>
                                    <span class="love">
                                        <i class='bx bx-heart heart'></i>
                                        <p>22</p>
                                    </span>
                                </div>
                                <span class="by"> uploaded by 
                                    <p class="uploader">jagadeesh jagadeesh jagadeesh jagadeesh</p>
                                </span>
                            </div> -->
                           

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- technical -->

        <div class="service technical" style="display: none;">
            <h2>technical</h2>
            <ul class="subNav-list">
                <li class="subNav-list-item subNav-list-item-active" data-target="cse">
                    <a href="#">
                        <p>CSE</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="ece">
                    <a href="#">
                        <p>ECE</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="mechanical">
                    <a href="#">
                        <p>Mechanical</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="eee">
                    <a href="#">
                        <p>EEE</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="civil">
                    <a href="#">
                        <p>Civil</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="chemical">
                    <a href="#">
                        <p>Chemical</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="mme">
                    <a href="#">
                        <p>MME</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="puc">
                    <a href="#">
                        <p>PUC</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="aptitude">
                    <a href="#">
                        <p>Aptitude</p>
                    </a>
                </li>
            </ul> 
            
            <div class="click-upload click-upload-technical"><a>Upload<i class='bx bx-upload'></i></a></div>

            <div class="service-contents">
                <div class="service-content cse">
                    <div class="container technical-content">
                        <h3>COMPUTER SCIENCE AND ENGINEERING</h3>
                        <table class="table-cse">
                                <tr>
                                    <td>IOT course Lorem ipsum dolor sit amet consectetur adipisicing elit. Error veniam enim, voluptates provident ipsam quasi!</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>    
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>   
                        </table>
                    </div>
                </div>

                <div class="service-content ece" style="display: none;">
                    <div class="container technical-content">
                        <h3>Electronics and Communications Engineering</h3>
                        <table class="table-cse">
                                <tr>
                                    <td>IOT course Lorem ipsum dolor sit amet consectetur adipisicing elit. Error veniam enim, voluptates provident ipsam quasi!</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>  
                        </table>
                    </div>
                </div>

                <div class="service-content mechanical" style="display: none;">
                    <div class="container technical-content">
                        <h3>mechanical Engineering</h3>
                        <table class="table-cse">
                                <tr>
                                    <td>IOT course Lorem ipsum dolor sit amet consectetur adipisicing elit. Error veniam enim, voluptates provident ipsam quasi!</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>  
                        </table>
                    </div>
                </div>

                <div class="service-content eee" style="display: none;">
                    <div class="container technical-content">
                        <h3>Electrical and Electronics Engineering</h3>
                        <table class="table-cse">
                                <tr>
                                    <td>IOT course Lorem ipsum dolor sit amet consectetur adipisicing elit. Error veniam enim, voluptates provident ipsam quasi!</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>  
                        </table>
                    </div>
                </div>

                <div class="service-content civil" style="display: none;">
                    <div class="container technical-content">
                        <h3>Civil Engineering</h3>
                        <table class="table-cse">
                                <tr>
                                    <td>IOT course Lorem ipsum dolor sit amet consectetur adipisicing elit. Error veniam enim, voluptates provident ipsam quasi!</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>  
                        </table>
                    </div>
                </div>
                
                <div class="service-content chemical" style="display: none;">
                    <div class="container technical-content">
                        <h3>Chemical Engineering</h3>
                        <table class="table-cse">
                                <tr>
                                    <td>IOT course Lorem ipsum dolor sit amet consectetur adipisicing elit. Error veniam enim, voluptates provident ipsam quasi!</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>  
                        </table>
                    </div>
                </div>

                <div class="service-content mme" style="display: none;">
                    <div class="container technical-content">
                        <h3>Materials and Metallurgical Engineering</h3>
                        <table class="table-cse">
                                <tr>
                                    <td>IOT course Lorem ipsum dolor sit amet consectetur adipisicing elit. Error veniam enim, voluptates provident ipsam quasi!</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>  
                        </table>
                    </div>
                </div>

                <div class="service-content puc" style="display: none;">
                    <div class="container technical-content">
                        <h3>pre uninversity course</h3>
                        <table class="table-cse">
                                <tr>
                                    <td>IOT course Lorem ipsum dolor sit amet consectetur adipisicing elit. Error veniam enim, voluptates provident ipsam quasi!</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>  
                        </table>
                    </div>
                </div>
                
                <div class="service-content aptitude" style="display: none;">
                    <div class="container technical-content">
                        <h3>aptitude</h3>
                        <table class="table-cse">
                                <tr>
                                    <td>IOT course Lorem ipsum dolor sit amet consectetur adipisicing elit. Error veniam enim, voluptates provident ipsam quasi!</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                    <td><a href="#" download><i class='bx bxs-download'></i></a></td>
                                </tr>  
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <!-- news -->

        <div class="service news" style="display: none;">
            <h2>news</h2>
            <ul class="subNav-list">
                <li class="subNav-list-item subNav-list-item-active" data-target="national">
                    <a href="#">
                        <p>national</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="international">
                    <a href="#">
                        <p>international</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="business">
                    <a href="#">
                        <p>business</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="sports">
                    <a href="#">
                        <p>sports</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="education">
                    <a href="#">
                       <p>education</p>
                    </a>
                </li>
            </ul> 

            <div class="service-contents">

                <div class="service-content national">
                    <!-- <p>national</p> -->
                    <p>!!!Updating Soon!!!</p>
                </div>
                <div class="service-content international" style="display: none;">
                    <!-- <p>international</p> -->
                    <p>!!!Updating Soon!!!</p>
                </div>
                <div class="service-content business" style="display: none;">
                    <!-- <p>business</p> -->
                    <p>!!!Updating Soon!!!</p>
                </div>
                <div class="service-content sports" style="display: none;">
                    <!-- <p>sports</p> -->
                    <p>!!!Updating Soon!!!</p>
                </div>
                <div class="service-content education" style="display: none;">
                    <!-- <p>education</p> -->
                    <p>!!!Updating Soon!!!</p>
                </div>

            </div>
        </div>


        <!-- form a team -->

        <div class="service formteam" style="display: none;">
            <h2>form a team</h2>
        </div>

        <!-- do you know -->

        <div class="service know" style="display: none;">
            <h2>do you know</h2>
        </div>

        <!-- more -->

        <div class="service more" style="display: none;">
            <h2>more</h2>
            <ul class="subNav-list">
                <li class="subNav-list-item subNav-list-item-active" data-target="entrepreneurship">
                    <a href="#">
                        <p>entrepreneurship</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="prove">
                    <a href="#">
                        <p>go compete prove</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="solution">
                    <a href="#">
                        <p>your problem our solution</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="box">
                    <a href="#">
                        <p>out of the box</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="bookbuddies">
                    <a href="#">
                        <p>book buddies</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="burningissues">
                    <a href="#">
                        <p>burningissues</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="literature">
                    <a href="#">
                        <p>literature</p>
                    </a>
                </li>
                <li class="subNav-list-item" data-target="editorial">
                    <a href="#">
                        <p>editorial column</p>
                    </a>
                </li>
            </ul> 

            <div class="service-contents">

                <div class="service-content entrepreneurship">
                    <!-- <p>entrepreneurship</p> -->
                   <br><br> <p>!!!Updating Soon!!!</p>
                </div>
                <div class="service-content prove" style="display: none;">
                    <!-- <p>go compete prove</p> -->
                   <br><br> <p>!!!Updating Soon!!!</p>
                </div>
                <div class="service-content solution" style="display: none;">
                    <!-- <p>your problem our solution</p> -->
                   <br><br> <p>!!!Updating Soon!!!</p>
                </div>
                <div class="service-content box" style="display: none;">
                    <!-- <p>out of the box</p> -->
                   <br><br> <p>!!!Updating Soon!!!</p>
                </div>
                <div class="service-content bookbuddies" style="display: none;">
                    <!-- <p>book buddies</p> -->
                   <br><br> <p>!!!Updating Soon!!!</p>
                </div>
                <div class="service-content burningissues" style="display: none;">
                    <!-- <p>burningissues</p> -->
                   <br><br> <p>!!!Updating Soon!!!</p>
                </div>
                <div class="service-content literature" style="display: none;">
                    <!-- <p>literature</p> -->
                   <br><br> <p>!!!Updating Soon!!!</p>
                </div>
                <div class="service-content editorial" style="display: none;">
                    <!-- <p>editorial column</p> -->
                   <br><br> <p>!!!Updating Soon!!!</p>
                </div>
            </div>
        </div>

    </div>
    
  

    <!-- footer -->
   <?php
    include "footer.php";
   ?>


    <script>
        let sideNav = document.querySelector(".side-nav");
        let navExpand = document.querySelectorAll(".expand");

        navExpand.forEach(function(e){
            e.addEventListener('click',function(){
                sideNav.classList.toggle("side-nav-open");
            })
        })

        //services side nav
        let navItems = document.querySelectorAll("#side-nav-list-item");
        let navItemEle = document.querySelectorAll(".service");

        for(let i=0;i < navItems.length;i++){
            navItems[i].addEventListener('click',function(){
                for (let j = 0; j < navItems.length; j++) {
                    navItems[j].classList.remove("side-nav-list-item-active");
                }

                this.classList.add("side-nav-list-item-active");

                let navEleValue = this.getAttribute("data-target");

                navItemEle.forEach(function(item){
                    item.style.display = "none";
                })

                document.querySelector("." + navEleValue).style.display = "block";

                if(navEleValue!="formteam" && navEleValue!="know"){
                    subNav("." + navEleValue);
                }

            })
        }


        //hero subnav
        let heroSubNavItems = document.querySelectorAll(".subNav-list-item");
        let heroSubNavEle = document.querySelectorAll(".service-contents .service-content");

        for(let i=0;i < heroSubNavItems.length;i++){
            heroSubNavItems[i].addEventListener('click',function(){
                for (let j = 0; j < heroSubNavItems.length; j++) {
                    heroSubNavItems[j].classList.remove("subNav-list-item-active")
                }

                this.classList.add("subNav-list-item-active");

                let eleValue = this.getAttribute("data-target");

                heroSubNavEle.forEach(function(item){
                    item.style.display = "none";
                })

                document.querySelector("." + eleValue).style.display = "block";

            })
        }

        function subNav(currentActive){
            let child = document.querySelector(currentActive).children[1].children;
            let childrenEle = document.querySelector(currentActive).children[2].children;
            for(let i = 1 ; i < child.length;i++){
                child[i].classList.remove("subNav-list-item-active");
            }
            for(let j = 1 ; j < childrenEle.length;j++){
                childrenEle[j].style.display = "none";
            }
            child[0].classList.add("subNav-list-item-active"); 
            childrenEle[0].style.display = "block";
        }

        //hearts
        let hearts = document.querySelectorAll('.heart');
        hearts.forEach((heart)=>{
            heart.addEventListener('click',function(){
                heart.classList.toggle('bxs-heart'); 
                heart.classList.toggle('redColor');
            })
        })


        //UPLOAD FORM
        $(".hero-form").hide();
        $(".technical-form").hide();
        $(document).ready(function(){
            $(".click-upload-hero").click(function(){
               $(".hero-form").show();
              
            });
            $(".form-btn-close").click(function(){
                $(".hero-form").hide();
               
            });
            $(".click-upload-technical").click(function(){
               $(".technical-form").show();
              
            });
            $(".form-btn-close").click(function(){
                $(".technical-form").hide();
               
            });

        });

        // Error TimeOut
        const error_msg = function(){
            $(".alert-box").hide();
        };
        setTimeout(error_msg, 8000);

    </script>


    <script src="./js/script.js"></script>
    

</body>
</html>