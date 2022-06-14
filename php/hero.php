<?php

session_start();
include('server.php');

// HERO SECTION - Form Handling
if(isset($_POST['submit-art'])){

    // Error handling regarding on file formats and size
    $errors = array();
    $category = mysqli_real_escape_string($conn,$_POST['category']);
    $datetime = date("YmdHis");

    // Inserting the file and user data to database
    $smid = $_SESSION['smid'];
    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $author = mysqli_real_escape_string($conn,$_POST['author']);
    $date = date("d-m-Y");

    $file_name =$datetime.$_FILES['myfile']['name'];
    $file_size = $_FILES['myfile']['size'];
    $file_tmp = $_FILES['myfile']['tmp_name'];
    $file_type = $_FILES['myfile']['type'];
    $temp = explode('.',$file_name);
    $file_ext = strtolower(end($temp));


    if($category == "art-gallery"){
        $extensions = array("jpeg","jpg","png");
    }elseif($category == "singing"){
        $extensions = array("mp3");
    }elseif($category == "photography"){
        $extensions = array("jpeg","jpg","png");
    }elseif($category == "story-writing"){
        $extensions = array("docx","pdf",);
    }elseif($category == "direction"){
        $extensions = array("mp4","mov","avi","wmv");
    }else{
        $extensions = array(" ");
    }
  

    if(in_array($file_ext,$extensions) === false){
        $errors[] = "This extension file not allowed, Please choose proper file Extension.";
    }
    if($file_size > 10485760){
        $errors[] = "File size must be less than 10mb.";
    }

    // If no errors, allowing file to be uploaded
    if(empty($errors) == true){

        if($category == "art-gallery"){
            move_uploaded_file($file_tmp,"../uploads/hero/art-gallery/".$file_name);
            
            $sql1 = "INSERT INTO hero(smid, title, author, category, postdate, post_path, valid) VALUES('$smid','$title','$author','$category','$date','$file_name',2)";
            mysqli_query($conn, $sql1) or die("Error to insert, Hero data!");
            $sql = "INSERT INTO hero_art(smid, title, category, postdate, author, post_path, valid) VALUES('$smid','$title','$category','$date','$author','$file_name',2)";

            if(mysqli_query($conn, $sql)){
                $_SESSION['success_s'] = "Post is sent!";
                header("location: ../services.php");
            }else{
                $_SESSION['error_s'] = "unable to post!";
                header("location: ../services.php");
            }

        }elseif($category == "singing"){
            move_uploaded_file($file_tmp,"../uploads/hero/singing/".$file_name);

            $sql1 = "INSERT INTO hero(smid, title, author, category, postdate, post_path, valid) VALUES('$smid','$title','$author','$category','$date','$file_name',2)";
            mysqli_query($conn, $sql1) or die("Error to insert, Hero data!");
            $sql = "INSERT INTO hero_singing(smid, title, author, category, postdate, post_path, valid) VALUES('$smid','$title','$author','$category','$date','$file_name',2)";

            if(mysqli_query($conn, $sql)){
                $_SESSION['success_s'] = "Post is sent!";
                header("location: ../services.php");
            }else{
                $_SESSION['error_s'] = "unable to post!";
                header("location: ../services.php");
            }

        }elseif($category == "photography"){
            move_uploaded_file($file_tmp,"../uploads/hero/photography/".$file_name);

            $sql1 = "INSERT INTO hero(smid, title, author, category, postdate, post_path, valid) VALUES('$smid','$title','$author','$category','$date','$file_name',2)";
            mysqli_query($conn, $sql1) or die("Error to insert, Hero data!");
            $sql = "INSERT INTO hero_photography(smid, title, author, category, postdate, post_path, valid) VALUES('$smid','$title','$author','$category','$date','$file_name',2)";
            
            if(mysqli_query($conn, $sql)){
                $_SESSION['success_s'] = "Post is sent!";
                header("location: ../services.php");
            }else{
                $_SESSION['error_s'] = "unable to post!";
                header("location: ../services.php");
            }
        }elseif($category == "story-writing"){
            move_uploaded_file($file_tmp,"../uploads/hero/story-writing/".$file_name);

            $sql1 = "INSERT INTO hero(smid, title, author, category, postdate, post_path, valid) VALUES('$smid','$title','$author','$category','$date','$file_name',2)";
            mysqli_query($conn, $sql1) or die("Error to insert, Hero data!");
            $sql = "INSERT INTO hero_story(smid, title, author, category, postdate, post_path, valid) VALUES('$smid','$title','$author','$category','$date','$file_name',2)";
            
            if(mysqli_query($conn, $sql)){
                $_SESSION['success_s'] = "Post is sent!";
                header("location: ../services.php");
            }else{
                $_SESSION['error_s'] = "unable to post!";
                header("location: ../services.php");
            }

        }elseif($category == "direction"){
            move_uploaded_file($file_tmp,"../uploads/hero/direction/".$file_name);

            $sql1 = "INSERT INTO hero(smid, title, author, category, postdate, post_path, valid) VALUES('$smid','$title','$author','$category','$date','$file_name',2)";
            mysqli_query($conn, $sql1) or die("Error to insert, Hero data!");
            $sql = "INSERT INTO hero_direction(smid, title, author, category, postdate, post_path, valid) VALUES('$smid','$title','$author','$category','$date','$file_name',2)";
            
            if(mysqli_query($conn, $sql)){
                $_SESSION['success_s'] = "Post is sent!";
                header("location: ../services.php");
            }else{
                $_SESSION['error_s'] = "unable to post!";
                header("location: ../services.php");
            }
        }else{
            $_SESSION['error_s'] = "please Select the Category field!";
            header("location: ../services.php");
        }

    }else{
        $err = $errors[0];
        $_SESSION['error_s'] = $err;
            header("location: ../services.php");
        die();
    }

 

}

?>