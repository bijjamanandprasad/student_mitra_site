<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Mitra | Unlock the doors of Imagination</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./css/login-page.css">
        <link rel="stylesheet" href="./css/styles.css">
    </head>
<body>
    <!--LOGIN FORM-->
    <div class="form-layer transition"  id="login">
        <form action="php/admin-verify.php" method="POST" class="form">
            <h1 class="form-title">Admin</h1>

            <?php if(isset($_SESSION['error-admin'])){  ?>
                <div class="alert alert-danger" role="alert"><?= $_SESSION['error-admin']; ?></div>
            <?php unset($_SESSION['error-admin']); } ?>


            <label for="username">Username</label>
                <input type="text" name="username" required>
                <div class="pss">
                    <label for="password">Password</label>
                    <span><i class="fa fa-eye" onclick="toggleEye1()" id="eye1"></i></span>
                </div>
                <input type="password" name="password" id="l_password" required>
            <button type="submit" class="submit-btn">Sign in</button>
        </form> 
            <p><a  href="login-page.php">Go to Login</a></p>
    </div>


    <script>
         //TOGGLING PASSWORD
         var login_pwd_state = false;
                function toggleEye1(){
                    if(login_pwd_state){
                        document.getElementById("l_password").setAttribute("type","password");
                        document.getElementById("eye1").style.color = '#7a797e';
                        login_pwd_state = false;
                    }
                    else{
                        document.getElementById("l_password").setAttribute("type","text");
                        document.getElementById("eye1").style.color = "orange";
                        login_pwd_state = true;
                    }
                }
    </script>
</body>
</html>