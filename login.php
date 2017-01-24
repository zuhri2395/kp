<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['login'] == true) {
  header('location:index.php');
}
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="css/templatemo_main.css">

</head>
<body>
<div id="main-wrapper">
  <div class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
      <div class="logo"><h1>Dashboard - Admin Login</h1></div>
    </div>
  </div>
  <div class="template-page-wrapper">
    <form class="form-horizontal templatemo-signin-form" role="form" action="proses/login.php" method="POST">
      <div class="form-group">
        <div class="col-md-12">
          <label for="username" class="col-sm-2 control-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="username" name="username" required placeholder="Username" autocomplete='off'>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-12">
          <label for="password" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
          </div>
        </div>
      </div>
      <!-- <div class="form-group">
        <div class="col-md-12">
          <label for="password" class="col-sm-2 control-label">Login As</label>
          <div class="col-sm-10">
            <select class="form-control margin-bottom-15">
              <option value="">Pilih</option>
              <option value="bendahara">Bendahara</option>
            </select>
          </div>
        </div>
      </div> -->
      <div class="form-group">
        <div class="col-md-12">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="submit" value="Login" class="btn btn-default">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>