<?php

//connecting to database
include("server.php");

//Assigning the register form data in variables
$sm_id;  
$firstname = mysqli_real_escape_string($conn,filter_data($_POST['fname']));
$lastname = mysqli_real_escape_string($conn,filter_data($_POST['sname']));
$email = mysqli_real_escape_string($conn,filter_data($_POST['email']));
$password = md5(filter_data($_POST['password']));

//Query to check User Exists or Not
$query = "SELECT * FROM userdetails WHERE email = '$email'";
$result = mysqli_query($conn,$query) or die();

if(mysqli_num_rows($result) > 0){
    session_start();
    $_SESSION['error'] = "User Exists, please login!";
    header("location: ../login-page.php");
}
else{

    //Get the value of the last person's in database to generate new SM Id
    $query = mysqli_query($conn,"SELECT s_no FROM userdetails order by s_no desc limit 1") or die();
    $sm_id_gen = mysqli_fetch_assoc($query);

    if($sm_id_gen['s_no'] == null){
        $value =  1;
    }else{
        $value = (int)$sm_id_gen['s_no'] + 1;
    }

    
    if($value < 10){
        $sm_id = "SM000".$value;
    }else if($value < 100){
        $sm_id = "SM00".$value;
    }else if($value < 1000){
        $sm_id = "SM0".$value;
    }else if($value < 10000){
        $sm_id = "SM".$value;
    }else{
        $sm_id = "SM".$value;
    }
    

    
    //opt generator
    $token =  mt_rand(100000,999999);
    $verified = 0;
    
    //Insert the details to database
    $res = "INSERT INTO userdetails(FName,SName,email,pass,smid,token,verfied) VALUES ('$firstname','$lastname','$email','$password','$sm_id','$token','$verified')";
    mysqli_query($conn,$res) or die();


    include "sendMail.php";
        //set html enable
        $mail->isHTML(true);  

        //set email subject
        $mail->Subject = "Email Verification";

        //set sender email
        $mail->setFrom("anandreddy0020@gmail.com");

        //Email body
        $mail->Body = "<p>Please Verify your Email, by following OneTimePassword! <br><h1>$token</h1></p>";

        //Add recipient
        $mail->addAddress($email);

        //Finally Send Mail
        $mail->Send();

        //closing smtp connection
        $mail->smtpClose();

    session_start();
    $_SESSION['status'] = 'Registration Successful, Verfiy Email';
    $_SESSION['time'] = time() + (5 * 60);
    $_SESSION['mail_id'] = $email;
    $_SESSION['success1'] = "OTP is sent, Please check your Mail!";
    header("location: ../EmailVerify.php");
    
}

//Filter the data from malicious code
function filter_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>