<?php
include_once 'includes/connect.php';
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Production Control System</title>
    <link rel="stylesheet" type="text/css" href="../testj/style/index.css">
</head>
<body>
<div class="bg-image"></div>
<div class="bg-text fade-in">
  <?php 
  	//it will never let you open index(login) page if session is set
	if ( isset($_SESSION['username'])!="" ) {
		header("Location: index.php");
		exit;
	} else { //For testing
		$_SESSION = array(); // clears all the data stored in the current user's session
        
		//unset($_SESSION);
	}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM PCS_LogIn WHERE Username = '$username'";
    $stmt = odbc_exec($conn, $sql);
    $passwordfromdb = odbc_result($stmt,2);
    $linefromdb = odbc_result($stmt,3);
    $passwordfromdb2 = odbc_result($stmt,4);
    $passwordfromdb3 = odbc_result($stmt,5);
    $passwordfromdb4 = odbc_result($stmt,6);
    $passwordfromdb5 = odbc_result($stmt,7);
    $passcountfromdb = odbc_result($stmt,8);

    if (odbc_num_rows($stmt) <> 0) {
        if ($passcountfromdb == 1){
            if (password_verify($password, $passwordfromdb)) {
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;
                header("Location: line".$linefromdb."_index.php"); // Redirect to a protected page
            } else {
                    $login_error = "Wrong password."; // Set an error message
                }
        }elseif ($passcountfromdb == 2){
            if (password_verify($password, $passwordfromdb2)) {
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;
                header("Location: line".$linefromdb."_index.php"); // Redirect to a protected page
            } else {
                    $login_error = "Wrong password."; // Set an error message
            }
        }elseif ($passcountfromdb == 3){
            if (password_verify($password, $passwordfromdb3)) {
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;
                header("Location: line".$linefromdb."_index.php"); // Redirect to a protected page
            } else {
                    $login_error = "Wrong password."; // Set an error message
            }
        }elseif ($passcountfromdb == 4){
            if (password_verify($password, $passwordfromdb4)) {
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;
                header("Location: line".$linefromdb."_index.php"); // Redirect to a protected page
            } else {
                    $login_error = "Wrong password."; // Set an error message
            }
        }elseif ($passcountfromdb == 5){
            if (password_verify($password, $passwordfromdb5)) {
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;
                header("Location: line".$linefromdb."_index.php"); // Redirect to a protected page
            } else {
                    $login_error = "Wrong password."; // Set an error message
            }
        }
      
      
    } else {
        $login_error = "Invalid username."; // Set an error message
    }
}
?>
    <h1 style="font-size:50px">Production Control System</h1>
    <h2 style="color: yellowgreen;">Please Login</h2>
    <div class="center">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <div class="txt_field">
                <input type="text" name="username" id="username" required> <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" id="password" required>
                <span></span>
                <label for="password">Password</label>
            </div>
            <?php if (isset($login_error)) : ?>
        <p style="color: red;"><?php echo $login_error;?></p>
    <?php endif; ?>
            <button type="submit">Login</button>
        </form>
    </div>
</div>
</body>
</html>
