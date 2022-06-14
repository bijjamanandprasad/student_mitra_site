<?php

$email;

session_start();

if(isset($_SESSION['time'])){
 
    if($_SESSION['time'] < time()){

        unset($_SESSION['time']);
        if(isset($_SESSION['status'])){ unset($_SESSION['status']); }
        if(isset($_SESSION['mail_active'])){ unset($_SESSION['mail_active']); }
        if(isset($_SESSION['error1'])){ unset($_SESSION['error1']); }
        if(isset($_SESSION['token'])){ unset($_SESSION['token']); }

        include("php/server.php");
        $mail = $_SESSION['mail_id'];

        mysqli_query($conn, "UPDATE userdetails SET token = null WHERE email ='$mail'");

        unset($_SESSION['mail_id']);

        $_SESSION['error'] = "OTP Expired";
        header('location: login-page.php');
        
    }
}


if(isset($_POST['email']) and !isset($_SESSION['time'])){

    include("php/server.php");
    $email = $_POST['email'];
    

    $result = mysqli_query($conn,"SELECT * FROM userdetails WHERE email = '$email'");

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        if($row['verfied'] == 1){
         
            $_SESSION['success'] = "Email already Verified!  Login";
            header('location: login-page.php');
        }else{
           
            $_SESSION['mail_id'] = $email;
            $_SESSION['mail_active'] = "val";
            $_SESSION['time'] = time() + (1 * 60); 
            $_SESSION['success1'] = "OTP is sent, Please check your Mail!";

            $token =  mt_rand(100000,999999);

            mysqli_query($conn, "UPDATE userdetails SET token = '$token' WHERE email ='$email'");
            include "php/sendMail.php";
                //set html enable
                $mail->isHTML(true);  

                //set email subject
                $mail->Subject = "Email Verification";

                //set sender email
                $mail->setFrom("anandreddy0020@gmail.com");

                //Email body
                $mail->Body = $token;

                //Add recipient
                $mail->addAddress($email);

                //Finally Send Mail
                if($mail->Send()){}else{
                    unset($_SESSION['mail_id']);
                    unset($_SESSION['mail_active']);
                    unset($_SESSION['time']);
                    unset($_SESSION['success1']);
                    $_SESSION['error'] = "Network Error!";
                    header('location: login-page.php');
                }

                //closing smtp connection
                $mail->smtpClose();
            }
    
    }else{
        
        $_SESSION['error'] = "Email is not registered!";
        header('location: login-page.php');
    }
}


if(isset($_POST['token'])){

    //connecting to database
    include("php/server.php");

    $tokenVerify = $_POST['token'];
    $mail = $_SESSION['mail_id'];

    $query = "SELECT token FROM userdetails WHERE token = '$tokenVerify' and verfied = 0 and email = '$mail'";
    $result = mysqli_query($conn,$query) or die();

    if(mysqli_num_rows($result) > 0){
        $query = "UPDATE userdetails SET token = null, verfied = 1 WHERE email = '$mail'";
        mysqli_query($conn,$query) or die();

        unset($_SESSION['time']);
        unset($_SESSION['mail_id']);
        unset($_SESSION['mail_active']);

        if(isset($_SESSION['status'])){ unset($_SESSION['status']); }
        $_SESSION['success'] = "Email is Verified! Go Login";
        header('location: login-page.php');
    }else{
        
        $_SESSION['error1'] = "Incorrect OTP, please try again!";
       
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Mitra | Unlock the doors of Imagination</title>
    <link rel="stylesheet" href="./css/alerts.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="./css/login-page.css">
</head>
<style>
form{
    margin-top:10px !important;
}
img{
    height:100px;
    width:100px;
}
h1{
    text-align:center;
    font-size:1.5em;
    color:grey;
}
input[type=email], input[type=password], input[type=text]{
    width : 100%;
    margin : 20px auto 30px;
    border: 2px solid grey;
    background : transparent;
    position : relative;
    outline : none;
    overflow : hidden;
    padding: 5px;
    font-size:1em;
    font-family: 'Poppins', sans-serif;
    color: rgb(63, 59, 52);
 
}

.submit{
   
    width : 40%;
    height : 30px;
    background : transparent;
    color:white;
    border : none;
    background : orange;
    box-shadow : 0 0 2px 0 #cc541c;
    cursor : pointer;
    
}

</style>
<body>

    
    <a href="index.php"><img src="img/smLogo.jpg" alt="logo"></a>
    <?php 
    if(!isset($_SESSION['status']) and !isset($_SESSION['mail_active'])){ 
    ?>
    <div class="form-layer transition" >
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form">
    <h1>Email Verification</h1>
    <input type="text" name="email" placeholder="Enter Email..." required>
    <button type="submit" name="submit" class="submit">continue</button>
    </form>
    </div>
    <?php } ?>



    <?php 
    if(isset($_SESSION['time'])){ 
    ?>
    <div class="form-layer transition" >
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form">
    <h1>Email Verification</h1>
    <?php if(isset($_SESSION['success1'])){  ?>
        <div class="alert alert-success" role="alert"><?= $_SESSION['success1']; ?></div>
    <?php unset($_SESSION['success1']); } ?>

    <?php if(isset($_SESSION['error1'])){  ?>
        <div class="alert alert-danger" role="alert"><?= $_SESSION['error1']; ?></div>
    <?php unset($_SESSION['error1']); } ?>

    <h5>OTP valid upto 10 minutes</h5>
    <input type="text" name="token" placeholder="Type OTP..." required>
    <button type="submit" name="submit" class="submit">Send</button>
    </form>
    </div> 
    <?php } ?>

</body>
</html>