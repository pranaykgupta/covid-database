<?php 
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
      header("location: login.php");
  }
?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/update.css">
    <title>Coronavirus Outbreak in India</title>
    <link rel="icon" href="./logo.jpg" type="image/icon type">
</head>
  <body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">COVID-19 INDIA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active" style="padding: 9px 5px; color: #000;">
            <?php echo $_SESSION['username']; ?>
          </li>
          <li class="nav-item active">
              <a class="nav-link" href="logout.php">Log Out <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <!-- main content -->
    <div class="container">
    <br>
    <?php
        include('insert.php');
    ?>  
    </div>

    <!-- footer -->
    <footer class="page-footer font-small blue">
      <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="https://pranaykgupta.github.io/"> Pranay And Pushpesh</a>
      </div>
    </footer>
  </body>
</html>