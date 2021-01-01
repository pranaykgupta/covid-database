<?php
    session_start();
    include("db.php");
    $sql = "SELECT `id`, `state_name`, `active`, `aff`, `death`, `rec` FROM `request` WHERE `isresponded`=0";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result)){
            echo '
            <div class="in">
            <h3>'.$row['id'].'. '.$row['state_name'].'</h3>
            <hr class="my-4">
            <p>Active Cases: '.$row['active'].'</p>
            <p>Affected Cases:'.$row['aff'].'</p>
            <p>Death Cases:'.$row['death'].'</p>
            <p>Recovered Cases:'.$row['rec'].'</p>
            <a class="btn bb btn-sm" href="#" role="button">Accept</a>
            <a class="btn bb btn-sm" href="#" role="button">Decline</a>
            </div>
            ';
        }
    }else{
        echo "No pending Requests !!";
    }
?>