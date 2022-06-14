<?php

session_start();
include("server.php");

$id = mysqli_real_escape_string($conn,$_GET['id']);
$category = mysqli_real_escape_string($conn,$_GET['category']);
$valid = mysqli_real_escape_string($conn,$_GET['valid']);

$sql1 = "SELECT * FROM hero where id = '$id'";
$result = mysqli_query($conn, $sql1) or die("Error faced while updation");
mysqli_query($conn,"UPDATE hero SET valid = '$valid' where id = '$id'") or die("Error while updating the post");

$path;
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $path = $row['post_path'];
    }
}


$sql;
if($category == "art-gallery"){
    $sql = "UPDATE hero_art SET valid = '$valid' where post_path = '$path'";
}elseif($category == "singing"){
    $sql = "UPDATE hero_singing SET valid = '$valid' where post_path = '$path'";
}elseif($category == "photography"){
    $sql = "UPDATE hero_photography SET valid = '$valid' where post_path = '$path'";
}elseif($category == "story-writing"){
    $sql = "UPDATE hero_story SET valid = '$valid' where post_path = '$path'";
}elseif($category == "direction"){
    $sql = "UPDATE hero_direction SET valid = '$valid' where post_path = '$path'";
}

$result = mysqli_query($conn, $sql) or die("Error while updating the post");
if($valid == 1){
    $_SESSION['success_s'] = "Post is Accepted!";
    header("location: ../services.php");
}else{
    $_SESSION['error_s'] = "Post is Declined!";
    header("location: ../services.php");
}


?>