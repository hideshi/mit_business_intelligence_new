<?php
session_start();
require "./lib/db.php";
require "./lib/util.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$myusername = addslashes($_POST['username']);
	$mypassword = md5(addslashes($_POST['password']));
	
    $db = new DbManager();
    $users = $db->execute("SELECT id, full_name FROM users WHERE user_name = ? AND password = ?", array($myusername, $mypassword));
	if (count($users) > 0) {
        
		$_SESSION['login_username'] = $myusername;
		$_SESSION['login_id'] = $users[0]['id'];
		$_SESSION['login_full_name'] = $users[0]['full_name'];
		header("location: pages/index.php");
	} else {
		header("location: index.php");
		$_SESSION['error'] = 'Incorrect input';
	}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Brgy. 663 Zone 71 MIS</title>

    <!-- Bootstrap core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bower_components/bootstrap/dist/css/signin.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Login</h2>
<?php
    if (isset($_SESSION['error'])) {
        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div>';
    }
?>
        <label for="inputUsername" class="sr-only">Username</label>
        <input name="username" type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      </form>

    </div> <!-- /container -->

  </body>
</html>
