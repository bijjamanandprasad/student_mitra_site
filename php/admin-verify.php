<?php

include("server.php");

$username = mysqli_real_escape_string($conn,filter_data($_POST['username']));
$password = md5(filter_data($_POST['password']));


$query = "SELECT * from admin_details where username = '$username' and passwd = '$password'";
$result = mysqli_query($conn,$query) or die();

if(mysqli_num_rows($result) > 0){

    session_start();
    while($row = mysqli_fetch_assoc($result)){
        $_SESSION['fullname'] = $row['username'];
    }
    $_SESSION['verified'] = 1;
    $_SESSION['smid'] = "Admin";
    header("location: ../services.php");

}else{
    
    session_start();
    $_SESSION['error-admin'] = "Username or Password incorrect!";
    header("location: ../admin.php");
}

function filter_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>