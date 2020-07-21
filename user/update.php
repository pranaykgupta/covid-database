<?php
    session_start();
    include("db.php");
    $st_name = $_POST["name"];
    $active = $_POST["activecases"];
    $aff = $_POST["affcases"];
    $deaths = $_POST["deaths"];
    $rec = $_POST["recovered"];
    $isresp = 0;
    $status = -1;
    $sql = "INSERT INTO `request` (`state_name`, `active`, `aff`, `death`, `rec`, `isresponded`, `status`) VALUES ('$st_name', $active, $aff, $deaths, $rec, $isresp, $status)";
    $result = mysqli_query($con, $sql);
    if($result){
        $_SESSION["msg"] = "Update Request Registered";
    }else{
        $_SESSION['msg'] = "There was some error while processing your request";
    }
    header("location: index.php");
?>