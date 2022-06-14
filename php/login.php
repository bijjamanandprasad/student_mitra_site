<?php

include("server.php");

$email = mysqli_real_escape_string($conn,filter_data($_POST['email']));
$password = md5(filter_data($_POST['password']));


$query = "SELECT FName, smid, verfied from userdetails where email = '$email' and pass = '$password'";
$result = mysqli_query($conn,$query) or die();

if(mysqli_num_rows($result) > 0){

    session_start();
    while($row = mysqli_fetch_assoc($result)){
        $_SESSION['fullname'] = $row['FName'];
        $_SESSION['smid'] = $row['smid'];
        $_SESSION['verified'] = $row['verfied'];
    }
    
    if($_SESSION['verified'] == 1){
       header("location: ../services.php");
    }else{
        $_SESSION['error'] = "Please Verify Email!";
        header("location: ../login-page.php");
    }

    

}else{
    
    session_start();
    $_SESSION['error'] = "Email or Password incorrect!";
    header("location: ../login-page.php");
}

function filter_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>