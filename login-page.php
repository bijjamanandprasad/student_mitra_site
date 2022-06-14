<?php

session_start();
if(isset($_SESSION['verified']) and $_SESSION['verified'] == 1){
    header("location:services.php");
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Mitra | Unlock the doors of Imagination</title>
        <!-- CSS only -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./css/login-page.css">
        <link rel="stylesheet" href="./css/alerts.css">
        <link rel="stylesheet" href="./css/styles.css">
    </head>
    <body>
         <!-- top header -->
            <?php 
            include "header.php";
            ?>
    
            <!--LOGIN FORM-->
            <div class="form-layer transition"  id="login">
                <form action="php/login.php" method="POST" class="form">
                    <h1 class="form-title">LOGIN</h1>

                    <?php if(isset($_SESSION['error'])){  ?>
                        <div class="alert alert-danger" role="alert"><?= $_SESSION['error']; ?></div>
                    <?php unset($_SESSION['error']); } ?>

                    <?php if(isset($_SESSION['success'])){  ?>
                        <div class="alert alert-success" role="alert"><?= $_SESSION['success']; ?></div>
                    <?php unset($_SESSION['success']); } ?>

                    <label for="email">Email</label>
                        <input type="email" name="email" required>
                        <div class="pss">
                            <label for="password">Password</label>
                            <span><i class="fa fa-eye" onclick="toggleEye1()" id="eye1"></i></span>
                        </div>
                        <input type="password" name="password" id="l_password" required>
                    <button type="submit" class="submit-btn">Sign in</button>
                </form>
                    <p><a  href="forgetPassword.php">Forgot password?</a></p>
                    <p><a  href="admin.php">Login-as-Admin</a></p>
                    <p >Don't have an account? <a href="#" onclick="displayRegister()">Register</a></p> 
                    <p >Complete Verification!!! <a href="EmailVerify.php">verify-email</a></p> 
            </div>
    
            <!--REGISTER FORM-->
            <div class="form-layer transition" id="register">
    
                <form action="php/register.php" method="POST" class="form">

                    <h1 class="form-title">REGISTER</h1>
                    <label for="fname">First Name</label>
                        <input type="text" name="fname" required>
                    <label for="sname">Last Name</label>
                        <input type="text" name="sname" required>
                    <label for="email">Email</label>
                        <input type="email" name="email" required>
                    <div class="pss">
                        <label for="password">Password</label>
                        <span><i class="fa fa-eye" onclick="toggleEye2()" id="eye2"></i></span>
                    </div>
                        <input type="password" name="password" id="r_password" required>
                    <button type="submit" name="reg" class="submit-btn">Register</button>
                </form>
                    <p >By clicking "Register" you agree to the <br><a href="#">Terms & Conditions</a></p>
                    <p >Already have an account? <a href="#" onclick="displayLogin()">Login</a></p>  
            </div>
       
     
         <!-- footer -->
        <?php
            include "footer.php";
        ?>

        


        <script src="./js/script.js"></script>

        <script>
            
            //FORMS DISPLAYING
            var login = document.getElementById("login");
            var register = document.getElementById("register");

               register.style.display = "none";

                    function displayLogin(){
                        register.style.display = "none";
                        login.style.display = "block";
                    }

                    function displayRegister(){
                        register.style.display = "block";
                        login.style.display = "none";
                    }

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

            var register_pwd_state = false;
                function toggleEye2(){
                    if(register_pwd_state){
                        document.getElementById("r_password").setAttribute("type","password");
                        document.getElementById("eye2").style.color = '#7a797e';
                        register_pwd_state = false;
                    }
                    else{
                        document.getElementById("r_password").setAttribute("type","text");
                        document.getElementById("eye2").style.color = "orange";
                        register_pwd_state = true;
                    }
                }

        </script>
    
        
    </body>
</html>