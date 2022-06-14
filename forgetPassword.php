<?php

session_start();

//TIME EXPIRY
if(isset($_SESSION['time1'])){
    if($_SESSION['time1'] < time()){

        unset($_SESSION['time1']);
        
        if(isset($_SESSION['mail_active1'])){ unset($_SESSION['mail_active1']); }
        if(isset($_SESSION['error2'])){ unset($_SESSION['error2']); }
        if(isset($_SESSION['success2'])){ unset($_SESSION['success2']); }
        if(isset($_SESSION['token_value'])){ unset($_SESSION['token_value']); }
        if(isset($_SESSION['reset'])){ unset($_SESSION['reset']); }
        if(isset($_SESSION['mail_id1'])){ unset($_SESSION['mail_id1']); }

        $_SESSION['error'] = "OTP Expired";
        header('location: login-page.php');
    }
}

//EMAIL ATHENTICATION
if(isset($_POST['email']) and !isset($_SESSION['time1'])){

    include("php/server.php");
    $email = $_POST['email'];
    

    $result = mysqli_query($conn,"SELECT * FROM userdetails WHERE email = '$email'");

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        if($row['verfied'] == 0){
         
            $_SESSION['error'] = "Email is not Verified!";
            header('location: login-page.php');
        }else{
           
            $_SESSION['mail_id1'] = $email;
            $_SESSION['mail_active1'] = "val";
            $_SESSION['time1'] = time() + (5 * 60); 
            $_SESSION['success2'] = "OTP is sent, Please check your Mail!";

            $token =  mt_rand(100000,999999);

            $_SESSION['token_value'] = $token;

            include "php/sendMail.php";
             
                $mail->isHTML(true);  
                $mail->Subject = "Email Verification";
                $mail->setFrom("anandreddy0020@gmail.com");
                $mail->Body = $token;
                $mail->addAddress($email);
                if($mail->Send()){}else{
                    unset($_SESSION['mail_id1']);
                    unset($_SESSION['mail_active1']);
                    unset($_SESSION['time1']);
                    unset($_SESSION['success2']);
                    $_SESSION['error'] = "Network Error!";
                    header('location: login-page.php');
                }
                $mail->smtpClose();
            }
    
    }else{
        
        $_SESSION['error'] = "Email is not registered!";
        header('location: login-page.php');
    }
}

//OTP EXPIRY
if(isset($_POST['otp'])){

    $otp = $_POST['otp'];
    if($otp == $_SESSION['token_value']){
        $_SESSION['reset'] = "reset";
    }else{
        $_SESSION['error2'] = "Incorrect OTP, type again!";
    }
}

//PASSWORD UPDATION
if(isset($_POST['password'])){

    $pw = md5($_POST['password']);
    $cpw = md5($_POST['confirmPassword']);

    if($pw == $cpw){

        unset($_SESSION['time1']);
        unset($_SESSION['reset']);
        unset($_SESSION['token_value']);
        unset($_SESSION['mail_active1']);
        if(isset($_SESSION['error2'])){ unset($_SESSION['error2']); }
        if(isset($_SESSION['success2'])){ unset($_SESSION['success2']); }

        include("php/server.php");
        $mail = $_SESSION['mail_id1'];
        mysqli_query($conn, "UPDATE userdetails SET pass = '$pw' WHERE email ='$mail'") or die("connection failed");

        unset($_SESSION['mail_id1']);
        $_SESSION['success'] = "Password is updated!";
        header('location: login-page.php');

    }else{
        $_SESSION['error2'] = "**passwords do not match!";
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="./css/login-page.css">
    <link rel="stylesheet" href="./css/alerts.css">
    <title>Student Mitra Events</title>
</head>
<style>
form{
    margin-top:50px !important;
}
img{
    position: absolute;
    height:100px;
    width:100px;
}
h1{
    text-align:center;
    font-size:1.5em;
    color: rgb(90, 90, 90);
}
h5{
    text-align:center;
    font-size:1em;
    margin:25px auto 5px;
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
    <div>
        <a href="index.php"><img src="img/smLogo.jpg" alt="logo"></a>

        <div class="form-layer transition" ></div>
            
        <?php if(!isset($_SESSION['reset']) and !isset($_SESSION['mail_active1']) ){ ?>

            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form">
            <h1>RESET PASSWORD</h1>
            <h5>Enter Registered Email-Id </h5>
                <input type="email" placeholder="Enter Email..." name="email"><br>
                <button type="submit" class="submit">Continue</button>
            </form>
        <?php } ?>

        <?php if(!isset($_SESSION['reset']) and isset($_SESSION['mail_active1'])){ ?>

            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form">
            <h1>RESET PASSWORD</h1>
            <h5>OTP VALID UPTO 5 MINUTES</h5>

                    <?php if(isset($_SESSION['success2'])){  ?>
                        <div class="alert alert-success" role="alert"><?= $_SESSION['success2']; ?></div>
                    <?php unset($_SESSION['success2']); } ?>

                    <?php if(isset($_SESSION['error2'])){  ?>
                        <div class="alert alert-danger" role="alert"><?= $_SESSION['error2']; ?></div>
                    <?php unset($_SESSION['error2']); } ?>

                <input type="text" placeholder="Enter OTP..." name="otp"><br>
                <button type="submit" class="submit">Send</button>
            </form>
        <?php } ?>
            
            <?php if(isset($_SESSION['reset'])){ ?>

            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form">
            <h1>RESET PASSWORD</h1>
            <h5>Update your password!</h5>

                    <?php if(isset($_SESSION['error2'])){  ?>
                        <div class="alert alert-danger" role="alert"><?= $_SESSION['error2']; ?></div>
                    <?php unset($_SESSION['error2']); } ?>

                <input type="password" placeholder="Password" name="password"><br>
                <input type="password" placeholder="Confirm Password" name="confirmPassword"><br>`  
                <button type="submit" class="submit">Change</button>
            </form>

            <?php } ?>
        </div>
    </div>
</body>
</html>