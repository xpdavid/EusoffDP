<?php
  session_start();
  require_once("../include/constant.php");
	require_once("include/db.php");
  
  if (isset($_SESSION["login"]) && $_SESSION["login"]) {
    header("location: admin.php");
  }
	$status_class = "booking_hide";
    if ($_POST['user'] !== null) {
		if (login($_POST['user'], $_POST['pass'])) {
          $_SESSION["login"] = true;
          header("location: admin.php");
          exit;
        } else {
          $_SESSION["login"] = false;
          $status_class = "login-help";
        }
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin</title>

  <link rel="stylesheet" href="static/css/admin_login.css" />
  <link rel="stylesheet" href="../static/css/jquery/jquery-ui.css" />

  <script src="../static/js/jquery-2.1.1.min.js"></script>
  <script src="../static/js/jquery-ui.min.js"></script>
</head>

<body>
	<div class="container">
		<a href="../index.php"><img src="../img/title.png" width="700" height="200"></a>
	</div>

<div class="login-card">
    <h1>Admin Log-in</h1><br>
  
  <form method="post" action="index.php">
    <input type="text" name="user" placeholder="Username">
    <input type="password" name="pass" placeholder="Password">
    <input type="submit" name="login" class="login login-submit" value="login">
  </form>
    
  <div class="<?php echo $status_class;?>">
    Invalid User
  </div>
</div>
</body>