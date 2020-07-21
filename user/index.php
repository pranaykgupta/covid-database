<?php 
  session_start();
?>

<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Coronavirus Outbreak in India</title>
</head>
  <body>
  <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">COVID-19 INDIA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="login.php">Login as miner <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- main content -->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
            <h1>COVID-19 India</h1>
            <?php if(isset($_SESSION['msg'])){ ?>
              <div class="text-center"><?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?> </div>
            <?php } ?>

          <!-- add form -->
          <form action="add.php" method="POST">
            <h2>Enter New State Data</h2>
            <div class="form-group">
                <label for="name">State Name</label>
                <input id="name" type="text" class="form-control" name="name"></input>
                <label for="activecases">Active cases</label>
                <input id="activecases" type="number" class="form-control" name="activecases"></input>
                <label for="affcases">Affected cases</label>
                <input id="affcases" type="number" class="form-control" name="affcases"></input>
                <label for="deaths">Death</label>
                <input id="deaths" type="number" class="form-control" name="deaths"></input>
                <label for="recovered">Recovered</label>
                <input id="recovered" type="number" class="form-control" name="recovered"></input>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

          <hr>
          
          <!-- update form -->
          <form action="update.php" method="POST">
              <h2>Update Existing State Data</h2>
              <div class="form-group">
                <label for="name">State Name</label>
                <input id="name" type="text" class="form-control" name="name"></input>
                <label for="activecases">Active cases</label>
                <input id="activecases" type="number" class="form-control" name="activecases"></input>
                <label for="affcases">Affected cases</label>
                <input id="affcases" type="number" class="form-control" name="affcases"></input>
                <label for="deaths">Death</label>
                <input id="deaths" type="number" class="form-control" name="deaths"></input>
                <label for="recovered">Recovered</label>
                <input id="recovered" type="number" class="form-control" name="recovered"></input>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <hr>
        </div>
      </div>
    </div>

    <!-- footer -->
    <footer class="page-footer font-small blue">
      <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="https://pranaykgupta.github.io/"> Pranay And Pushpesh</a>
      </div>
    </footer>
  </body>
</html>