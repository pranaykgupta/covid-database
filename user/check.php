<?php
    session_start();
    include("db.php");
    $st_name = $_POST["username"];
    $password = sha1($_POST["password"]);
    $sql = "SELECT `id`, `username`, `password` FROM `miners` WHERE `username`='$st_name' AND `password`='$password'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        $_SESSION["msg"] = "Succfully Loged in!!";
        $_SESSION["username"] = $row["username"];
        $_SESSION["id"] = $row["id"];
        $_SESSION["loggedin"] = true;
        header("location: miner.php");
    }else{
        $_SESSION['msg'] = "Wrong Credentials";
        header("location: login.php");
    }
?>