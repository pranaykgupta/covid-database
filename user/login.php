<?php 
  session_start();
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    header("location: miner.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login.css" >
    <title>COVID-19 | Login</title>
    <link rel="icon" href="./logo.jpg" type="image/icon type">
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">COVID-19 INDIA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
            <a class="nav-link" href="index.php">Add or Update State <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <!-- login form -->
    <div class="container">
        <div class="in">
            <h2 class="text-center">LOGIN</h2>
            <form action="check.php" method="POST">
                <div class="form-group">
                    <label for="username">Email/ Username</label>
                    <input type="text" name="username" class="form-control ipc" id="username" aria-describedby="emailHelp" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control ipc" id="password" placeholder="Password" name="password">
                </div>
                <?php if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                } ?>
                <br>
                <button type="submit" class="btn bb">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>